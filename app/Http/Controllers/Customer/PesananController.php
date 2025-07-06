<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
public function bayar($id)
{
    $pesanan = Pesanan::where('user_id', Auth::id())->findOrFail($id);
    return view('customer.pesanan.bayar', compact('pesanan'));
}

public function bayarStore(Request $request, $id)
{
    $pesanan = Pesanan::where('user_id', Auth::id())->findOrFail($id);

    // Update status dan buat pembayaran
    $pesanan->update([
        'status' => 'dibayar'
    ]);

    \App\Models\Pembayaran::create([
        'pesanan_id' => $pesanan->id,
        'user_id' => Auth::id(),
        'metode' => $request->metode,
        'jumlah' => $pesanan->harga,
        'status' => 'menunggu_verifikasi',
    ]);

    return redirect()->route('customer.pesanan.index')->with('success', 'Pembayaran berhasil dilakukan');
}



    public function index()
    {
        $pesanans = Pesanan::where('user_id', Auth::id())->get();
        return view('customer.pesanan.index', compact('pesanans'));
    }

    public function create()
    {
        return view('customer.pesanan.create');
    }

  public function store(Request $request)
{
    // Misalnya assign ke joki ID 3 sementara
    Pesanan::create([
        'user_id' => Auth::id(),
        'joki_id' => 3, // Ganti sesuai ID joki
        'detail' => $request->detail,
        'harga' => (int) preg_replace('/\D/', '', $request->harga),
        'status' => 'pending',
    ]);

    return redirect()->route('customer.pesanan.index')->with('success', 'Pesanan berhasil dibuat!');
}

    public function edit($id)
    {
        $pesanan = Pesanan::where('user_id', Auth::id())->findOrFail($id);
        return view('customer.pesanan.edit', compact('pesanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'detail' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        $pesanan = Pesanan::where('user_id', Auth::id())->findOrFail($id);
        $pesanan->update([
            'detail' => $request->detail,
            'harga' => $request->harga,
        ]);

        return redirect()->route('customer.pesanan.index')->with('success', 'Pesanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::where('user_id', Auth::id())->findOrFail($id);
        $pesanan->delete();
        return redirect()->route('customer.pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}

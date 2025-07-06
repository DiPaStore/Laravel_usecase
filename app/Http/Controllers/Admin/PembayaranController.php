<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function pesanan()
{
    return $this->belongsTo(Pesanan::class);
}


    public function store(Request $request, $id)
{
    // Validasi input (misal metode pembayaran)
    $request->validate([
        'metode' => 'required|string',
    ]);

    // Ambil pesanan berdasarkan ID
    $pesanan = \App\Models\Pesanan::findOrFail($id);

    // Simpan informasi pembayaran
    $pesanan->metode_pembayaran = $request->metode;
    $pesanan->status = 'dibayar'; // atau status sesuai kebutuhan
    $pesanan->save();

    return redirect()->route('customer.pesanan.index')->with('success', 'Pembayaran berhasil.');
}


    public function index()
    {
        // Ambil semua data pembayaran beserta relasi user dan pesanan
        $pembayarans = Pembayaran::with(['pesanan', 'user'])->latest()->get();
        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,verified,rejected,menunggu',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->status = $request->status;
        $pembayaran->save();

        return redirect()->route('admin.pembayaran.index')->with('success', 'Status pembayaran diperbarui.');
    }

}

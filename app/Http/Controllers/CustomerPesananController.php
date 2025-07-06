<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerPesananController extends Controller
{
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
        $request->validate([
            'detail' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        Pesanan::create([
            'user_id' => Auth::id(),
            'detail' => $request->detail,
            'harga' => $request->harga,
            'status' => 'pending',
        ]);

        return redirect()->route('customer.pesanan.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function edit(Pesanan $pesanan)
    {
        if ($pesanan->user_id != Auth::id()) abort(403);
        return view('customer.pesanan.edit', compact('pesanan'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        if ($pesanan->user_id != Auth::id()) abort(403);

        $request->validate([
            'detail' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        $pesanan->update([
            'detail' => $request->detail,
            'harga' => $request->harga,
        ]);

        return redirect()->route('customer.pesanan.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy(Pesanan $pesanan)
    {
        if ($pesanan->user_id != Auth::id()) abort(403);
        $pesanan->delete();
        return back()->with('success', 'Pesanan berhasil dihapus.');
    }
}

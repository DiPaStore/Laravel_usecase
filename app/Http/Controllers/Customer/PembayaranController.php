<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Pembayaran;
use App\Models\Pesanan;

class PembayaranController extends Controller
{
    /**
     * Menampilkan form pembayaran untuk pesanan tertentu
     */
    public function create($pesanan_id)
    {
        $pesanan = Pesanan::where('user_id', Auth::id())->findOrFail($pesanan_id);
        return view('customer.pembayaran.create', compact('pesanan'));
    }

    /**
     * Menyimpan data pembayaran customer
     */
    public function store(Request $request, $pesanan_id)
    {
        // Cek apakah method ini benar-benar terpanggil (debug sementara)
        Log::info('METHOD store DIPANGGIL');

        // Validasi input
        $request->validate([
            'metode' => 'required',
            'jumlah' => 'required|numeric',
            'bukti' => 'nullable|image|max:2048',
        ]);

        // Upload bukti jika ada
        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti_pembayaran', 'public');
        }

        // Simpan ke tabel pembayaran
        Pembayaran::create([
            'user_id' => Auth::id(),
            'pesanan_id' => $pesanan_id,
            'metode' => $request->metode,
            'jumlah' => $request->jumlah,
            'bukti' => $buktiPath,
            'status' => 'dibayar', // atau "menunggu"
        ]);

        // Update status pesanan menjadi "dibayar"
        $pesanan = Pesanan::findOrFail($pesanan_id);
        $pesanan->status = 'dibayar';
        $pesanan->save();

        return redirect()->route('customer.pesanan.create')->with('success', 'Pembayaran berhasil dikirim!');
    }
}

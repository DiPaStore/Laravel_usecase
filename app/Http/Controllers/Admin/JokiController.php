<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JokiController extends Controller
{
    public function tugaskan(Request $request, $id)
{
    $request->validate([
        'joki_id' => 'nullable|exists:users,id',
        'status' => 'required|string',
    ]);

    $pesanan = \App\Models\Pesanan::findOrFail($id);
    $pesanan->joki_id = $request->joki_id;
    $pesanan->status = $request->status;
    $pesanan->save();

    return redirect()->back()->with('success', 'Tugas berhasil diperbarui!');
}


   public function index()
{
    $pesanans = \App\Models\Pesanan::with(['user', 'joki'])->latest()->get();
    $jokis = \App\Models\User::where('role', 'joki')->get();

    return view('admin.joki.index', compact('pesanans', 'jokis'));
}

    
    public function kelolaPesanan()
{
    // Ambil semua pesanan yang sudah memiliki joki atau yang statusnya siap dijalankan
    $pesanans = \App\Models\Pesanan::with(['user', 'joki'])
                    ->latest()
                    ->get();

    return view('admin.joki.index', compact('pesanans'));
}

    
}

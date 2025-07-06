<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
    $pesanans = Pesanan::with('user')->latest()->get(); // Ambil semua pesanan
    return view('admin.pesanan.index', compact('pesanans'));
}

    public function create()
    {
        return view('admin.pesanan.create');
    }

    public function store(Request $request)
    {
        Pesanan::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'harga' => $request->harga,
            'detail' => $request->detail,
        ]);

        return redirect()->route('admin.pesanan.index');
    }

    public function edit($id)
    {
         $pesanan = Pesanan::findOrFail($id);
    $jokis = User::where('role', 'joki')->get();
    return view('admin.pesanan.edit', compact('pesanan', 'jokis'));
        $pesanan = Pesanan::findOrFail($id);
        return view('admin.pesanan.edit', compact('pesanan'));
    }

    public function update(Request $request, $id)
{
    $pesanan = Pesanan::findOrFail($id);

    $request->validate([
        'joki_id' => 'required|exists:users,id',
    ]);

    $pesanan->joki_id = $request->joki_id;
    $pesanan->save();

    return redirect()->route('admin.pesanan.index')->with('success', 'Tugas berhasil diberikan ke joki.');
}

}

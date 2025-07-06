<?php
namespace App\Http\Controllers\Joki;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;
use App\Http\Controllers\Joki\JokiController;
use Illuminate\Http\Request;


class TugasController extends Controller
{
    public function index()
    {
        
        $pesanans = Pesanan::where('joki_id', Auth::id())->get();
        return view('joki.tugas.index', compact('pesanans'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::where('joki_id', Auth::id())->findOrFail($id);
        return view('joki.tugas.show', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::where('joki_id', Auth::id())->findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()->route('joki.tugas.index')->with('success', 'Status diperbarui!');
    }
}

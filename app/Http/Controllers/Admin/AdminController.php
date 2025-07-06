<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
public function index()
{
    $pembayarans = Pembayaran::with('user')->get();
    return view('admin.pembayaran.index', compact('pembayarans'));
}


    public function dashboard()
    {
        return view('admin.dashboard'); // Pastikan file ini ada di: resources/views/admin/dashboard.blade.php
    }
}

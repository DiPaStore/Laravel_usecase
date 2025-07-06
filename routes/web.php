<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JokiController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Customer\PesananController as CustomerPesananController;
use App\Http\Controllers\Joki\TugasController;
Route::put('/admin/joki/tugaskan/{id}', [\App\Http\Controllers\Admin\JokiController::class, 'tugaskan'])->name('admin.joki.tugaskan');

Route::get('/admin/joki/index', [\App\Http\Controllers\Admin\JokiController::class, 'indexPesanan'])->name('admin.joki.index');

// Letakkan DI LUAR group "prefix('customer')"
Route::post('customer/pembayaran/{pesanan_id}', [\App\Http\Controllers\Customer\PembayaranController::class, 'store'])->name('customer.pembayaran.store');

// Route tampil form
Route::get('customer/pembayaran/{pesanan_id}', [\App\Http\Controllers\Customer\PembayaranController::class, 'create'])->name('customer.pembayaran.create');


// 🏠 Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// 📊 Dashboard berdasarkan role
Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'customer') {
        return view('customer.dashboard');
    } elseif ($user->role === 'joki') {
        return view('joki.dashboard');
    } else {
        abort(403, 'Role tidak dikenali.');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// ⚙️ Admin routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('pesanan', PesananController::class); // pastikan route ini aktif
});
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/pembayaran', [AdminPembayaranController::class, 'index'])->name('admin.pembayaran.index');
    Route::put('/pembayaran/{id}', [AdminPembayaranController::class, 'update'])->name('admin.pembayaran.update');
});
Route::put('/admin/pembayaran/{id}', [PembayaranController::class, 'update'])->name('admin.pembayaran.update');
Route::get('/admin/joki/index', [\App\Http\Controllers\Admin\JokiController::class, 'indexPesanan'])->name('admin.joki.index');



Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('pesanan', PesananController::class);
    Route::resource('joki', JokiController::class);
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('pembayaran', PembayaranController::class); // ini penting!
});


// 🧑‍💼 Customer routes
Route::middleware(['auth'])->prefix('customer')->name('customer.')->group(function () {
    // Halaman daftar pesanan
    Route::get('pesanan', [CustomerPesananController::class, 'index'])->name('pesanan.index');
    Route::get('pesanan/create', [CustomerPesananController::class, 'create'])->name('pesanan.create');
    Route::post('pesanan', [CustomerPesananController::class, 'store'])->name('pesanan.store');

    // ✅ Tambahkan route untuk pembayaran
    Route::get('pesanan/{id}/bayar', [CustomerPesananController::class, 'bayar'])->name('pesanan.bayar');
    Route::post('pesanan/{id}/bayar', [PembayaranController::class, 'store'])->name('pesanan.bayar.store');

    

    // Resource route (harus di akhir agar tidak bentrok)
    Route::resource('pesanan', CustomerPesananController::class);
});

// 🎮 Joki routes
Route::prefix('joki')->middleware(['auth'])->name('joki.')->group(function () {
    Route::get('tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('tugas/{id}', [TugasController::class, 'show'])->name('tugas.show');
    Route::post('tugas/{id}/status', [TugasController::class, 'updateStatus'])->name('tugas.update');
});

// 👤 Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔐 Auth
require __DIR__.'/auth.php';

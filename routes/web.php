<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\Admin\InventarisController;
use App\Http\Controllers\User\PeminjamanInventarisController as UserPeminjamanInventarisController;
use App\Http\Controllers\Admin\PeminjamanInventarisController as AdminPeminjamanInventarisController;
use App\Http\Controllers\CekKetersediaanRuanganController;

// ✅ Cek Ketersediaan Ruangan
Route::get('/cek-ketersediaan-ruangan', [CekKetersediaanRuanganController::class, 'form'])->name('cek.ketersediaan.form');
Route::post('/cek-ketersediaan-ruangan', [CekKetersediaanRuanganController::class, 'cek'])->name('cek.ketersediaan.cek');

// ✅ Static Views
Route::get('/audit', [RuanganController::class, 'showAuditorium'])->name('audit');
Route::get('/auditorium', [RuanganController::class, 'showAuditorium'])->name('auditorium.show');
Route::get('/a201', [RuanganController::class, 'showA201'])->name('a201');
Route::get('/b201', [RuanganController::class, 'showB201'])->name('b201');

// ✅ Home Route
Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    }
    return view('welcome');
});

// ✅ USER ROUTES
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Form peminjaman ruangan
    Route::get('/user/peminjaman/ruangan', [PeminjamanController::class, 'formRuangan'])->name('user.peminjaman.ruangan');
    Route::post('/user/peminjaman/ruangan', [PeminjamanController::class, 'storeRuangan'])->name('user.peminjaman.ruangan.store');

    // Form peminjaman inventaris
    Route::get('/user/peminjaman/inventaris', [UserPeminjamanInventarisController::class, 'create'])->name('user.peminjaman.inventaris');
    Route::post('/user/peminjaman/inventaris', [UserPeminjamanInventarisController::class, 'store'])->name('user.peminjaman.inventaris.store');
});

// ✅ ADMIN ROUTES
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard/user', [AdminDashboardController::class, 'show'])->name('admin.users.index');

    // Data Inventaris
    Route::get('/admin/inventaris', [InventarisController::class, 'index'])->name('admin.inventaris.index');

    // Data Peminjaman Ruangan
    Route::get('/admin/peminjaman', [PeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    Route::get('/admin/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('admin.peminjaman.show');

    // Data Peminjaman Inventaris
    Route::get('/admin/peminjaman-inventaris', [AdminPeminjamanInventarisController::class, 'index'])->name('admin.peminjaman_inventaris.index');
    Route::get('/peminjaman/inventaris/{id}', [AdminPeminjamanInventarisController::class, 'show'])->name('peminjaman_inventaris.show');

    // Approve & Reject
    Route::patch('/admin/peminjaman/{id}/approve', [PeminjamanController::class, 'approve'])->name('admin.peminjaman.approve');
    Route::patch('/admin/peminjaman/{id}/reject', [PeminjamanController::class, 'reject'])->name('admin.peminjaman.reject');
    Route::patch('/admin/peminjaman/inventaris/{id}/approve', [AdminPeminjamanInventarisController::class, 'approve'])->name('admin.peminjaman_inventaris.approve');
    Route::patch('/admin/peminjaman/inventaris/{id}/reject', [AdminPeminjamanInventarisController::class, 'reject'])->name('admin.peminjaman_inventaris.reject');

    // Resource Data Ruangan
    Route::resource('/admin/ruangan', RuanganController::class)->names([
        'index'   => 'admin.ruangan.index',
        'create'  => 'admin.ruangan.create',
        'store'   => 'admin.ruangan.store',
        'show'    => 'admin.ruangan.show',
        'edit'    => 'admin.ruangan.edit',
        'update'  => 'admin.ruangan.update',
        'destroy' => 'admin.ruangan.destroy',
    ]);
});

// ✅ Redirect setelah login berdasarkan usertype
Route::get('/redirect-after-login', function () {
    $user = Auth::user();
    return $user?->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('user.dashboard');
})->middleware('auth');

// ✅ Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// ✅ Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Auth generated routes

Route::get('/admin', function () {
    return 'abcd';
});
require __DIR__ . '/auth.php';

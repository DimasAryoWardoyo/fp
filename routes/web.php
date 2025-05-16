<?php

use App\Http\Controllers\AnggotaFinanceController;
use App\Http\Controllers\BroadcastController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PerlengkapanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\NotulenController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Anggota\AnggotaController;
use App\Http\Controllers\FinanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ====================
// Halaman Utama (Public)
// ====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kategori/{id}', [HomeController::class, 'kategori'])->name('kategori.show');
Route::get('/kategori', [HomeController::class, 'kategoryPage'])->name('kategori');
Route::get('/konten/{id}', [HomeController::class, 'show'])->name('konten.show');
Route::get('/keanggotaan', [HomeController::class, 'keanggotaan'])->name('keanggotaan');
route::get('/tentang-kami', [HomeController::class, 'tentang'])->name('tentangKami');




// ====================
// Autentikasi
// ====================
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

// ====================
// Route Umum (Login Diperlukan)
// ====================
Route::middleware(['auth'])->group(function () {

    // Dashboard & Profil
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [IdentitasController::class, 'index'])->name('identitas.index');
    Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('identitas.user.edit-profile');
    Route::put('/update-profile', [UserController::class, 'updateProfile'])->name('user.update-profile');

    Route::get('/identitas/{identitas}/edit', [IdentitasController::class, 'edit'])->name('identitas.edit');
    Route::put('/identitas/{identitas}', [IdentitasController::class, 'update'])->name('identitas.update');

    // Identitas
    Route::resource('identitas', IdentitasController::class)->except(['show']);

    // Struktur Organisasi
    Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur.index');

    // Agenda
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/agenda/{id}', [AgendaController::class, 'show'])->name('agenda.show');

    // Notulen (semua user bisa lihat detail notulen)
    Route::resource('/agenda/notulen', NotulenController::class)->only(['index']);
    Route::get('/agenda/notulen/{notulen}', [NotulenController::class, 'show'])->name('notulen.show');

    Route::get('/perlengkapan', [PerlengkapanController::class, 'index'])->name('perlengkapan.index');
    Route::get('/perlengkapan/{perlengkapan}', [PerlengkapanController::class, 'show'])->name('perlengkapan.show');
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/perlengkapan/peminjaman/create/{id}', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/perlengkapan/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
});

// ====================
// Route Khusus Admin
// ====================

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Agenda (Create)
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
    Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');

    // Presensi (Admin)
    Route::get('/agenda/{id}/presensi', [PresensiController::class, 'index'])->name('presensi.index');
    Route::post('/agenda/{id}/presensi/open', [PresensiController::class, 'open'])->name('presensi.open');
    Route::post('/agenda/{id}/presensi/close', [PresensiController::class, 'close'])->name('presensi.close');

    // Notulen (CRUD Admin)
    Route::get('/agenda/notulen/create', [NotulenController::class, 'create'])->name('notulen.create');
    Route::post('/agenda/notulen', [NotulenController::class, 'store'])->name('notulen.store');
    Route::get('/agenda/notulen/{notulen}/edit', [NotulenController::class, 'edit'])->name('notulen.edit');
    Route::put('/agenda/notulen/{notulen}', [NotulenController::class, 'update'])->name('notulen.update');

    // Kelola User (Admin)
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    Route::get('/finance', [FinanceController::class, 'index'])->name('admin.finance.index');
    Route::get('/finance/kas/create', [FinanceController::class, 'createKas'])->name('admin.finance.kas.create');
    Route::post('/finance/kas/store', [FinanceController::class, 'storeKas'])->name('admin.finance.kas.store');
    Route::get('/finance/kas/{user}/select', [FinanceController::class, 'selectKas'])->name('admin.finance.select');
    Route::get('/finance/hutang', [FinanceController::class, 'daftarHutang'])->name('admin.finance.hutang');
    Route::post('/finance/hutang/{id}/selesai', [FinanceController::class, 'selesaikanHutang'])->name('admin.finance.selesai_hutang');
    Route::get('/finance/dana-lain/create', [FinanceController::class, 'createDanaLain'])->name('admin.finance.dana_lain.create');
    Route::post('/finance/dana-lain/store', [FinanceController::class, 'storeDanaLain'])->name('admin.finance.dana_lain.store');
    Route::get('/finance/pengeluaran/create', [FinanceController::class, 'createPengeluaran'])->name('admin.finance.pengeluaran.create');
    Route::post('/finance/pengeluaran/store', [FinanceController::class, 'storePengeluaran'])->name('admin.finance.pengeluaran.store');

    Route::get('/perlengkapan/create', [PerlengkapanController::class, 'create'])->name('perlengkapan.create');
    Route::post('/perlengkapan', [PerlengkapanController::class, 'store'])->name('perlengkapan.store');
    Route::get('/perlengkapan/{perlengkapan}/edit', [PerlengkapanController::class, 'edit'])->name('perlengkapan.edit');
    Route::put('/perlengkapan/{perlengkapan}', [PerlengkapanController::class, 'update'])->name('perlengkapan.update');
    Route::delete('/perlengkapan/{perlengkapan}', [PerlengkapanController::class, 'destroy'])->name('perlengkapan.destroy');

    Route::get('/perlengkapan/peminjaman/tanggapan', [PeminjamanController::class, 'daftarPengajuan'])->name('peminjaman.tanggapan');
    Route::post('/perlengkapan/peminjaman/{peminjaman}/tanggapi', [PeminjamanController::class, 'tanggapi'])->name('peminjaman.tanggapi');
    Route::get('/perlengkapan/peminjaman/cek-selesai', [PeminjamanController::class, 'cekDanKembalikan'])->name('peminjaman.cekSelesai');

    // ===== KONTEN =====
    Route::get('/content', [ContentController::class, 'index'])->name('admin.content.index');
    Route::get('/content/create', [ContentController::class, 'create'])->name('admin.content.create');
    Route::post('/content/store', [ContentController::class, 'store'])->name('admin.content.store');
    Route::get('/content/{id}/edit', [ContentController::class, 'edit'])->name('admin.content.edit');
    Route::put('/content/{id}/update', [ContentController::class, 'update'])->name('admin.content.update');
    Route::delete('/content/{id}', [ContentController::class, 'destroy'])->name('admin.content.destroy');

    // ===== KATEGORI =====
    Route::get('/content/category', [ContentController::class, 'createCategory'])->name('admin.content.kategori');
    Route::post('/content/kategori', [ContentController::class, 'storeCategory'])->name('admin.content.kategori.store');

    Route::get('/struktur/create', [StrukturController::class, 'create'])->name('struktur.create');
    Route::post('/struktur', [StrukturController::class, 'store'])->name('struktur.store');
    Route::get('/struktur/{struktur}/edit', [StrukturController::class, 'edit'])->name('struktur.edit');
    Route::put('/struktur/{struktur}', [StrukturController::class, 'update'])->name('struktur.update');
    Route::delete('/struktur/{id}', [StrukturController::class, 'destroy'])->name('struktur.destroy');
});


Route::get('/broadcast', [BroadcastController::class, 'index'])->name('broadcast.form');
Route::post('/broadcast/send', [BroadcastController::class, 'send'])->name('broadcast.send');

// ====================
// Route Khusus Anggota
// ====================
Route::middleware(['auth', 'role:anggota'])->group(function () {

    // Presensi (Form dan Simpan)
    Route::get('/agenda/{id}/presensi/form', [PresensiController::class, 'form'])->name('presensi.form');
    Route::post('/agenda/{id}/presensi', [PresensiController::class, 'store'])->name('presensi.store');

    // Untuk anggota melihat ringkasan keuangan
    Route::get('/overview', [AnggotaFinanceController::class, 'index'])->name('overview');
    Route::get('/overview/pengeluaran/{id}', [App\Http\Controllers\AnggotaFinanceController::class, 'show'])->name('anggota.pengeluaran.show');
});

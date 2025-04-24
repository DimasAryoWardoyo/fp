<?php

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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ====================
// Halaman Utama (Public)
// ====================
Route::get('/', [HomeController::class, 'index'])->name('home');

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
    Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('user.edit-profile');
    Route::put('/update-profile', [UserController::class, 'updateProfile'])->name('user.update-profile');

    // Identitas
    Route::resource('identitas', IdentitasController::class)->except(['show']);

    // Struktur Organisasi
    Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur.index');

    // Agenda
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/agenda/{id}', [AgendaController::class, 'show'])->name('agenda.show');

    // Notulen (semua user bisa lihat detail notulen)
    Route::resource('notulen', NotulenController::class)->only(['index']);
    Route::get('/notulen/{notulen}', [NotulenController::class, 'show'])->name('notulen.show');
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
    Route::get('/notulen/create', [NotulenController::class, 'create'])->name('notulen.create');
    Route::post('/notulen', [NotulenController::class, 'store'])->name('notulen.store');
    Route::get('/notulen/{notulen}/edit', [NotulenController::class, 'edit'])->name('notulen.edit');
    Route::put('/notulen/{notulen}', [NotulenController::class, 'update'])->name('notulen.update');
});

// ====================
// Route Khusus Anggota
// ====================
Route::middleware(['auth', 'role:anggota'])->group(function () {

    // Presensi (Form dan Simpan)
    Route::get('/agenda/{id}/presensi/form', [PresensiController::class, 'form'])->name('presensi.form');
    Route::post('/agenda/{id}/presensi', [PresensiController::class, 'store'])->name('presensi.store');
});

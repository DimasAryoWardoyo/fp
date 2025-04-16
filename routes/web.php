<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotulenController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\StrukturController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Anggota\AnggotaController;
use App\Http\Controllers\IdentitasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [IdentitasController::class, 'index'])->name('identitas.index');

    Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur.index');
    // Routes untuk semua pengguna
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/agenda/{id}', [AgendaController::class, 'show'])->name('agenda.show');

    // Routes khusus anggota
    Route::post('/agenda/{id}/presensi', [PresensiController::class, 'store'])
        ->middleware('role:anggota')
        ->name('presensi.store');
});



// ===========================
// ROUTE UNTUK ADMIN
// ===========================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Agenda
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
    Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');

    // Presensi Admin (buka, tutup, lihat daftar)
    Route::get('/agenda/{id}/presensi', [PresensiController::class, 'index'])->name('presensi.index');
    Route::post('/agenda/{id}/presensi/open', [PresensiController::class, 'open'])->name('presensi.open');
    Route::post('/agenda/{id}/presensi/close', [PresensiController::class, 'close'])->name('presensi.close');

    // Notulen
    Route::get('/notulen/create', [NotulenController::class, 'create'])->name('notulen.create');
    Route::post('/agenda/{id}/notulen', [NotulenController::class, 'store'])->name('notulen.store');
});


// ===========================
// ROUTE UNTUK ANGGOTA (USER BIASA)
// ===========================
Route::middleware(['auth', 'role:anggota'])->group(function () {

    // Formulir presensi
    Route::get('/agenda/{id}/presensi/form', [PresensiController::class, 'form'])->name('presensi.form');

    // Simpan presensi (pakai token)
    Route::post('/agenda/{id}/presensi', [PresensiController::class, 'store'])->name('presensi.store');
});


Route::resource('identitas', IdentitasController::class);


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

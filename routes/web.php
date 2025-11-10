<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\KtuController;
use App\Http\Controllers\AdminController;

// Halaman umum
Route::get('/', [LandingController::class, 'index'])->name('LandingPage');
Route::get('/requirement', [LandingController::class, 'requirement'])->name('s&k');
Route::get('/kontak', [LandingController::class, 'kontak'])->name('kontak');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Route::post('/register-proses', [AuthController::class, 'register'])->name('register.proses');
// Halaman Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Proses Register
Route::post('/register-proses', [AuthController::class, 'register'])->name('register.proses');


// Halaman Administrator
// Route::middleware(['auth', 'role:administrator'])->prefix('administrator')->group(function(){    
    Route::get('/administrator', [AdministratorController::class, 'index']);
    Route::get('/administrator/berkas', [AdministratorController::class, 'daftarBerkas'])->name('berkas_terdaftar');
    Route::get('/administrator/arsip', [AdministratorController::class, 'arsipBerkas'])->name('arsip_berkas');
    Route::get('/administrator/requirement', [AdministratorController::class, 'requirement'])->name('panduan_administrator');
// });

// Halaman KTU
// Route::middleware(['auth', 'role:ktu'])->prefix('ktu')->group(function() {
    Route::get('/ktu', [KtuController::class, 'index']);
    Route::get('/ktu/berkas', [KtuController::class, 'daftarBerkas']);
    Route::get('/ktu/arsip', [KtuController::class, 'arsipBerkas']);
    Route::get('/ktu/requirement', [KtuController::class, 'requirement']);
// });

// Halaman Admin
// Route::middleware(['auth', 'role:admin'])->prefix('admin')->group( function() {
    Route::get('/admin/kelola_pengguna', [AdminController::class, 'kelola_pengguna']);
// });

// Halaman PPAT
// Route::middleware(['auth', 'role:ppat'])->prefix('ppat')->group( function() {
    Route::get('/ppat/pengajuan', [PPATController::class, 'pengajuan'])->name('pengajuan');
// });


Route::get('/profile', function () {
    return view('KTU.profile');
})->name('profile');
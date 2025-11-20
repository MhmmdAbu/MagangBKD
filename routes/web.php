<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\KtuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PPATController;

// Halaman umum
Route::get('/', [LandingController::class, 'index'])->name('LandingPage');
Route::get('/requirement', [LandingController::class, 'requirement'])->name('requirement');
Route::get('/kontak', [LandingController::class, 'kontak'])->name('kontak');

// Auth
Route::GET('/login', [AuthController::class, 'showLogin'])->name('login');
Route::POST('/login-proses', [AuthController::class, 'login'])->name('login.proses');
Route::POST('/register-proses', [AuthController::class, 'register'])->name('register.proses');
Route::GET('/register', function () {
    return view('auth.register');
});


// Halaman Administrator
// Route::middleware(['auth', 'role:administrator'])->prefix('administrator')->group(function(){    
    Route::GET('/administrator', [AdministratorController::class, 'index']);
    Route::GET('/administrator/berkas', [AdministratorController::class, 'daftarBerkas'])->name('berkas_terdaftar');
    Route::GET('/administrator/arsip', [AdministratorController::class, 'arsipBerkas'])->name('arsip_berkas');
    Route::GET('/administrator/requirement', [AdministratorController::class, 'requirement'])->name('panduan_administrator');
// });

// Halaman KTU
// Route::middleware(['auth', 'role:ktu'])->prefix('ktu')->group(function() {
    Route::GET('/ktu', [KtuController::class, 'index']);
    Route::GET('/ktu/berkas', [KtuController::class, 'daftarBerkas']);
    Route::GET('/ktu/arsip', [KtuController::class, 'arsipBerkas']);
    Route::GET('/ktu/requirement', [KtuController::class, 'requirement']);
// });

// Halaman PPAT
// Route::middleware(['auth', 'role:ppat'])->prefix('ppat')->group(function() {
    Route::GET('/pengajuan', [PPATController::class, 'pengajuan'])->name('pengajuan');
// });

// Halaman Admin
Route::get('/dashAdministrator', function () {
    return view('Administrator.Dashboard');
})->name('dashAdministrator');
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function() {
    // Kelola Panduan
    Route::GET('/kelola-panduan', [AdminController::class, 'kelola_panduan'])->name('kelola_panduan');

    // Kelola Pengguna
    Route::GET('/kelola-pengguna', [AdminController::class, 'kelola_pengguna'])->name('kelola_pengguna');
    Route::PUT('/kelola-pengguna/update/{id}', [AdminController::class, 'update'])->name('admin.user.update');
    Route::DELETE('/kelola-pengguna/delete/{id}', [AdminController::class, 'destroy'])->name('admin.user.delete');
});

Route::GET('/profile', function () {
    return view('KTU.profile');
})->name('profile');
Route::get('/kelola_pengguna', function () {
    return view('Admin.kelola_pengguna');
})->name('kelola_pengguna');
Route::get('/kelolaS&K', function () {
    return view('Admin.kelola_panduan&syarat');
})->name('kelolaS&K');
Route::GET('/panduan', function () {
    return view('panduan');
})->name('panduan');
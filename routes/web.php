<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\KtuController;
use App\Http\Controllers\PPATController;

// Halaman umum
Route::get('/', [LandingController::class, 'index'])->name('LandingPage');
Route::get('/requirement', [LandingController::class, 'requirement'])->name('requirement');
Route::get('/kontak', [LandingController::class, 'kontak'])->name('kontak');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Halaman Administrator
// Route::middleware(['auth', 'role:administrator'])->prefix('administrator')->group(function(){    
    Route::get('/administrator', [AdministratorController::class, 'index']);
    Route::get('/administrator/berkas', [AdministratorController::class, 'daftarBerkas'])->name('berkas_terdaftar');
    Route::get('/administrator/arsip', [AdministratorController::class, 'arsipBerkas'])->name('arsip_berkas');
    Route::get('/administrator/requirement', [AdministratorController::class, 'requirement'])->name('panduan');  // Jika ada duplikasi, pastikan unik
// });

// Halaman KTU
// Route::middleware(['auth', 'role:ktu'])->prefix('ktu')->group(function() {
    Route::get('/ktu', [KtuController::class, 'index']);
    Route::get('/ktu/berkas', [KtuController::class, 'daftarBerkas']);
    Route::get('/ktu/arsip', [KtuController::class, 'arsipBerkas']);
    Route::get('/ktu/requirement', [KtuController::class, 'requirement']);
// });

// Halaman PPAT
// Route::middleware(['auth', 'role:ppat'])->prefix('ppat')->group(function() {
    Route::get('/pengajuan', [PPATController::class, 'pengajuan'])->name('pengajuan');
// });

Route::get('/profile', function () {
    return view('KTU.profile');
})->name('profile');
Route::get('/kelola_pengguna', function () {
    return view('Admin.kelola_pengguna');
})->name('kelola_pengguna');
Route::get('/kelolaS&K', function () {
    return view('Admin.kelola_panduan&syarat');
})->name('kelolaS&K');
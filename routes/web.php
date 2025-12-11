<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\KtuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PPATController;
use App\Http\Controllers\KepalaUPTDController;
use App\Http\Controllers\kordinatorController;

// Halaman umum
Route::get('/', [LandingController::class, 'index'])->name('LandingPage');
Route::get('/requirement', [LandingController::class, 'requirement'])->name('requirement');
Route::get('/kontak', [LandingController::class, 'kontak'])->name('kontak');

// Auth
Route::GET('/login', [AuthController::class, 'showLogin'])->name('login');
Route::POST('/login-proses', [AuthController::class, 'login'])->name('login.proses');
Route::POST('/logout', [AuthController::class, 'logout'])->name('logout');
Route::POST('/register-proses', [AuthController::class, 'register'])->name('register.proses');
Route::GET('/register', function () {
    return view('auth.register');
});


// Halaman Administrator
Route::middleware(['auth', 'role:Administrator'])->prefix('Administrator')->group(function(){    
    Route::GET('/', [AdministratorController::class, 'index'])->name('administrator.dashboard');
    Route::GET('/berkas', [AdministratorController::class, 'daftarBerkas'])->name('administrator.berkas_terdaftar');
    Route::GET('/preview/{namaPDF}', [AdministratorController::class, 'previewBerkas'])->name('preview.berkas');
    Route::GET('/preview/kelengkapan/{namaPDF}', [AdministratorController::class, 'previewBerkasKelengkapan'])->name('preview.kelengkapan');
    Route::GET('/arsip', [AdministratorController::class, 'arsipBerkas'])->name('administrator.arsip_berkas');
    Route::GET('/panduan', [AdministratorController::class, 'panduan'])->name('administrator.panduan');
    Route::GET('/profile', [AdministratorController::class, 'profile'])->name('administrator.profile');

    Route::POST('/{id}/valid', [AdministratorController::class, 'setValid'])->name('validasi');
    Route::POST('/{id}/invalid', [AdministratorController::class, 'setInvalid'])->name('invalidasi');
});

// Halaman KA UPTD
Route::middleware(['auth', 'role:kepala_uptd'])->prefix('kepala_uptd')->group(function(){    
    Route::GET('/kepala_uptd', [KepalaUPTDController::class, 'index'])->name('kepala_uptd.dashboard');
    Route::GET('/kepala_uptd/berkas', [KepalaUPTDController::class, 'daftarBerkas'])->name('kepala_uptd.berkas_terdaftar');
    Route::GET('/kepala_uptd/arsip', [KepalaUPTDController::class, 'arsipBerkas'])->name('kepala_uptd.arsip_berkas');
    Route::GET('/kepala_uptd/panduan', [KepalaUPTDController::class, 'panduan'])->name('kepala_uptd.panduan');
    Route::GET('/kepala_uptd/profile', [KepalaUPTDController::class, 'profile'])->name('kepala_uptd.profile');
});

// Halaman KTU
Route::middleware(['auth', 'role:KTU'])->prefix('KTU')->group(function() {
    Route::GET('/ktu', [KtuController::class, 'index'])->name('ktu.dashboard');
    Route::GET('/ktu/berkas', [KtuController::class, 'daftarBerkas'])->name('ktu.berkas');
    Route::GET('/ktu/arsip', [KtuController::class, 'arsipBerkas'])->name('ktu.arsip');
    Route::GET('/ktu/panduan', [KtuController::class, 'panduan'])->name('ktu.panduan');
    Route::GET('/ktu/profile', [KtuController::class, 'profile'])->name('ktu.profile');
});

// Halaman PPAT
Route::middleware(['auth', 'role:PPAT'])->prefix('PPAT')->group(function() {
    Route::get('/pengajuan', [PPATController::class, 'showPengajuan'])->name('pengajuan');
    Route::get('/pdf/preview/{namaPDF}', [PPATController::class, 'previewPDF'])->name('pdf.preview');
    Route::get('/pdf/preview/berkas/{namaBerkas}/{namaPDF}', [PPATController::class, 'berkasPDF'])->name('pdf.berkas');
    Route::get('/pdf/download/{namaPDF}', [PPATController::class, 'downloadPDF'])->name('pdf.download');

    Route::post('/modal-close', [PPATController::class, 'closeModal'])->name('modal.close');
    Route::post('/pengajuan-proses', [PPATController::class, 'membuatPengajuan'])->name('pengajuan.submit');
    Route::post('/pengajuan-delete-blanko', [PPATController::class, 'hapusBlanko'])->name('hapus.pengajuan');
});

// Halaman Admin
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function() {
    Route::GET('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::GET('/berkas', [AdminController::class, 'daftarBerkas'])->name('admin.berkas_terdaftar');
    Route::GET('/kelola-panduan', [AdminController::class, 'kelola_panduan'])->name('kelola_panduan');
    Route::GET('/kelola-pengguna', [AdminController::class, 'kelola_pengguna'])->name('kelola_pengguna');
    Route::PUT('/kelola-pengguna/update/{id}', [AdminController::class, 'update'])->name('admin.user.update');
    Route::DELETE('/kelola-pengguna/delete/{id}', [AdminController::class, 'destroy'])->name('admin.user.delete');
    Route::GET('/profile', [AdminController::class, 'profile'])->name('admin.profile');
});

// Halaman Kordinator survey
Route::middleware(['auth', 'role:koordinator_survey'])->prefix('koordinator_survey')->group(function(){    
    Route::GET('/kordinator', [kordinatorController::class, 'index'])->name('kordinator.dashboard');
    Route::GET('/kordinator/berkas', [kordinatorController::class, 'daftarBerkas'])->name('kordinator.berkas');
    Route::GET('/kordinator/survey', [kordinatorController::class, 'surveyBerkas'])->name('kordinator.survey');
    Route::GET('/kordinator/panduan', [kordinatorController::class, 'panduan'])->name('kordinator.panduan');
    Route::GET('/kordinator/profile', [kordinatorController::class, 'profile'])->name('kordinator.profile');
});
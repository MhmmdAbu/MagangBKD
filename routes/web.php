<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LandingPage');
})->name('LandingPage');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/s&k', function () {
    return view('s&k');
})->name('s&k');
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
Route::get('/pengajuan', function () {
    return view('PPAT.pengajuan');
})->name('pengajuan');
Route::get('/berkas_terdaftar', function () {
    return view('Administrator.berkas');
})->name('berkas_terdaftar');
Route::get('/arsip_berkas', function () {
    return view('Administrator.arsip');
})->name('arsip_berkas');
Route::get('/panduan_administrator', function () {
    return view('Administrator.panduan');
})->name('panduan_administrator');
Route::get('/berkas_terdaftar_KTU', function () {
    return view('KTU.berkas_terdaftar');
})->name('berkas_terdaftar_KTU');
Route::get('/arsip_berkas_KTU', function () {
    return view('KTU.arsip');
})->name('arsip_berkas_KTU');
Route::get('/panduan_KTU', function () {
    return view('KTU.panduan');
})->name('panduan_KTU');
Route::get('/profile', function () {
    return view('KTU.profile');
})->name('profile');
Route::get('/kelola_pengguna', function () {
    return view('Admin.kelola_pengguna');
})->name('kelola_pengguna');
@extends('Layout.LayoutKorSur')

@section('title','Berkas Terdaftar')

<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="filter-controls">
                <div class="input-group" style="max-width: 200px;">
                    <input type="date" class="form-control border-start-0" placeholder="Tanggal">
                </div>
                <input type="search" class="form-control search-input" placeholder="Cari ...">
                <select class="form-select" aria-label="Status Filter" style="max-width: 150px;">
                    <option selected>Status</option>
                    <option value="1">Pendaftaran</option>
                    <option value="2">Survey</option>
                    <option value="3">Selesai</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-riwayat mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">No</th>
                                    <th style="width: 20%;">Nama Wajib Pajak</th>
                                    <th style="width: 20%;">Alamat</th>
                                    <th style="width: 20%;">Surveyor</th>
                                    <th style="width: 20%;">Status</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>St. Nur Aisyah. S</td>
                                    <td>Jl. Bau Massepe</td>
                                    <td>-</td>
                                    <td>Belum Ada Surveyor</td>
                                    <td class="aksi">
                                        <button type="button" class="btn btn-warning btn-sm" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#detailModal"
                                                data-nomor-surat="001/A/SURAT/X/2025"
                                                data-tanggal="22 Oktober 2025"
                                                data-nama="St. Nur Aisyah. S"
                                                data-status="Pendaftaran">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>St. Nur Aisyah. S</td>
                                    <td>Jl. Bau Massepe</td>
                                    <td>Abu</td>
                                    <td>Menunggu Survey</td>
                                    <td class="aksi">
                                        <button type="button" class="btn btn-warning btn-sm" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#detailModal"
                                                data-nomor-surat="001/A/SURAT/X/2025"
                                                data-tanggal="22 Oktober 2025"
                                                data-nama="St. Nur Aisyah. S"
                                                data-status="Pendaftaran">
                                            Lihat
                                        </button>
                                    </td>
                                </tr>
                                <tr><td colspan="6">&nbsp;</td></tr>
                                <tr><td colspan="6">&nbsp;</td></tr>
                                <tr><td colspan="6">&nbsp;</td></tr>
                                <tr><td colspan="6">&nbsp;</td></tr>
                                <tr><td colspan="6">&nbsp;</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
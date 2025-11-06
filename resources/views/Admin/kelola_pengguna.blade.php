@extends('Layout.tabel')

@section('title','Kelola Pengguna')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="filter-controls">
                <select class="form-select" aria-label="Role Filter" style="max-width: 150px;">
                    <option selected>Role</option>
                    <option value="1">Admin</option>
                    <option value="2">PPAT</option>
                    <option value="3">KABAN</option>
                    <option value="3">KABID</option>
                    <option value="3">KTU</option>
                    <option value="3">Survey</option>
                    <option value="3">Administrator</option>
                </select>
                <input type="search" class="form-control search-input" placeholder="Cari ...">
                <button class="button">Tambah Pengguna</button>
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
                                    <th style="width: 20%;">Nama</th>
                                    <th style="width: 20%;">Role</th>
                                    <th style="width: 20%;">Nomot Telpon</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>St. Nur Aisyah. S</td>
                                    <td>PPAT</td>
                                    <td>0812345678910</td>
                                    <td class="aksi"><a href="#" class="btn btn-warning btn-sm">Lihat</a></td>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>St. Nur Aisyah. S</td>
                                    <td>PPAT</td>
                                    <td>0812345678910</td>
                                    <td class="aksi"><a href="#" class="btn btn-warning btn-sm">Lihat</a></td>
                                </tr>
                                <tr><td colspan="5">&nbsp;</td></tr>
                                <tr><td colspan="5">&nbsp;</td></tr>
                                <tr><td colspan="5">&nbsp;</td></tr>
                                <tr><td colspan="5">&nbsp;</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
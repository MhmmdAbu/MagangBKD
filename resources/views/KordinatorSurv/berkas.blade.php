@extends('Layout.LayoutKorSur')

@section('title','Berkas Terdaftar')

<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <form id="filterForm" method="GET" action="{{ route('kordinator.berkas') }}" class="filter-controls">
                <div class="input-group" style="max-width: 200px; margin-right: 10px;">
                    <input type="date" name="tanggal" class="form-control border-start-0" 
                        value="{{ request('tanggal') }}" placeholder="Tanggal">
                </div>
                <input type="search" name="search" class="form-control search-input" 
                    placeholder="Cari ..." value="{{ request('search') }}" style="margin-right: 10px;">
                <select name="status" class="form-select" aria-label="Status Filter" style="max-width: 150px;">
                    <option {{ request('status') == '' ? 'selected' : '' }}>Status</option>
                    <option value="Pendaftaran" {{ request('status') == 'Pendaftaran' ? 'selected' : '' }}>Pendaftaran</option>
                    <option value="Survey" {{ request('status') == 'Survey' ? 'selected' : '' }}>Survey</option>
                    <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </form>
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
                                    <th style="width: 20%;">Nomor Surat</th>
                                    <th style="width: 20%;">Tanggal Dikirim</th>
                                    <th style="width: 20%;">Nama Wajib Pajak</th>
                                    <th style="width: 20%;">Status Surat</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @forelse ($berkas as $index => $item)
                                        <tr>
                                            <td>{{ ($berkas->currentPage()-1) * $berkas->perPage() + ($index+1) }}</td>
                                            <td>{{ $item->nomor_surat_masuk }}</td>
                                            <td>{{ $item->created_at->format('d F Y') }}</td>
                                            <td>{{ $item->nama_wajib_pajak }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm">
                                                    <a href="{{ route('kordinator.preview.berkas', ['namaPDF'=>$item->file_blanko]) }}" target="_blank">
                                                        Lihat Surat
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Belum ada data</td>
                                        </tr>
                                    @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $berkas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    const filterForm = document.getElementById('filterForm');

    // Submit saat tanggal berubah
    filterForm.querySelector('input[name="tanggal"]').addEventListener('change', function() {
        filterForm.submit();
    });

    // Submit saat status berubah
    filterForm.querySelector('select[name="status"]').addEventListener('change', function() {
        filterForm.submit();
    });

    // Submit saat search diketik (dengan delay supaya tidak terlalu sering)
    let searchTimeout;
    filterForm.querySelector('input[name="search"]').addEventListener('keyup', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            filterForm.submit();
        }, 500); // 500ms delay
    });
</script>
@endsection
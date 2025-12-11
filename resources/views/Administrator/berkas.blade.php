@extends('Layout.Administrator')

@section('title','Berkas Terdaftar')

<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <form id="filterForm" method="GET" action="{{ route('administrator.berkas_terdaftar') }}" class="filter-controls">
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
                                                    <a href="{{ route('preview.berkas', ['namaPDF'=>$item->file_blanko]) }}" target="_blank">
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

    <!-- Modal Detail Berkas -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Berkas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nomor Surat:</strong> <span id="modal-nomor-surat"></span></p>
                    <p><strong>Tanggal Dikirim:</strong> <span id="modal-tanggal"></span></p>
                    <p><strong>Nama Wajib Pajak:</strong> <span id="modal-nama"></span></p>
                    <p><strong>Status Surat:</strong> <span id="modal-status"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-Tdkvalid" id="btnTidakValid" data-bs-dismiss="modal">Tidak Valid</button>
                    <button type="button" class="btn btn-valid" data-bs-dismiss="modal">Valid</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Alasan Tidak Valid -->
    <div class="modal fade" id="invalidReasonModal" tabindex="-1" aria-labelledby="invalidReasonModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invalidReasonModalLabel">Alasan Tidak Valid</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="invalidReasonForm">
                        <div class="mb-3">
                            <label for="alasanTextarea" class="form-label">Masukkan Alasan:</label>
                            <textarea class="form-control" id="alasanTextarea" rows="4" placeholder="Jelaskan alasan berkas tidak valid..." required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="btnKirimAlasan">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Event listener untuk mengisi modal detail saat dibuka
    const detailModal = document.getElementById('detailModal');
    detailModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        
        const nomorSurat = button.getAttribute('data-nomor-surat');
        const tanggal = button.getAttribute('data-tanggal');
        const nama = button.getAttribute('data-nama');
        const status = button.getAttribute('data-status');
        
        document.getElementById('modal-nomor-surat').textContent = nomorSurat;
        document.getElementById('modal-tanggal').textContent = tanggal;
        document.getElementById('modal-nama').textContent = nama;
        document.getElementById('modal-status').textContent = status;
    });

    // Event listener untuk tombol "Tidak Valid"
    document.getElementById('btnTidakValid').addEventListener('click', function() {
        // Tutup modal detail
        var detailModalInstance = bootstrap.Modal.getInstance(document.getElementById('detailModal'));
        detailModalInstance.hide();
        
        // Buka modal alasan tidak valid
        var invalidModal = new bootstrap.Modal(document.getElementById('invalidReasonModal'));
        invalidModal.show();
    });

    // Event listener untuk tombol "Kirim" di modal alasan
    document.getElementById('btnKirimAlasan').addEventListener('click', function() {
        var alasan = document.getElementById('alasanTextarea').value.trim();
        if (alasan === '') {
            alert('Alasan tidak boleh kosong!');
            return;
        }
        
        // Di sini Anda bisa menambahkan logika untuk mengirim data ke server, misalnya via AJAX
        // Untuk contoh, kita tampilkan alert dan tutup modal
        alert('Alasan dikirim: ' + alasan);
        
        // Tutup modal
        var invalidModalInstance = bootstrap.Modal.getInstance(document.getElementById('invalidReasonModal'));
        invalidModalInstance.hide();
        
        // Reset form
        document.getElementById('invalidReasonForm').reset();
    });

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
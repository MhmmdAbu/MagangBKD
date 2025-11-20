@extends('Layout.utama')

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
                                    <th style="width: 20%;">Nomor Surat</th>
                                    <th style="width: 20%;">Tanggal Dikirim</th>
                                    <th style="width: 20%;">Nama Wajib Pajak</th>
                                    <th style="width: 20%;">Status Surat</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>001/A/SURAT/X/2025</td>
                                    <td>22 Oktober 2025</td>
                                    <td>St. Nur Aisyah. S</td>
                                    <td>Pendaftaran</td>
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
                                <tr>
                                    <td>2.</td>
                                    <td>002/A/SURAT/X/2025</td>
                                    <td>22 Oktober 2025</td>
                                    <td>Muh. Abubakar</td>
                                    <td>Survey</td>
                                    <td class="aksi">
                                        <button type="button" class="btn btn-warning btn-sm" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#detailModal"
                                                data-nomor-surat="002/A/SURAT/X/2025"
                                                data-tanggal="22 Oktober 2025"
                                                data-nama="Muh. Abubakar"
                                                data-status="Survey">
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
                    <button type="button" class="btn btn-valid" data-bs-dismiss="modal">Valid</button>
                    <button type="button" class="btn btn-Tdkvalid" id="btnTidakValid" data-bs-dismiss="modal">Tidak Valid</button>
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
</script>
@endsection
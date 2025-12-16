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
                                        <button type="button" class="btn btn-warning btn-sm pilih-aksi"
                                                data-nomor-surat="001/A/SURAT/X/2025"
                                                data-tanggal="22 Oktober 2025"
                                                data-nama="St. Nur Aisyah. S"
                                                data-status="Belum Ada Surveyor">
                                            Lihat
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
                                        <button type="button" class="btn btn-warning btn-sm pilih-aksi"
                                            data-nomor-surat="002/A/SURAT/X/2025"
                                            data-tanggal="22 Oktober 2025"
                                            data-nama="St. Nur Aisyah. S"
                                            data-status="Menunggu Survey">
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
    <!-- Modal Pilih Surveyor -->
    <div class="modal fade" id="modalPilihSurveyor" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Surveyor</h5>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Wajib Pajak:</strong> <span id="psNama"></span></p>
                    <p><strong>Alamat:</strong> <span id="psAlamat"></span></p>

                    <label class="fw-bold mt-2">Pilih Surveyor:</label>
                    <select id="dropdownSurveyor" class="form-select">
                        <option selected disabled>-- Pilih Surveyor --</option>
                        <option value="Abu">Abu</option>
                        <option value="Ridwan">Ridwan</option>
                        <option value="Andi">Andi</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-success" id="btnSimpanSurveyor">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Baru: Form SSPD-BPHTB -->
    <div class="modal fade" id="modalFormSSPD" tabindex="-1" aria-labelledby="modalFormSSPDLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalFormSSPDLabel">Formulir SSPD-BPHTB</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kordinator.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="nomor_surat" id="formNomorSurat">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tgl_terima" class="form-label">Tanggal Terima</label>
                                <input type="date" class="form-control" id="tgl_terima" name="tgl_terima" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nama_wajib_pajak" class="form-label">Nama Wajib Pajak</label>
                                <input type="text" class="form-control" id="nama_wajib_pajak" name="nama_wajib_pajak" required readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik">
                            </div>
                            <div class="col-md-6">
                                <label for="nop" class="form-label">NOP</label>
                                <input type="text" class="form-control" id="nop" name="nop">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="desa_kelurahan" class="form-label">Desa/Kelurahan</label>
                                <input type="text" class="form-control" id="desa_kelurahan" name="desa_kelurahan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                            </div>
                            <div class="col-md-6">
                                <label for="ppatk_ppats" class="form-label">PPATK/PPATS</label>
                                <input type="text" class="form-control" id="ppatk_ppats" name="ppatk_ppats">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="npwp" class="form-label">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp">
                            </div>
                        </div>
                        <h4>Gambaran Umum Tanah dan Bangunan</h4><hr>
                        <h5>Jenis Perolehan/Peralihan Hak</h5>
                        <h5>Tanah</h5>
                        <div class="row mb-3">
                            <label for="luas_tanah" class="form-label">Luas Tanah</label>
                            <input type="text" class="form-control" id="luas_tanah" name="luas_tanah">
                        </div>
                        <div class="row mb-3">
                            <label for="posisiStrategis" class="form-label">Letak/Posisi Strategis Tanah</label>
                            <textarea class="form-control" id="posisiStrategis" name="posisiStrategis" rows="3"></textarea>
                        </div>
                        <h5 class="text-start mb-4">Bangunan</h5><hr>
                        <div class="row mb-3">
                            <label for="luas_bangunan" class="form-label">Luas Bangunan</label>
                            <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan">
                        </div>
                        <div class="row mb-3">
                            <label for="tipeBangunan" class="form-label">Jenis/Tipe Bangunan</label>
                            <input type="text" class="form-control" id="tipeBangunan" name="tipeBangunan">
                        </div>
                        <div class="row mb-3">
                            <label for="jmlhLantai" class="form-label">Jumlah Lantai</label>
                            <input type="number" class="form-control" id="jmlhLantai" name="jmlhLantai">
                        </div>
                        <div class="row mb-3">
                            <label for="kondisiBangunan" class="form-label">Kondisi Umum Fisik Bangunan</label>
                            <textarea class="form-control" id="kondisiBangunan" name="kondisiBangunan" rows="3"></textarea>
                        </div>
                        <h5 class="text-start mb-4">Catatan Khusus</h5><hr>
                        <div class="row mb-3">
                            <label for="catatanKhusus" class="form-label">Catatan Khusus</label>
                            <textarea class="form-control" id="catatanKhusus" name="catatanKhusus" rows="3"></textarea>
                        </div>
                        <div class="file-group">
                            <label for="file_foto_bangunan">Dokumentasi Survey</label>
                            <div class="custom-file-input-group">
                                <label class="btn-choose-file" for="file_foto_bangunan">Choose File</label>
                                <input type="file" name="file_foto_bangunan" id="file_foto_bangunan" required onchange="updateFileName(this, 'name_foto_bangunan')">
                                <span id="name_foto_bangunan" class="file-name-display">No File Choosen</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Generate & Preview PDF
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(session('previewPDF'))
    <div class="modal fade show" id="previewModal" style="display:block; background:rgba(0,0,0,0.6);" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Preview PDF Formulir Survey</h5>
                <a href="{{ url()->current() }}" class="btn-close"></a>
            </div>

            <div class="modal-body">
                <iframe src="data:application/pdf;base64,{{ session('surveyPDF') }}"
                        style="width:100%; height:75vh;"></iframe>
            </div>

            <div class="modal-footer">
                <a href="{{ route('kordinator.downloadPdf') }}" class="btn btn-primary">Download PDF</a>

                <form action="{{ route('kordinator.savePdf') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>

            </div>
        </div>
    </div>
    @endif

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var tombolAksi = document.querySelectorAll(".pilih-aksi");

        tombolAksi.forEach(btn => {
            btn.addEventListener("click", function () {
                window.activeRow = this.closest("tr");

                let status = this.getAttribute("data-status");
                let nama = this.getAttribute("data-nama");
                let alamat = window.activeRow.children[2].innerText;
                let nomorSurat = this.getAttribute("data-nomor-surat");

                if (status === "Belum Ada Surveyor") {
                    document.getElementById("psNama").textContent = nama;
                    document.getElementById("psAlamat").textContent = alamat;
                    new bootstrap.Modal(document.getElementById("modalPilihSurveyor")).show();
                } 
                else if (status === "Menunggu Survey") {
                    // Isi form dengan data dari baris
                    document.getElementById("formNomorSurat").value = nomorSurat;
                    document.getElementById("nama_wajib_pajak").value = nama;
                    document.getElementById("alamat").value = alamat;
                    // Tambahkan field lain jika perlu
                    new bootstrap.Modal(document.getElementById("modalFormSSPD")).show();
                }
            });
        });

        function updateFileName(input, displayId) {
            const fileName = input.files.length > 0 ? input.files[0].name : 'No File Choosen';
            const displayElement = document.getElementById(displayId);
            if (displayElement) {
                displayElement.textContent = fileName;
            }
        }

        document.querySelectorAll('#modalFormSSPD input[type="file"]').forEach(input => {
            input.addEventListener('change', function() {
                const displayId = 'name_' + this.name.replace('file_', '');
                updateFileName(this, displayId);
            });
        });

        document.getElementById("btnSimpanSurveyor").addEventListener("click", function () {
            let dropdown = document.getElementById("dropdownSurveyor");
            let surveyorDipilih = dropdown.value;

            if (!surveyorDipilih || surveyorDipilih === "-- Pilih Surveyor --") {
                alert("Silakan pilih surveyor dahulu!");
                return;
            }

            let row = window.activeRow;
            row.children[3].innerText = surveyorDipilih;
            row.children[4].innerText = "Menunggu Survey";
            let btn = row.querySelector(".pilih-aksi");
            btn.setAttribute("data-status", "Menunggu Survey");

            let modal = bootstrap.Modal.getInstance(document.getElementById("modalPilihSurveyor"));
            modal.hide();
            dropdown.value = "-- Pilih Surveyor --";
        });
    });
    </script>

@endsection
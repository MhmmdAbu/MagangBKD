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
    <!-- Modal Detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Berkas</h5>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Wajib Pajak:</strong> <span id="dtNama"></span></p>
                    <p><strong>Alamat:</strong> <span id="dtAlamat"></span></p>
                    <p><strong>Status:</strong> <span id="dtStatus"></span></p>
                    <p><strong>Tanggal:</strong> <span id="dtTanggal"></span></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    var tombolAksi = document.querySelectorAll(".pilih-aksi");

    tombolAksi.forEach(btn => {
        btn.addEventListener("click", function () {
            window.activeRow = this.closest("tr");

            let status = this.getAttribute("data-status");
            let nama = this.getAttribute("data-nama");
            let alamat = window.activeRow.children[2].innerText;
            let tanggal = this.getAttribute("data-tanggal");

            if (status === "Belum Ada Surveyor") {
                document.getElementById("psNama").textContent = nama;
                document.getElementById("psAlamat").textContent = alamat;
                new bootstrap.Modal(document.getElementById("modalPilihSurveyor")).show();
            } 
            else if (status === "Menunggu Survey") {
                document.getElementById("dtNama").textContent = nama;
                document.getElementById("dtAlamat").textContent = alamat;
                document.getElementById("dtStatus").textContent = status;
                document.getElementById("dtTanggal").textContent = tanggal;
                new bootstrap.Modal(document.getElementById("modalDetail")).show();
            }
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
@extends('Layout.KAuptd')

@section('title','Berkas Terdaftar')

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
                        <table class="table table-hover table-riwayat">
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
                                        <button type="button" class="btn btn-warning btn-sm lihat-berkas">Lihat</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>002/A/SURAT/X/2025</td>
                                    <td>22 Oktober 2025</td>
                                    <td>Muh. Abubakar</td>
                                    <td>Survey</td>
                                    <td class="aksi">
                                        <button type="button" class="btn btn-warning btn-sm lihat-berkas">Lihat</button>
                                    </td>
                                </tr>
                                <tr><td colspan="6">&nbsp;</td></tr>
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
</div>
<!-- Modal Detail Berkas -->
<div class="modal fade" id="modalDetail" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Berkas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nomor Surat:</strong> <span id="dtNomor"></span></p>
                <p><strong>Tanggal Dikirim:</strong> <span id="dtTanggal"></span></p>
                <p><strong>Nama Wajib Pajak:</strong> <span id="dtNama"></span></p>
                <p><strong>Status Surat:</strong> <span id="dtStatus"></span></p>
            </div>
            <div class="modal-footer" style="align-item:center;">
                <button class="btn btn-danger" id="btnKlarifikasi">Klarifikasi</button>
                <button class="btn btn-success" style="background-color:blue;" id="btnSetujui">Setujui</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Catatan Klarifikasi -->
<div class="modal fade" id="modalKlarifikasi" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Catatan Klarifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <textarea id="inputKlarifikasi" class="form-control"
                    placeholder="Tulis klarifikasi di sini..."
                    style="height: 250px; resize: none;">
                </textarea>
            </div>

            <div class="modal-footer d-flex justify-content-end" style="display:flex;flex-direction:row;">
                <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" id="btnKirimKlarifikasi">Kirim</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var buttons = document.querySelectorAll(".lihat-berkas");
    var modalDetail = new bootstrap.Modal(document.getElementById("modalDetail"));
    var modalKlarifikasi = new bootstrap.Modal(document.getElementById("modalKlarifikasi"));

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            let row = this.closest("tr");

            document.getElementById("dtNomor").textContent = row.children[1].innerText;
            document.getElementById("dtTanggal").textContent = row.children[2].innerText;
            document.getElementById("dtNama").textContent = row.children[3].innerText;
            document.getElementById("dtStatus").textContent = row.children[4].innerText;

            modalDetail.show();
        });
    });

    document.getElementById("btnSetujui").addEventListener("click", function () {
        alert("Berkas berhasil disetujui!");
        modalDetail.hide();
    });

    // Tombol Klarifikasi
    document.getElementById("btnKlarifikasi").addEventListener("click", function () {
        modalDetail.hide();       // Tutup modal detail dulu
        modalKlarifikasi.show();  // Tampilkan modal klarifikasi
    });

    // Tombol Kirim Klarifikasi
    document.getElementById("btnKirimKlarifikasi").addEventListener("click", function () {
        let catatan = document.getElementById("inputKlarifikasi").value.trim();

        if (catatan === "") {
            alert("Catatan klarifikasi belum diisi!");
            return;
        }

        // sementara pakai alert — nanti bisa diganti AJAX/route laravel
        alert("Klarifikasi terkirim:\n\n" + catatan);
        modalKlarifikasi.hide();
        document.getElementById("inputKlarifikasi").value = "";
    });

});
</script>


@endsection
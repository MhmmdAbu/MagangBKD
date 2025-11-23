@extends('Layout.ktu')

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
                                        <button 
                                            class="btn btn-warning btn-sm btn-detail"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalDetail"
                                            data-nomor="001/A/SURAT/X/2025"
                                            data-tanggal="22 Oktober 2025"
                                            data-nama="St. Nur Aisyah. S"
                                            data-status="Pendaftaran"
                                        >Lihat</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>002/A/SURAT/X/2025</td>
                                    <td>22 Oktober 2025</td>
                                    <td>Muh. Abubakar</td>
                                    <td>Survey</td>
                                    <td class="aksi">
                                        <button 
                                            class="btn btn-warning btn-sm btn-detail"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalDetail"
                                            data-nomor="002/A/SURAT/X/2025"
                                            data-tanggal="22 Oktober 2025"
                                            data-nama="Muh. Abubakar"
                                            data-status="Survey"
                                        >Lihat</button>
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
      </div>
      <div class="modal-body">
        <p><strong>Nomor Surat:</strong> <span id="mdNomor"></span></p>
        <p><strong>Tanggal Dikirim:</strong> <span id="mdTanggal"></span></p>
        <p><strong>Nama Wajib Pajak:</strong> <span id="mdNama"></span></p>
        <p><strong>Status Surat:</strong> <span id="mdStatus"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success" style="background-color:blue;" id="btnSetujui">Setujui</button>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".btn-detail").forEach(btn => {
        btn.addEventListener("click", function () {
            document.getElementById("mdNomor").textContent = this.getAttribute("data-nomor");
            document.getElementById("mdTanggal").textContent = this.getAttribute("data-tanggal");
            document.getElementById("mdNama").textContent = this.getAttribute("data-nama");
            document.getElementById("mdStatus").textContent = this.getAttribute("data-status");
            document.getElementById("btnSetujui").setAttribute(
                "data-nomor", this.getAttribute("data-nomor")
            );
        });
    });
    document.getElementById("btnSetujui").addEventListener("click", function () {
        let nomor = this.getAttribute("data-nomor");
        alert("Surat " + nomor + " disetujui ✔️");
    });
});
</script>

@endsection
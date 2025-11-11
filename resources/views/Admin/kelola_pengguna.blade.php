@extends('Layout.utama')

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
                    <option value="4">KABID</option>
                    <option value="5">KTU</option>
                    <option value="6">Survey</option>
                    <option value="7">Administrator</option>
                </select>
                <input type="search" class="form-control search-input" placeholder="Cari ...">
                <button class="button" data-bs-toggle="modal" data-bs-target="#modalTambahPengguna">
                    Tambah Pengguna
                </button>
            </div>
        </div>
    </div>

    <!-- Tabel -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-riwayat mb-0 text-center align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">No</th>
                                    <th style="width: 25%;">Nama</th>
                                    <th style="width: 15%;">Role</th>
                                    <th style="width: 25%;">Nomor Telepon</th>
                                    <th style="width: 25%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                <tr>
                                    <td>1.</td>
                                    <td>St. Nur Aisyah. S</td>
                                    <td>PPAT</td>
                                    <td>0812345678910</td>
                                    <td class="aksi">
                                        <a href="#" class="btn btn-edit btn-sm btn-primary">Edit</a>
                                        <a href="#" class="btn btn-delete btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Muh. Abubakar T</td>
                                    <td>Admin</td>
                                    <td>0812345678922</td>
                                    <td class="aksi">
                                        <a href="#" class="btn btn-edit btn-sm btn-primary">Edit</a>
                                        <a href="#" class="btn btn-delete btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pengguna -->
<div class="modal fade" id="modalTambahPengguna" tabindex="-1" aria-labelledby="modalTambahPenggunaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header bg-white border-0">
            <h5 class="modal-title fw-bold mx-auto" id="modalTambahPenggunaLabel">Tambah Pengguna</h5>
        </div>

        <form id="formTambahPengguna"> 
            <div class="modal-body px-5 pb-4"> 
                <div class="mb-3"> 
                    <label for="role" class="form-label fw-semibold">Pilih Role</label> 
                    <select class="form-select" id="role" name="role"> 
                        <option value="" disabled selected>Role</option> 
                        <option value="Admin">Admin</option> 
                        <option value="PPAT">PPAT</option> 
                        <option value="KABAN">KABAN</option> 
                        <option value="KABID">KABID</option> 
                        <option value="KTU">KTU</option> 
                        <option value="Survey">Survey</option> 
                        <option value="Administrator">Administrator</option> 
                    </select> </div> <div class="row"> 
                        <div class="col-md-6 mb-3"> 
                            <label for="nama" class="form-label fw-semibold">Nama Lengkap</label> 
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="instansi" class="form-label fw-semibold">Nama Instansi</label> 
                            <input type="text" class="form-control" id="instansi" placeholder="Masukkan nama instansi"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="alamat" class="form-label fw-semibold">Alamat Instansi</label> 
                            <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat instansi"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="telepon" class="form-label fw-semibold">Nomor Telepon</label> 
                            <input type="tel" class="form-control" id="telepon" placeholder="08xxxxxxxxxx"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="email" class="form-label fw-semibold">Email</label> 
                            <input type="email" class="form-control" id="email" placeholder="contoh@email.com"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="foto" class="form-label fw-semibold">Foto</label> 
                            <input type="file" class="form-control" id="foto" accept="image/*"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="password" class="form-label fw-semibold">Password</label> 
                            <input type="password" class="form-control" id="password" placeholder="Masukkan password"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="konfirmasi" class="form-label fw-semibold">Konfirmasi Password</label> 
                            <input type="password" class="form-control" id="konfirmasi" placeholder="Ulangi password"> 
                        </div> 
                    </div> 
                </div> 
                <div class="modal-footer border-0 justify-content-center pb-4"> 
                    <button type="submit" class="btn btn-light px-5 py-2 border fw-semibold">Simpan</button> 
                    <button type="button" class="btn btn-primary px-5 py-2 fw-semibold" style="background-color:#083458;" data-bs-dismiss="modal">Batal</button> 
                </div> 
            </form> 
        </div> 
    </div> 
</div>

<!-- Modal Edit Pengguna -->
<div class="modal fade" id="modalEditPengguna" tabindex="-1" aria-labelledby="modalEditPenggunaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header bg-white border-0">
        <h5 class="modal-title fw-bold mx-auto" id="modalEditPenggunaLabel">Edit Pengguna</h5>
      </div>

      <form id="formEditPengguna">
        <div class="modal-body px-5 pb-4">
          <input type="hidden" id="editIndex">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="editNama" class="form-label fw-semibold">Nama Lengkap</label>
              <input type="text" class="form-control" id="editNama">
            </div>
            <div class="col-md-6 mb-3">
              <label for="editRole" class="form-label fw-semibold">Role</label>
              <select class="form-select" id="editRole">
                <option value="Admin">Admin</option>
                <option value="PPAT">PPAT</option>
                <option value="KABAN">KABAN</option>
                <option value="KABID">KABID</option>
                <option value="KTU">KTU</option>
                <option value="Survey">Survey</option>
                <option value="Administrator">Administrator</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="editTelepon" class="form-label fw-semibold">Nomor Telepon</label>
              <input type="tel" class="form-control" id="editTelepon">
            </div>
          </div>
        </div>

        <div class="modal-footer border-0 justify-content-center pb-4">
          <button type="submit" class="btn btn-light px-5 py-2 border fw-semibold">Simpan Perubahan</button>
          <button type="button" class="btn btn-primary px-5 py-2 fw-semibold" style="background-color:#083458;" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const formTambah = document.getElementById('formTambahPengguna');
    const formEdit = document.getElementById('formEditPengguna');
    const tbody = document.getElementById('userTableBody');
    const modalTambah = new bootstrap.Modal(document.getElementById('modalTambahPengguna'));
    const modalEdit = new bootstrap.Modal(document.getElementById('modalEditPengguna'));

    // Tambah pengguna
    formTambah.addEventListener('submit', function (e) {
        e.preventDefault();
        const nama = document.getElementById('nama').value.trim();
        const role = document.getElementById('role').value.trim();
        const telepon = document.getElementById('telepon').value.trim();
        if (!nama || !role || !telepon) return alert('Lengkapi semua field!');

        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${tbody.rows.length + 1}.</td>
            <td>${nama}</td>
            <td>${role}</td>
            <td>${telepon}</td>
            <td class="aksi">
                <a href="#" class="btn btn-edit btn-sm btn-primary">Edit</a>
                <a href="#" class="btn btn-delete btn-sm btn-danger">Hapus</a>
            </td>`;
        tbody.appendChild(newRow);
        modalTambah.hide();
        formTambah.reset();
    });

    // Delegasi event untuk Edit dan Hapus
    tbody.addEventListener('click', function (e) {
        e.preventDefault();
        const target = e.target;
        const row = target.closest('tr');
        const index = Array.from(tbody.rows).indexOf(row);

        // Hapus pengguna
        if (target.classList.contains('btn-delete')) {
            if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
                row.remove();
                Array.from(tbody.rows).forEach((tr, i) => tr.cells[0].innerText = `${i + 1}.`);
            }
        }

        // Edit pengguna
        if (target.classList.contains('btn-edit')) {
            const nama = row.cells[1].innerText;
            const role = row.cells[2].innerText;
            const telepon = row.cells[3].innerText;

            document.getElementById('editIndex').value = index;
            document.getElementById('editNama').value = nama;
            document.getElementById('editRole').value = role;
            document.getElementById('editTelepon').value = telepon;

            modalEdit.show();
        }
    });

    // Simpan hasil edit
    formEdit.addEventListener('submit', function (e) {
        e.preventDefault();
        const index = document.getElementById('editIndex').value;
        const row = tbody.rows[index];
        row.cells[1].innerText = document.getElementById('editNama').value.trim();
        row.cells[2].innerText = document.getElementById('editRole').value.trim();
        row.cells[3].innerText = document.getElementById('editTelepon').value.trim();
        modalEdit.hide();
    });
});
</script>
@endsection

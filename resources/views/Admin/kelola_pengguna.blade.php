@extends('Layout.layoutAdmin')

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let users = [
        { id: 1, nama: 'St. Nur Aisyah. S', role: 'PPAT', telepon: '0812345678910' },
        { id: 2, nama: 'Muh. Abubakar T', role: 'Admin', telepon: '0812345678922' }
    ];

    function renderTable(filteredUsers = users) {
        const tbody = $('#userTableBody');
        tbody.empty();
        filteredUsers.forEach((user, index) => {
            const row = `
                <tr>
                    <td>${index + 1}.</td>
                    <td>${user.nama}</td>
                    <td>${user.role}</td>
                    <td>${user.telepon}</td>
                    <td class="aksi">
                        <a href="#" class="btn btn-edit btn-sm btn-primary" data-id="${user.id}">Edit</a>
                        <a href="#" class="btn btn-delete btn-sm btn-danger" data-id="${user.id}">Hapus</a>
                    </td>
                </tr>
            `;
            tbody.append(row);
        });
    }

    renderTable();

    $('.filter-controls select').change(function() {
        const selectedRole = $(this).val();
        let filteredUsers;
        if (selectedRole === 'Role') {
            filteredUsers = users;
        } else {
            filteredUsers = users.filter(user => user.role === selectedRole);
        }
        renderTable(filteredUsers);
    });

    $('.search-input').on('input', function() {
        const searchTerm = $(this).val().toLowerCase();
        const filteredUsers = users.filter(user => user.nama.toLowerCase().includes(searchTerm));
        renderTable(filteredUsers);
    });

    $('#formTambahPengguna').submit(function(e) {
        e.preventDefault();
        const newUser = {
            id: users.length + 1,
            nama: $('#nama').val(),
            role: $('#role').val(),
            telepon: $('#telepon').val(),
        };
        users.push(newUser);
        renderTable();
        $('#modalTambahPengguna').modal('hide');
        $('#formTambahPengguna')[0].reset();
        alert('Pengguna berhasil ditambahkan!');
    });

    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        const userId = $(this).data('id');
        const user = users.find(u => u.id === userId);
        if (user) {
            $('#editIndex').val(userId);
            $('#editNama').val(user.nama);
            $('#editRole').val(user.role);
            $('#editTelepon').val(user.telepon);
            $('#modalEditPengguna').modal('show');
        }
    });

    $('#formEditPengguna').submit(function(e) {
        e.preventDefault();
        const userId = $('#editIndex').val();
        const userIndex = users.findIndex(u => u.id == userId);
        if (userIndex !== -1) {
            users[userIndex].nama = $('#editNama').val();
            users[userIndex].role = $('#editRole').val();
            users[userIndex].telepon = $('#editTelepon').val();
            renderTable();
            $('#modalEditPengguna').modal('hide');
            alert('Pengguna berhasil diupdate!');
        }
    });

    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        const userId = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
            users = users.filter(u => u.id !== userId);
            renderTable();
            alert('Pengguna berhasil dihapus!');
        }
    });
});
</script>
@endsection
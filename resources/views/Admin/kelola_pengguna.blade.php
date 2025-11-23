@extends('Layout.layoutAdmin')

@section('title','Kelola Pengguna')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="filter-controls">
                <select id="filterRole" class="form-select" aria-label="Role Filter" style="max-width: 150px;">
                    <option value="" disabled selected>Role</option> 
                    <option value="Admin">Admin</option> 
                    <option value="PPAT">PPAT</option> 
                    <option value="kepala_uptd">Kepala UPTD</option> 
                    <option value="kepala_badan">Kepala Badan</option> 
                    <option value="KTU">KTU</option> 
                    <option value="koordinator_survey">Koordinator Survey</option> 
                    <option value="anggota_survey">Survey</option> 
                    <option value="Administrator">Administrator</option> 
                </select>
                <input type="search"id="filterSearch" class="form-control search-input" placeholder="Cari ...">
                <button class="button" data-bs-toggle="modal" data-bs-target="#modalTambahPengguna">
                    Tambah Pengguna
                </button>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                                @forelse($users as $index => $user)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->nomor_hp }}</td>
                                    <td class="aksi">
                                        <button type="button" class="btn btn-edit btn-sm btn-primary btnEditUser" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-role="{{ $user->role }}" data-telepon="{{ $user->nomor_hp }}" data-email="{{ $user->email }}" data-foto="{{ $user->foto }}" data-bs-toggle="modal" data-bs-target="#modalEditPengguna">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-delete btn-sm btn-danger btnHapusUser" data-id="{{ $user->id }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada pengguna ditemukan.</td>
                                </tr>
                                @endforelse
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

        <form action="{{ route('register.proses') }}" method="POST" id="formTambahPengguna"> 
            @csrf
            <div class="modal-body px-5 pb-4"> 
                <div class="mb-3"> 
                    <label for="role" class="form-label fw-semibold">Pilih Role</label> 
                    <select class="form-select" id="role" name="role"> 
                        <option value="" disabled selected>Role</option> 
                        <option value="Admin">Admin</option> 
                        <option value="PPAT">PPAT</option> 
                        <option value="kepala_uptd">Kepala UPTD</option> 
                        <option value="kepala_badan">Kepala Badan</option> 
                        <option value="KTU">KTU</option> 
                        <option value="koordinator_survey">Koordinator Survey</option> 
                        <option value="anggota_survey">Survey</option> 
                        <option value="Administrator">Administrator</option> 
                    </select> 
                </div> 
                <div class="row"> 
                    <div class="col-md-6 mb-3"> 
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label> 
                        <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama lengkap"> 
                    </div> 
                    <div class="col-md-6 mb-3"> 
                        <label for="instansi" class="form-label fw-semibold">Nama Instansi</label> 
                        <input type="text" name="instansi" class="form-control" id="instansi" placeholder="Masukkan nama instansi"> 
                    </div> 
                    <div class="col-md-6 mb-3"> 
                        <label for="alamat" class="form-label fw-semibold">Alamat Instansi</label> 
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat instansi"> 
                    </div> 
                    <div class="col-md-6 mb-3"> 
                        <label for="nomor_hp" class="form-label fw-semibold">Nomor Telepon</label> 
                        <input type="tel" name="nomor_hp" class="form-control" id="telepon" placeholder="08xxxxxxxxxx"> 
                    </div> 
                    <div class="col-md-6 mb-3"> 
                        <label for="email" class="form-label fw-semibold">Email</label> 
                        <input type="email" name="email" class="form-control" id="email" placeholder="contoh@email.com"> 
                    </div> 
                    <div class="col-md-6 mb-3"> 
                        <label for="foto" class="form-label fw-semibold">Foto</label> 
                        <input type="file" name="foto" class="form-control" id="foto" accept="image/*"> 
                    </div> 
                    <div class="col-md-6 mb-3"> 
                        <label for="password" class="form-label fw-semibold">Password</label> 
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password"> 
                    </div> 
                    <div class="col-md-6 mb-3"> 
                        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label> 
                        <input type="password" name="password_confirmation" class="form-control" id="konfirmasi" placeholder="Ulangi password"> 
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

        <form id="formEditPengguna" method="POST">
            <div class="modal-body px-5 pb-4">
                <input type="hidden" id="editIndex">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="editRole" class="form-label fw-semibold">Role</label>
                        <select name="editrole" class="form-select" id="editrole">
                            <option value="" disabled selected>Role</option> 
                            <option value="Admin">Admin</option> 
                            <option value="PPAT">PPAT</option> 
                            <option value="kepala_uptd">Kepala UPTD</option> 
                            <option value="kepala_badan">Kepala Badan</option> 
                            <option value="KTU">KTU</option> 
                            <option value="koordinator_survey">Koordinator Survey</option> 
                            <option value="anggota_survey">Survey</option> 
                            <option value="Administrator">Administrator</option> 
                        </select>
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 mb-3"> 
                            <label for="editname" class="form-label fw-semibold">Nama Lengkap</label> 
                            <input type="text" name="editname" class="form-control" id="editname" placeholder="Masukkan nama lengkap"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="editinstansi" class="form-label fw-semibold">Nama Instansi</label> 
                            <input type="text" name="editinstansi" class="form-control" id="editinstansi" placeholder="Masukkan nama instansi"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="editalamat" class="form-label fw-semibold">Alamat Instansi</label> 
                            <input type="text" name="editalamat" class="form-control" id="editalamat" placeholder="Masukkan alamat instansi"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="editnomor_hp" class="form-label fw-semibold">Nomor Telepon</label> 
                            <input type="tel" name="editnomor_hp" class="form-control" id="editnomor_hp" placeholder="08xxxxxxxxxx"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="editemail" class="form-label fw-semibold">Email</label> 
                            <input type="email" name="editemail" class="form-control" id="editemail" placeholder="contoh@email.com"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="editfoto" class="form-label fw-semibold">Foto</label> 
                            <input type="file" name="editfoto" class="form-control" id="editfoto" accept="image/*"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="password" class="form-label fw-semibold">Password</label> 
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password"> 
                        </div> 
                        <div class="col-md-6 mb-3"> 
                            <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label> 
                            <input type="password" name="password_confirmation" class="form-control" id="konfirmasi" placeholder="Ulangi password"> 
                        </div> 
                    </div> 
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-primary px-5 py-2 fw-semibold" style="color:white;" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-light px-5 py-2 border fw-semibold" style="background-color:#083458; color:white;" >Simpan Perubahan</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // === FITUR FILTER ROLE & SEARCH TABEL PENGGUNA === //

    const roleFilter = document.querySelector('.filter-controls select');   // dropdown filter role
    const searchInput = document.querySelector('.search-input');           // input search
    const tableBody = document.getElementById('userTableBody');            // tbody tabel

    function filterTable() {
        let selectedRole = roleFilter.value.trim().toLowerCase();
        let keyword = searchInput.value.trim().toLowerCase();

        let rows = tableBody.getElementsByTagName('tr');

        Array.from(rows).forEach(row => {
            let name = row.cells[1]?.innerText.toLowerCase() || "";
            let role = row.cells[2]?.innerText.toLowerCase() || "";
            let telepon = row.cells[3]?.innerText.toLowerCase() || "";

            // Cek kecocokan role
            let matchRole =
                selectedRole === "" ||
                selectedRole === "role" ||
                role.includes(selectedRole);

            // Cek pencarian
            let matchSearch =
                name.includes(keyword) ||
                role.includes(keyword) ||
                telepon.includes(keyword);

            // Tampilkan / sembunyikan baris
            if (matchRole && matchSearch) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    // Event filter role
    roleFilter.addEventListener("change", filterTable);

    // Event search
    searchInput.addEventListener("keyup", filterTable);


    // 🔹 Ketika tombol Edit diklik
    $(document).on('click', '.btnEditUser', function() {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let role = $(this).data('role');
        let telepon = $(this).data('telepon');
        let email = $(this).data('email');
        let foto = $(this).data('foto');

        // Isi data ke form edit modal
        $('#editname').val(name);
        $('#editrole').val(role);
        $('#editnomor_hp').val(telepon);
        $('#editemail').val(email);
        $('#editfoto').val(foto);
        $('#formEditPengguna').attr('data-id', id);

        // Tampilkan modal
        $('#modalEditPengguna').modal('show');
    });

    // 🔹 Proses update via AJAX
    $('#formEditPengguna').on('submit', function(e) {
        e.preventDefault();

        let id = $(this).attr('data-id');
        let nama = $('#editname').val();
        let role = $('#editrole').val();
        let telepon = $('#editnomor_hp').val();
        let email = $('#editemail').val();
        let foto = $('#editfoto').val();

        $.ajax({
            url: `/admin/kelola-pengguna/update/${id}`,
            type: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                name: nama,
                role: role,
                nomor_hp: telepon,
                email: email,
                foto: foto
            },
            success: function(response) {
                if (response.success) {
                    alert('Data pengguna berhasil diperbarui!');
                    $('#modalEditPengguna').modal('hide');
                    location.reload(); // reload tabel
                } else {
                    alert('Gagal memperbarui data pengguna!');
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat memperbarui data.');
            }
        });
    });

    $(document).on('click', '.btnHapusUser', function () {
        let id = $(this).data('id');

        if (confirm("Apakah Anda yakin ingin menghapus pengguna ini?")) {

            $.ajax({
                url: `/admin/kelola-pengguna/delete/${id}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menghapus data.');
                }
            });

        }
    });
});
</script>
@endsection
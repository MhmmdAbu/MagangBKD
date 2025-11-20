@extends('Layout.utama')

@section('title','Profile')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}"> 

@section('content')
<div class="content-area">       
    <div class="profile-image-box" id="profile-image-container">
        @if(Auth::user()->photo) 
            <img id="profile-preview-image" 
                 src="{{ asset('storage/profile/' . Auth::user()->photo) }}" 
                 alt="Profile Picture"
                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
        @else
            <i class="fas fa-user-circle avatar" id="default-avatar-icon"></i>
        @endif
    </div>

    {{-- NAMA USER --}}
    <h3>{{ Auth::user()->name }}</h3>

    {{-- ROLE / JABATAN --}}
    <p>{{ Auth::user()->role }}</p>
    
    <div class="settings-panel">
        <div class="tab-nav">
            <a href="#" class="tab-link" data-tab="overview">Overview</a>
            <a href="#" class="tab-link active" data-tab="edit-profile">Edit Profile</a>
            <a href="#" class="tab-link" data-tab="change-password">Ubah Password</a>
        </div>

        <!-- Overview -->
        <div id="overview-tab" class="tab-content" style="display: none;">
            <p><strong>Nama Lengkap:</strong> <span id="overview-nama">{{ Auth::user()->name }}</span></p>
            <p><strong>Alamat Instansi:</strong> <span id="overview-alamat">{{ Auth::user()->alamat }}</span></p>
            <p><strong>Telepon:</strong> <span id="overview-telepon">{{ Auth::user()->nomor_hp }}</span></p>
            <p><strong>Email:</strong> <span id="overview-email">{{ Auth::user()->email }}</span></p>
        </div>

        <!-- Edit Profile -->
        <div id="edit-profile-tab" class="tab-content">
            <div class="edit-profile-form">
                <div class="foto-profile-upload">
                    <label>Foto Profile</label>
                    <div class="profile-image-box" id="profile-upload-preview-box"> 
                        <img id="edit-profile-preview-image" src="" alt="Profile Preview" style="display: none; width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                        <i class="fas fa-user-circle avatar" id="edit-default-avatar-icon"></i>
                    </div>
                    <div class="image-actions">
                        <input type="file" id="profile-upload-input" accept="image/*" hidden>
                        <button type="button" title="Upload Foto" id="upload-button"><i class="fas fa-upload"></i></button>
                        <button class="delete-btn" title="Hapus Foto" id="delete-profile-image-button"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama_lengkap">
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat Instansi</label>
                    <input type="text" id="alamat" name="alamat">
                </div>
                
                <div class="form-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input type="tel" id="telepon" name="telepon">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>

                <button class="save-button">Simpan Perubahan</button>
            </div>
        </div>

        <!-- Ubah Password -->
        <div id="change-password-tab" class="tab-content" style="display: none;">
            <div class="change-password-form">
                <div class="form-group">
                    <label for="old-password">Password Lama</label>
                    <input type="password" id="old-password" name="old_password" required>
                </div>
                
                <div class="form-group">
                    <label for="new-password">Password Baru</label>
                    <input type="password" id="new-password" name="new_password" required>
                </div>
                
                <div class="form-group">
                    <label for="confirm-password">Konfirmasi Password Baru</label>
                    <input type="password" id="confirm-password" name="confirm_password" required>
                </div>

                <button class="save-button">Ubah Password</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/profil.js') }}"></script>
@endsection
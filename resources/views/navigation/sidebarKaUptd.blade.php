<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<div class="sidebar">
    <div class="logo-section">
        LOGO
    </div>
    <ul class="nav-menu">

        {{-- Menu khusus Admin --}}
        @if(Auth::user()->role == 'Admin')
            <!-- <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
            </li> -->
            <li class="nav-item">
                <a href="{{ route('kelola_pengguna') }}" class="nav-link">
                    <i class="fas fa-users"></i> Kelola Pengguna
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="{{ route('berkas_terdaftar') }}" class="nav-link">
                    <i class="fas fa-folder"></i> Berkas Terdaftar
                </a>
            </li> -->
        @endif

        {{-- Menu khusus PPAT --}}
        <!-- @if(Auth::user()->role == 'PPAT')
            <li class="nav-item">
                <a href="{{ route('ppat.upload_berkas') }}" class="nav-link">
                    <i class="fas fa-upload"></i> Upload Berkas
                </a>
            </li>
        @endif

        {{-- Menu khusus KTU --}}
        @if(Auth::user()->role == 'KTU')
            <li class="nav-item">
                <a href="{{ route('ktu.berkas') }}" class="nav-link">
                    <i class="fas fa-archive"></i> Kelola Berkas
                </a>
            </li>
        @endif

        {{-- Menu untuk Semua Role --}}
        <li class="nav-item">
            <a href="{{ route('panduan') }}" class="nav-link {{ Route::currentRouteNamed('panduan') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i> Panduan dan Syarat
            </a>
        </li> -->
    </ul>
    <div class="user-profile-section">
        <div class="nav-item mb-2">
            <a href="{{ route('profile') }}" class="nav-link {{ Route::currentRouteNamed('profile') ? 'active' : '' }}">
                <span class="profile-icon">
                    <i class="fas fa-user"></i>
                </span>
                Aisyah
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('login') }}" class="nav-link {{ Route::currentRouteNamed('login') ? 'active' : '' }}">
                <span class="profile-icon">
                <i class="fas fa-sign-out-alt  "></i>
                  Keluar
            </a>
        </div>
    </div>
</div>
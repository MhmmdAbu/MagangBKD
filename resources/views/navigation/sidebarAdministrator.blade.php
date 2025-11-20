<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<div class="sidebar">
    <div class="logo-section">
        LOGO
    </div>
    <ul class="nav-menu">
        <li class="nav-item">
            <a href="{{ route('dashAdministrator') }}" class="nav-link {{ Route::currentRouteNamed('dashAdministrator') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('berkas_terdaftar') }}" class="nav-link {{ Route::currentRouteNamed('berkas_terdaftar') ? 'active' : '' }}">
                <i class="fas fa-folder"></i>
                Berkas Terdaftar
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('arsip_berkas') }}" class="nav-link {{ Route::currentRouteNamed('arsip_berkas') ? 'active' : '' }}">
                <i class="fas fa-archive"></i>
                Arsip Berkas
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('panduan') }}" class="nav-link {{ Route::currentRouteNamed('panduan') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                Panduan dan Syarat
            </a>
        </li>
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
<div class="sidebar">
    <div class="logo-section">
        LOGO
    </div>
    <ul class="nav-menu">
        @if(auth()->user()->role == 'Admin')
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.berkas_terdaftar') }}" class="nav-link {{ request()->routeIs('admin.berkas_terdaftar') ? 'active' : '' }}">
                <i class="fas fa-folder"></i> Kelola Berkas
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kelola_panduan') }}" class="nav-link {{ request()->routeIs('kelola_panduan') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i> Panduan & Syarat
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kelola_pengguna') }}" class="nav-link {{ request()->routeIs('kelola_pengguna') ? 'active' : '' }}">
                <i class="fas fa-archive"></i> Kelola Pengguna
            </a>
        </li>
        @endif
    </ul>

    <div class="user-profile-section">
        <div class="nav-item mb-2">
            <a href="{{ route('admin.profile') }}" class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                <span class="profile-icon"><i class="fas fa-user"></i></span> Aisyah
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
                <span class="profile-icon"><i class="fas fa-sign-out-alt"></i></span> Keluar
            </a>
        </div>
    </div>
</div>
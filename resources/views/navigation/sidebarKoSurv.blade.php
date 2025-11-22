<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<div class="sidebar">
    <div class="logo-section">
        LOGO
    </div>
    <ul class="nav-menu">
        <li class="nav-item">
            <a href="{{ route('kordinator.dashboard') }}" class="nav-link {{ Route::currentRouteNamed('kordinator.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kordinator.berkas') }}" class="nav-link {{ Route::currentRouteNamed('kordinator.berkas') ? 'active' : '' }}">
                <i class="fas fa-folder"></i>
                Berkas
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kordinator.survey') }}" class="nav-link {{ Route::currentRouteNamed('kordinator.survey') ? 'active' : '' }}">
                <i class="fas fa-archive"></i>
                Survey
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kordinator.panduan') }}" class="nav-link {{ Route::currentRouteNamed('kordinator.panduan') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                Panduan dan Syarat
            </a>
        </li>
    </ul>
    <div class="user-profile-section">
        <div class="nav-item mb-2">
            <a href="{{ route('kordinator.profile') }}" class="nav-link {{ Route::currentRouteNamed('kordinator.profile') ? 'active' : '' }}">
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
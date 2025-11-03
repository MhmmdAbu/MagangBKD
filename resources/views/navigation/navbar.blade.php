<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

<nav class="navbar navbar-expand-lg">
    <div class="container">
        
        <a class="navbar-brand" href="#">LOGO</a> 
        
        <button class="navbar-toggler" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" 
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('LandingPage') ? 'active' : '' }}" href="{{ route('LandingPage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('syarat') || Route::currentRouteNamed('s&k') ? 'active' : '' }}" href="{{ route('s&k') }}">Panduan & Persyaratan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('pengajuan') ? 'active' : '' }}" href="{{ route('pengajuan') }}">Pengajuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                </li>
            </ul>
            <a href="{{ route('login') }}" class="btn-login ms-3">Login</a>
        </div>
    </div>
</nav>
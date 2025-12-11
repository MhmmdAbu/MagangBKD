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
                    <a class="nav-link {{ request()->routeIs('LandingPage') ? 'active' : '' }}" href="{{ route('LandingPage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('requirement') ? 'active' : '' }}" href="{{ route('requirement') }}">Panduan & Persyaratan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pengajuan') ? 'active' : '' }}" href="{{ route('pengajuan') }}">Pengajuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                </li>
            </ul>
            {{-- Tombol Login / Logout --}}
            @guest
                <a href="{{ route('login') }}" class="btn-login ms-3">Login</a>
            @endguest

            @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline ms-3">
                    @csrf
                    <button type="submit" class="btn-login">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
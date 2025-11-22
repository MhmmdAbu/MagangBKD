<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard')</title>

    {{-- CSS Wajib --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

    {{-- CSS Kustom --}}
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/pengajuan.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}" />

    <style>
    /* Inline CSS untuk main-content-wrapper dan footer */
    .main-content-wrapper {
        margin-top: 1rem;
        margin-left: 250px;
        padding: 0 10px 10px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .content {
        flex: 1;
    }

    .page-footer {
        text-align: center;
        font-size: 0.8rem;
        color: #6c757d;
        padding: 10px 0;
    }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    @include('navigation.sidebar_admin')

    <div class="main-content-wrapper">
        <div class="content">
            @yield('content')
        </div>

        <div class="page-footer">
            <p>© Copyright Abu dan Icha. Design by Icha aja</p>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Yield scripts section untuk script spesifik halaman --}}
    @yield('scripts')

</body>
</html>
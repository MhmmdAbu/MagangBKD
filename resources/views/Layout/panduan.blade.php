<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','')</title>
    
    {{-- CSS Wajib (Bootstrap, Font) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    
    {{-- CSS Kustom --}}
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/panduan.css') }}"> 

    <style>
        /* CSS Wajib untuk Sidebar Fix */
        .main-content-wrapper {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
            background-color: #f8f9fa;
            position: relative;
        }
        
        .page-footer {
            position: absolute; 
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 0.8rem;
            color: #6c757d;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    
    @include('navigation.sidebar')
    <div class="main-content-wrapper">
        
        @yield('content')

        <div class="page-footer">
            <p>© Copyright Abu dan Icha. Design by Icha aja</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/persyaratan.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Permohonan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/DashboardPPAT.css') }}">
</head>
<body>

@include('navigation.navbar')

<section class="hero">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1>Selamat Datang, <span>St. Nur Aisyah. S</span></h1>
        <p>
            Ikuti setiap tahapan alur kerja Anda, mulai dari input hingga
            penandatanganan pimpinan, demi penyelesaian yang efisien dan sah.
        </p>

        <div class="status-card">
            <h3>Status Permohonan Terakhir Anda</h3>
            <p>Nomor Registrasi: <strong>BPHTB-2025-0012</strong></p>

            <div class="progress-tracker">
                <div class="step done">Pendaftaran</div>
                <div class="step done">Disposisi</div>
                <div class="step active">Survey</div>
                <div class="step">Klarifikasi</div>
                <div class="step">Tanda Tangan</div>
                <div class="step">Selesai</div>
            </div>

            <p class="current-status">
                Status Saat Ini: <span>Sedang Dalam Proses Survey</span>
            </p>

            <a href="#" class="detail-link">Lihat Selengkapnya &raquo;</a>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Permohonan</title>
    <link rel="stylesheet" href="style.css">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* NAVBAR */
.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #0b3a63;
    padding: 12px 30px;
    color: #fff;
}

.logo {
    font-weight: bold;
    font-size: 18px;
}

.nav-menu {
    list-style: none;
    display: flex;
    gap: 25px;
}

.nav-menu li {
    cursor: pointer;
}

.nav-menu .active {
    color: #ffc107;
    font-weight: bold;
}

.profile {
    width: 35px;
    height: 35px;
    background: #ddd;
    border-radius: 50%;
}

/* HERO */
.hero {
    background: url('/img/icon/Document.jpg') center/cover no-repeat;
    height: calc(100vh - 60px);
    position: relative;
}

.hero-overlay {
    background: rgba(0,0,0,0.55);
    height: 100%;
    padding: 60px;
    color: #fff;
}

.hero h1 {
    font-size: 36px;
    margin-bottom: 10px;
}

.hero h1 span {
    color: #eaeaea;
}

.hero p {
    max-width: 700px;
    line-height: 1.6;
}

/* STATUS CARD */
.status-card {
    background: rgba(255,255,255,0.15);
    margin-top: 30px;
    padding: 25px;
    border-radius: 10px;
}

.status-card h3 {
    color: #00c3ff;
    margin-bottom: 10px;
}

.progress {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
}

.step {
    flex: 1;
    text-align: center;
    font-size: 12px;
    color: #ccc;
    position: relative;
}

.step::before {
    content: "●";
    display: block;
    font-size: 16px;
    margin-bottom: 5px;
}

.step.done {
    color: #4caf50;
}

.step.active {
    color: #ffc107;
    font-weight: bold;
}

.current-status {
    font-size: 16px;
}

.current-status span {
    color: #ffc107;
    font-weight: bold;
}

.detail-link {
    display: inline-block;
    margin-top: 10px;
    color: #fff;
    text-decoration: none;
}
</style>
</head>
<body>

<!-- NAVBAR -->
@include('navigation.navbar')

<!-- HERO -->
<section class="hero">
    <div class="hero-overlay">
        <h1>Selamat Datang, <span>St. Nur Aisyah. S</span></h1>
        <p>
            Ikuti setiap tahapan alur kerja anda, mulai dari input hingga
            penandatanganan pimpinan, demi penyelesaian yang efisien dan sah.
        </p>

        <!-- STATUS CARD -->
        <div class="status-card">
            <h3>Status Permohonan Terakhir Anda</h3>
            <p>Nomor Registrasi: <strong>BPHTB-2025-0012</strong></p>

            <!-- PROGRESS -->
            <div class="progress">
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

            <a href="#" class="detail-link">Lihat Selengkapnya &gt;&gt;</a>
        </div>
    </div>
</section>

</body>
</html>

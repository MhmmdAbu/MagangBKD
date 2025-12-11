@php
    use Illuminate\Support\Facades\Storage;
@endphp

<style>
    /* Styling utama menggunakan konsep yang sama: glassmorphism, animasi, dan modernitas */
    body {
        font-family: 'Roboto', sans-serif; /* Load Google Fonts di layout: <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> */
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%); /* Gradien dinamis seperti sebelumnya */
        margin: 0;
        padding: 20px;
        padding-bottom: 80px; /* Tambah padding bawah agar tidak overlap dengan footer fixed */
        color: #333;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        animation: fadeIn 1s ease-in-out; /* Animasi masuk halaman */
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .card {
        background: rgba(255, 255, 255, 0.9); /* Glassmorphism effect */
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        padding: 25px;
        width: 100%;
        max-width: 1200px;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }
    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #4a90e2, #ffd700, #ff6b6b); /* Border gradien seperti sebelumnya */
    }
    .card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }
    h2 {
        color: #4a90e2;
        font-weight: 700;
        text-align: center;
        margin-bottom: 20px;
        font-size: 1.5em;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }
    .iframe-container {
        position: relative;
    }
    iframe {
        border: none;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        width: 100%;
        height: 600px;
        display: block;
        transition: opacity 0.5s ease;
    }
    .loading-spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 2em;
        color: #4a90e2;
        display: block; /* Tampilkan saat loading */
    }
    .page-footer {
        position: fixed; /* Footer fixed di bawah layar */
        bottom: 0;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 0.9rem;
        color: #fff;
        padding: 15px 0;
        background: rgba(0, 0, 0, 0.8); /* Lebih gelap agar kontras */
        border-radius: 0; /* Tidak perlu radius di fixed */
        z-index: 1000; /* Agar di atas elemen lain */
        backdrop-filter: blur(5px); /* Efek glassmorphism ringan */
    }
    .page-footer p {
        margin: 0;
    }
    .social-icons {
        margin-top: 10px;
    }
    .social-icons a {
        color: #fff;
        margin: 0 10px;
        font-size: 1.2em;
        transition: color 0.3s ease;
    }
    .social-icons a:hover {
        color: #ffd700;
    }
    /* Responsivitas */
    @media (max-width: 768px) {
        body { padding: 10px; padding-bottom: 70px; } /* Adjust padding bawah */
        .card { padding: 15px; }
        iframe { height: 400px; }
        h2 { font-size: 1.2em; }
        .page-footer { padding: 10px 0; font-size: 0.8rem; }
    }
</style>

<div class="card">
    <h2><i class="fas fa-file-pdf"></i> Preview Berkas Pengajuan</h2>
    <div class="iframe-container">
        <div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i> Memuat PDF...</div>
        <iframe src="{{ Storage::url('uploads/pengajuan/' . $filePDF) }}" title="Preview PDF Pengajuan" onload="hideSpinner()"></iframe>
    </div>
</div>

<script>
    // Fungsi untuk menyembunyikan spinner saat iframe load
    function hideSpinner() {
        const spinner = document.querySelector('.loading-spinner');
        if (spinner) {
            spinner.style.display = 'none';
        }
    }
    // Error handling jika iframe gagal load
    const iframe = document.querySelector('iframe');
    iframe.onerror = function() {
        hideSpinner();
        alert('Gagal memuat PDF. Periksa koneksi atau file.');
    };
</script>
@php
    use Illuminate\Support\Facades\Storage;
@endphp

<style>
    /* Tambahkan ini ke file CSS Anda atau di @section('styles') jika menggunakan layout */
    body {
        font-family: 'Roboto', sans-serif; /* Pastikan load Google Fonts di layout utama: <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> */
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        margin: 0;
        padding: 20px;
        color: #333;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }
    .page-footer {
        text-align: center;
        font-size: 0.8rem;
        color: #6c757d;
        padding: 10px 0;
    }
    .card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 100%;
        max-width: 1200px;
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    h2 {
        color: #4a90e2;
        font-weight: 700;
        text-align: center;
        margin-bottom: 20px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }
    iframe {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        width: 100%;
        height: 600px;
        display: block;
    }
    /* Responsivitas */
    @media (max-width: 768px) {
        iframe { height: 400px; }
        .card { padding: 15px; }
        body { padding: 10px; }
    }
</style>

<div class="card">
    <h2>Preview Berkas Pengajuan</h2>
    <!-- Iframe untuk PDF utama -->
    <iframe src="{{ Storage::url('uploads/pengajuan/' . $namaBerkas) }}" title="Preview PDF Pengajuan"></iframe>
</div>
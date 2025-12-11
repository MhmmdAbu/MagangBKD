@php
use Illuminate\Support\Facades\Storage;
@endphp

<style>
    /* Styling utama untuk halaman yang lebih indah */
    body {
        font-family: 'Roboto', sans-serif; /* Load Google Fonts di layout: <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> */
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%); /* Gradien dinamis */
        margin: 0;
        padding: 20px;
        color: #333;
        min-height: 100vh;
        animation: fadeIn 1s ease-in-out; /* Animasi masuk halaman */
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .container {
        max-width: 1200px;
        margin: 0 auto;
    }
    .card {
        background: rgba(255, 255, 255, 0.9); /* Glassmorphism effect */
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        padding: 25px;
        margin-bottom: 25px;
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
        background: linear-gradient(90deg, #4a90e2, #ffd700, #ff6b6b);
    }
    .card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }
    h3 {
        color: #4a90e2;
        font-weight: 700;
        margin-bottom: 20px;
        text-align: center;
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
        transition: opacity 0.5s ease;
    }
    .loading-spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 2em;
        color: #4a90e2;
        display: none; /* Tampilkan saat loading */
    }
    ul {
        list-style: none;
        padding: 0;
    }
    li {
        background: rgba(249, 249, 249, 0.8);
        margin: 15px 0;
        padding: 20px;
        border-radius: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border-left: 5px solid #4a90e2;
    }
    li:hover {
        background: rgba(232, 244, 253, 0.9);
        transform: translateX(5px);
    }
    .icon {
        margin-right: 15px;
        color: #4a90e2;
        font-size: 1.2em;
    }
    a {
        color: #4a90e2;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        padding: 8px 12px;
        border-radius: 8px;
    }
    a:hover {
        color: #fff;
        background: #4a90e2;
        text-decoration: none;
    }
    hr {
        border: none;
        height: 3px;
        background: linear-gradient(90deg, #4a90e2, #ffd700, #ff6b6b);
        margin: 40px 0;
        border-radius: 2px;
    }
    .modal-footer {
        display: flex;
        justify-content: center;
        gap: 15px;
        padding: 20px 0;
    }
    .btn {
        padding: 12px 25px;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transition: width 0.6s, height 0.6s;
        transform: translate(-50%, -50%);
    }
    .btn:hover::before {
        width: 300px;
        height: 300px;
    }
    .btn-Tdkvalid {
        background: linear-gradient(135deg, #ff6b6b, #ee5a52);
        color: #fff;
        border: none;
    }
    .btn-valid {
        background: linear-gradient(135deg, #4caf50, #45a049);
        color: #fff;
        border: none;
    }
    .page-footer {
        text-align: center;
        font-size: 0.9rem;
        color: #fff;
        padding: 20px 0;
        background: rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-top: 30px;
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
        body { padding: 10px; }
        .card { padding: 15px; margin-bottom: 15px; }
        iframe { height: 400px; }
        li { flex-direction: column; align-items: flex-start; padding: 15px; }
        .modal-footer { flex-direction: column; gap: 10px; }
        h3 { font-size: 1.2em; }
    }
</style>

<div class="container">
    <div class="card">
        <h3><i class="fas fa-file-pdf"></i> Preview Surat Utama</h3>
        <div class="iframe-container">
            <iframe src="{{ Storage::url('pdf_pengajuan/'.$pdfUtama) }}" title="Preview PDF Utama" onload="hideSpinner()"></iframe>
        </div>
    </div>

    <div class="card">
        <h3><i class="fas fa-list-ul"></i> Daftar Berkas Kelengkapan</h3>
        <ul>
            @if($kelengkapan)
                @foreach ($kelengkapan as $file)
                    <li>
                        <span><i class="fas fa-file-alt icon"></i> {{ ucwords(str_replace('_', ' ', $file['nama_kolom'])) }}</span>
                        <a href="{{ route('preview.kelengkapan', ['namaPDF'=>basename($file['nama_file']) ]) }}" target="_blank">
                            <i class="fas fa-eye"></i> Lihat Surat
                        </a>
                    </li>
                @endforeach
            @else
                <li><i class="fas fa-exclamation-triangle icon"></i> Tidak ada berkas kelengkapan.</li>
            @endif
        </ul>
    </div>

    <hr>

    <div class="modal-footer">
        @if($status == 'Menunggu Verifikasi') 
            <button class="btn btn-Tdkvalid" data-bs-toggle="modal" data-bs-target="#modalInvalid">
                <i class="fas fa-times"></i> Tidak Valid
            </button>

            <form action="{{ route('validasi', $id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin memvalidasi berkas ini?')">
                @csrf
                <button type="submit" class="btn btn-valid ">
                    <i class="fas fa-check"></i> Valid
                </button>
            </form>
        @endif
    </div>
</div>

<div class="page-footer">
    <p>© Copyright Abu dan Icha. Design by Icha aja</p>
</div>
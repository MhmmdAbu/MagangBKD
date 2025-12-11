@php
use Illuminate\Support\Facades\Storage;
@endphp

<style>
    /* Tambahkan ini ke file CSS Anda atau di @section('styles') jika menggunakan layout */
    body {
        font-family: 'Roboto', sans-serif; /* Pastikan load Google Fonts di layout utama */
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        margin: 0;
        padding: 20px;
        color: #333;
    }
    .card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    h3 {
        color: #4a90e2;
        font-weight: 700;
        margin-bottom: 15px;
        text-align: center;
    }
    iframe {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        width: 100%;
        height: 600px;
    }
    ul {
        list-style: none;
        padding: 0;
    }
    li {
        background: #f9f9f9;
        margin: 10px 0;
        padding: 15px;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    li:hover {
        background: #e8f4fd;
    }
    a {
        color: #4a90e2;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }
    a:hover {
        color: #357abd;
        text-decoration: underline;
    }
    .icon {
        margin-right: 10px;
        color: #4a90e2;
    }
    hr {
        border: none;
        height: 2px;
        background: linear-gradient(90deg, #4a90e2, #c3cfe2);
        margin: 30px 0;
    }
    .page-footer {
        text-align: center;
        font-size: 0.8rem;
        color: #6c757d;
        padding: 10px 0;
    }
    /* Responsivitas */
    @media (max-width: 768px) {
        iframe { height: 400px; }
        li { flex-direction: column; align-items: flex-start; }
        .card { padding: 15px; }
    }
</style>

<div class="container">
    <div class="card">
        <h3>Preview Surat Utama</h3>
        <!-- Iframe untuk PDF utama -->
        <iframe src="{{ Storage::url('pdf_pengajuan/'.$pdfUtama) }}" title="Preview PDF Utama"></iframe>
    </div>

    <div class="card">
        <h3>Daftar Berkas Kelengkapan</h3>
        <ul>
            @if($kelengkapan)
                @foreach ($kelengkapan as $file)
                    <li>
                        <span class="icon">📄</span> <!-- Ikon sederhana untuk file -->
                        {{ ucwords(str_replace('_', ' ', $file['nama_kolom'])) }} :
                        <a href="{{ route('pdf.berkas', [
                            'namaBerkas'=>$file['nama_kolom'],
                            'namaPDF'=>basename($file['nama_file']) ]) }}" target="_blank">
                            Lihat Surat
                        </a>
                    </li>
                @endforeach
            @else
                <li>Tidak ada berkas kelengkapan.</li>
            @endif
        </ul>
    </div>

    <hr>
</div>

<div class="page-footer">
    <p>© Copyright Abu dan Icha. Design by Icha aja</p>
</div>
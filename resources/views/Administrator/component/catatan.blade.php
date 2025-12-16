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
    .form-group {
        margin-bottom: 20px;
    }
    label {
        display: block;
        font-weight: 600;
        color: #4a90e2;
        margin-bottom: 8px;
    }
    textarea {
        width: 100%;
        padding: 15px;
        border: 2px solid #ddd;
        border-radius: 10px;
        font-family: 'Roboto', sans-serif;
        font-size: 1em;
        resize: vertical;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    textarea:focus {
        border-color: #4a90e2;
        outline: none;
        box-shadow: 0 4px 16px rgba(74, 144, 226, 0.3);
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
        border: none;
        cursor: pointer;
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
    .btn-batal {
        background: linear-gradient(135deg, #ff6b6b, #ee5a52);
        color: #fff;
    }
    .btn-selesai {
        background: linear-gradient(135deg, #4caf50, #45a049);
        color: #fff;
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
        .modal-footer { flex-direction: column; gap: 10px; }
        h3 { font-size: 1.2em; }
    }
</style>

<div class="container">
    <div class="card">
        <h3><i class="fas fa-edit"></i> Form Catatan</h3>
        <form action="{{ route('simpan.catatan', $pengajuan->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="catatan">Catatan:</label>
                <textarea name="catatan" rows="6" required>
                    {{ old('catatan', $pengajuan->catatan ?? '') }}
                </textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-batal" onclick="window.history.back()">
                    Batal
                </button>

                <button type="submit" class="btn btn-selesai">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<div class="page-footer">
    <p>© Copyright Abu dan Icha. Design by Icha aja</p>
</div>

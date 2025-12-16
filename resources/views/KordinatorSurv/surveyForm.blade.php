<!-- MODAL FORM SSPD-BPHTB -->
<style>
    :root {
        --primary-blue: #0d6efd;
        --soft-blue: #e7f1ff;
        --dark-text: #212529;
        --light-gray: #f8f9fa;
        --white: #ffffff;
        --black: #000000;
        --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        --border-radius: 12px;
    }

    .modal-content {
        border-radius: var(--border-radius);
        border: none;
        overflow: hidden;
        box-shadow: var(--shadow);
    }

    .modal-header {
        background: linear-gradient(135deg, var(--primary-blue), #2563eb);
        color: var(--white);
        border-bottom: none;
        padding: 20px 24px;
    }

    .modal-header .btn-close {
        filter: brightness(0) invert(1);
    }

    .modal-title {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 700;
        font-size: 1.5rem;
        color: var(--white);
    }

    .card {
        border-radius: var(--border-radius);
        border: 1px solid #e9ecef;
        box-shadow: var(--shadow);
        margin-bottom: 1.5rem;
        overflow: hidden;
    }

    .card-header {
        background-color: var(--soft-blue);
        color: var(--primary-blue);
        font-weight: 600;
        border-bottom: 1px solid #d6e4ff;
        padding: 16px 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1.1rem;
    }

    .card-body {
        background-color: var(--white);
        padding: 20px;
        color: var(--dark-text);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-label {
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        padding: 10px 12px;
    }

    .form-control:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
        outline: none;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 80px;
    }

    .btn-primary {
        background-color: var(--primary-blue);
        border: none;
        border-radius: 10px;
        font-weight: 600;
        padding: 12px 32px;
        transition: all 0.3s ease;
        font-size: 1rem;
        color: var(--white);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(13, 110, 253, 0.3);
        color: var(--white);
    }

    .row {
        margin-bottom: 1rem;
    }

    .row:last-child {
        margin-bottom: 0;
    }

    .modal-body {
        background-color: var(--light-gray);
        padding: 24px;
    }

    .d-flex.justify-content-end {
        padding-top: 20px;
        border-top: 1px solid #e9ecef;
    }

    /* Additional modern touches */
    .card:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        transition: box-shadow 0.3s ease;
    }

    .form-control::placeholder {
        color: #6c757d;
        font-style: italic;
    }

    /* Ensure text colors are balanced: black for main text, blue for accents, white for headers */
    .card-body p, .card-body label, .card-body input, .card-body textarea {
        color: var(--dark-text);
    }

    .card-header {
        color: var(--primary-blue);
    }

    .modal-header h4 {
        color: var(--white);
    }
</style>

<div class="modal fade" id="modalFormSSPD" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">
                    Formulir SSPD-BPHTB
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body">
                <form action="{{ route('proses.surveyForm', '$pengajuan->id') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- INFORMASI UMUM -->
                    <div class="card">
                        <div class="card-header">Informasi Umum</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nama Wajib Pajak :</label>
                                    <input type="text" class="form-control" value="{{ $pengajuan->nama_wajib_pajak }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">NIK</label>
                                    <input type="text" class="form-control" value="{{ $pengajuan->nik }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">NOP</label>
                                    <input type="text" class="form-control" value="{{ $pengajuan->nop }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat lengkap">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Desa / Kelurahan</label>
                                    <input type="text" class="form-control" name="desa_kelurahan" placeholder="Masukkan desa/kelurahan">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" name="kecamatan" placeholder="Masukkan kecamatan">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">PPATK / PPATS</label>
                                    <input type="text" class="form-control" name="ppatk_ppats" placeholder="Masukkan PPATK/PPATS">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DATA TANAH -->
                    <div class="card">
                        <div class="card-header">Data Tanah</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Luas Tanah (m²)</label>
                                <input type="number" class="form-control" name="luas_tanah" placeholder="Masukkan luas tanah">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Letak / Posisi Strategis</label>
                                <textarea class="form-control" rows="3" name="posisi_tanah" placeholder="Deskripsikan letak atau posisi strategis tanah"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- DATA BANGUNAN -->
                    <div class="card">
                        <div class="card-header">Data Bangunan</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Luas Bangunan (m²)</label>
                                <input type="number" class="form-control" name="luas_bangunan" placeholder="Masukkan luas bangunan">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis / Tipe Bangunan</label>
                                <textarea class="form-control" rows="3" name="jenis_bangunan" placeholder="Deskripsikan jenis atau tipe bangunan"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- CATATAN -->
                    <div class="card">
                        <div class="card-header">Catatan Tambahan</div>
                        <div class="card-body">
                            <textarea class="form-control" rows="3" name="catatan" placeholder="Tambahkan catatan jika diperlukan"></textarea>
                        </div>
                    </div>

                    <!-- DOKUMEN -->
                    <div class="card">
                        <div class="card-header">Dokumen Pendukung</div>
                        <div class="card-body">
                            <label class="form-label">
                                Scan Keterangan Ahli Waris (Asli / Dilegalisir)
                            </label>
                            <input type="file" class="form-control" name="file_foto_bangunan" required accept=".pdf,.jpg,.jpeg,.png">
                        </div>
                    </div>

                    <!-- SUBMIT -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Simpan Data
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3f4f6;
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 14px;
        }

        .page-wrapper {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 32px 36px;
            border: 1px solid #d1d5db;
        }

        .form-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .form-header h5 {
            font-weight: 700;
            letter-spacing: .5px;
            margin-bottom: 6px;
        }

        .form-header small {
            color: #374151;
        }

        .section {
            border: 1px solid #d1d5db;
            border-radius: 6px;
            margin-bottom: 26px;
        }

        .section-title {
            background: #e7f1ff;
            padding: 10px 16px;
            font-weight: 700;
            color: #0d6efd;
            border-bottom: 1px solid #d1d5db;
        }

        .section-body {
            padding: 18px 18px 22px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #9ca3af;
            height: 38px;
            font-size: 14px;
        }

        textarea.form-control {
            height: auto;
            min-height: 90px;
        }

        .form-control:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 .15rem rgba(22,163,74,.15);
        }

        .btn-submit {
            background: #16a34a;
            border: none;
            padding: 12px 50px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            color:white;
        }

        .btn-submit:hover {
            background: #15803d;
        }

        .signature-box {
            height: 90px;
            border-bottom: 1px solid #000;
            margin-top: 60px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="page-wrapper">
    <form action="{{ route('proses.surveyForm', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- HEADER -->
        <div class="form-header">
            <h5>FORMULIR SURVEY LAPANGAN</h5>
            <small>
                UPTD Pelayanan PBB & BPHTB <br>
                Badan Keuangan Daerah Kota Parepare
            </small>
            <hr class="mt-3">
        </div>

        <!-- INFORMASI UMUM -->
        <div class="section">
            <div class="section-title">I. INFORMASI UMUM</div>
            <div class="section-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Terima</label>
                        <input type="date" class="form-control" value="{{ $pengajuan->created_at->format('Y-m-d') }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">NPWP</label>
                        <input type="text" class="form-control" value="{{ $pengajuan->NPWP }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jenis Perolehan Hak</label>
                        <input type="text" class="form-control" value="{{ $pengajuan->jenisLayanan }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nama Wajib Pajak</label>
                        <input type="text" class="form-control" value="{{ $pengajuan->nama_wajib_pajak }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NOP</label>
                        <input type="text" class="form-control" value="{{ $pengajuan->nop }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Alamat Objek Pajak</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Desa / Kelurahan</label>
                        <input type="text" class="form-control" name="desa_kelurahan">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">PPAT / Notaris</label>
                        <input type="text" class="form-control" name="ppat_notaris">
                    </div>
                </div>
            </div>
        </div>

        <!-- DATA TANAH -->
        <div class="section">
            <div class="section-title">II. DATA TANAH</div>
            <div class="section-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Luas Tanah (m²)</label>
                        <input type="number" class="form-control" name="luas_tanah">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Letak / Posisi Strategis Tanah</label>
                        <textarea class="form-control" name="posisiStrategis"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- DATA BANGUNAN -->
        <div class="section">
            <div class="section-title">III. DATA BANGUNAN</div>
            <div class="section-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Luas Bangunan (m²)</label>
                        <input type="number" class="form-control" name="luas_bangunan">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jenis / Tipe Bangunan</label>
                        <input type="text" class="form-control" name="tipeBangunan">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jumlah Lantai</label>
                        <input type="number" class="form-control" name="jmlhLantai">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Kondisi Umum Bangunan</label>
                        <textarea class="form-control" name="kondisiBangunan"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- CATATAN -->
        <div class="section">
            <div class="section-title">IV. CATATAN KHUSUS</div>
            <div class="section-body">
                <textarea class="form-control" name="catatanKhusus"></textarea>
            </div>
        </div>

        <!-- PELAKSANAAN -->
        <div class="section">
            <div class="section-title">V. PELAKSANAAN SURVEY</div>
            <div class="section-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Survey</label>
                        <input type="date" class="form-control" name="tgl_survey">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Upload Foto / Dokumen Pendukung</label>
                        <input type="file" class="form-control" name="file_foto_bangunan">
                    </div>
                </div>
            </div>
        </div>

        <!-- TANDA TANGAN -->
        <div class="row mt-5">
            <div class="col-md-6 text-center">
                Petugas Survey
                <div class="signature-box"></div>
            </div>
            <div class="col-md-6 text-center">
                Kepala UPTD
                <div class="signature-box"></div>
            </div>
        </div>

        <!-- SUBMIT -->
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-submit">
                Simpan & Generate PDF
            </button>
        </div>
    </form>
</div>

</body>
</html>

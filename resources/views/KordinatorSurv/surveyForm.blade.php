<style>
    .card {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,.08);
        margin-bottom: 20px;
    }
    .card-header {
        background: #e7f1ff;
        font-weight: 600;
        color: #0d6efd;
    }
    .form-label {
        font-weight: 600;
    }
</style>

<div class="container-fluid">
<form action="{{ route('proses.surveyForm', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
@csrf

{{-- ================= INFORMASI UMUM ================= --}}
<div class="card">
    <div class="card-header">Informasi Umum</div>
    <div class="card-body">

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Tanggal Terima</label>
                <input type="date" class="form-control" name="tgl_terima" value="{{ $pengajuan->created_at->format('d F Y') }}" readonly>
            </div>
            <div class="col-md-4">
                <label class="form-label">NPWP</label>
                <input type="text" class="form-control" name="npwp" value="{{ $pengajuan->npwp }}" readonly>
            </div>
            <div class="col-md-4">
                <label class="form-label">Jenis Perolehan Hak</label>
                <select class="form-control" name="jenis_perolehan" readonly>
                    <option value="{{ $pengajuan->jenisLayanan }}">$pengajuan->jenisLayanan</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Nama Wajib Pajak</label>
                <input type="text" class="form-control" name="nama_wajib_pajak"
                       value="{{ $pengajuan->nama_wajib_pajak }}" readonly>
            </div>
            <div class="col-md-6">
                <label class="form-label">NOP</label>
                <input type="text" class="form-control" name="nop"
                       value="{{ $pengajuan->nop }}" readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat">
            </div>
            <div class="col-md-3">
                <label class="form-label">Desa / Kelurahan</label>
                <input type="text" class="form-control" name="desa_kelurahan">
            </div>
            <div class="col-md-3">
                <label class="form-label">Kecamatan</label>
                <input type="text" class="form-control" name="kecamatan">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="form-label">PPAT / Notaris</label>
                <input type="text" class="form-control" name="ppatk_ppats">
            </div>
        </div>

    </div>
</div>

{{-- ================= DATA TANAH ================= --}}
<div class="card">
    <div class="card-header">Data Tanah</div>
    <div class="card-body">

        <div class="mb-3">
            <label class="form-label">Luas Tanah (m²)</label>
            <input type="number" class="form-control" name="luas_tanah" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Letak / Posisi Strategis Tanah</label>
            <textarea class="form-control" rows="3" name="posisiStrategis"></textarea>
        </div>

    </div>
</div>

{{-- ================= DATA BANGUNAN ================= --}}
<div class="card">
    <div class="card-header">Data Bangunan</div>
    <div class="card-body">

        <div class="row mb-3">
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
        </div>

        <div class="mb-3">
            <label class="form-label">Kondisi Umum Fisik Bangunan</label>
            <textarea class="form-control" rows="3" name="kondisiBangunan"></textarea>
        </div>

    </div>
</div>

{{-- ================= CATATAN KHUSUS ================= --}}
<div class="card">
    <div class="card-header">Catatan Khusus</div>
    <div class="card-body">
        <textarea class="form-control" rows="3" name="catatanKhusus"></textarea>
    </div>
</div>

{{-- ================= TANGGAL SURVEY ================= --}}
<div class="card">
    <div class="card-header">Pelaksanaan Survey</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Tanggal Survey</label>
                <input type="date" class="form-control" name="tgl_survey">
            </div>
        </div>
    </div>
</div>

{{-- ================= DOKUMEN ================= --}}
<div class="card">
    <div class="card-header">Dokumen Pendukung</div>
    <div class="card-body">
        <label class="form-label">Upload Foto / Scan Bangunan</label>
        <input type="file" class="form-control" name="file_foto_bangunan"
               accept=".jpg,.jpeg,.png,.pdf">
    </div>
</div>

{{-- ================= SUBMIT ================= --}}
<div class="text-end mt-4">
    <button type="submit" class="btn btn-primary btn-lg">
        Simpan & Generate PDF
    </button>
</div>

</form>
</div>

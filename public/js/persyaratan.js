document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('layanan-select');
    const outputDiv = document.getElementById('syarat-output');

    const persyaratanData = {
        layanan1: [
            'Scan KTP dan Kartu Keluarga (Penjual dan Pembeli)',
            'Scan Sertifikat Induk/Hasil Pemecahan',
            'Scan PBB Tahun Terakhir',
            'Scan Kwitansi Asli',
            'Scan Surat Pernyataan Bermaterai'
        ],
        layanan2: [
            'Scan KTP, Kartu Keluarga Pemberi dan Penerima Hibah',
            'Scan Sertifikat',
            'Scan PBB 2022',
            'Scan Surat Pernyataan Bermaterai'
        ],
        layanan3: [
            'Scan Keterangan Ahli Waris Asli/Dilegalisir',
            'Scan Pernyataan Ahli Waris Asli/Dilegalisir',
            'Scan Kuasa Ahli Waris Asli/Dilegalisir',
            'Scan KTP dan Kartu Keluarga (Semua Ahli Waris)',
            'Scan Surat Kematian (Bagi yang Meninggal)',
            'Scan KIA (Bagi yang dibawah umur)',
            'Scan Sertifikat',
            'Scan PBB Tahun Terakhir',
            'Scan Surat Pernyataan Bermaterai'
        ],
        layanan4: [
            'Scan KTP dan Kartu Keluarga',
            'Scan Sertifikat PTSL/PRONA',
            'Scan PBB Tahun Terakhir',
            'Scan Surat Pernyataan Bermaterai'
        ]
    };

    function updatePersyaratanView(key) {
        if (!key || !persyaratanData[key]) {
            outputDiv.innerHTML = 'Pilih layanan di atas untuk melihat daftar dokumen persyaratan.';
            return;
        }
        const listHTML = persyaratanData[key].map(item => `<li>${item}</li>`).join('');
        outputDiv.innerHTML = `<h4>Dokumen Layanan ${document.querySelector(`#layanan-select option[value="${key}"]`).textContent}:</h4><ul>${listHTML}</ul>`;
    }

    if (select) {
        select.addEventListener('change', function() {
            updatePersyaratanView(this.value);
        });
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('layanan-select');
    const outputDiv = document.getElementById('syarat-output');
    const persyaratanData = {
        // Jual Beli
        layanan1: `
            <h4>Dokumen Layanan Jual Beli:</h4>
            <ul>
                <li>Scan KTP dan Kartu Keluarga (Penjual dan Pembeli)</li>
                <li>Scan Sertifikat Induk/Hasil Pemecahan</li>
                <li>Scan PBB Tahun Terakhir</li>
                <li>Scan Kwitansi Asli</li>
                <li>Scan Surat Pernyataan Bermaterai</li>
            </ul>
        `,
        // Hibah
        layanan2: `
            <h4>Dokumen Layanan Hibah:</h4>
            <ul>
                <li>Scan KTP, Kartu Keluarga Pemberi dan Penerima Hibah</li>
                <li>Scan Sertifikat</li>
                <li>Scan PBB 2022</li>
                <li>Scan Surat Pernyataan Bermaterai</li>
            </ul>
        `,
        // Ahli Waris
        layanan3: `
            <h4>Dokumen Layanan Ahli Waris:</h4>
            <ul>
                <li>Scan Keterangan Ahli Waris Asli/Dilegalisir</li>
                <li>Scan Pernyataan Ahli Waris Asli/Dilegalisir</li>
                <li>Scan Kuasa Ahli Waris Asli/Dilegalisir</li>
                <li>Scan KTP dan Kartu Keluarga (Semua Ahli Waris)</li>
                <li>Scan Surat Kematian (Bagi yang Meninggal)</li>
                <li>Scan KIA (Bagi yang dibawah umur)</li>
                <li>Scan Sertifikat</li>
                <li>Scan PBB Tahun Terakhir</li>
                <li>Scan Surat Pernyataan Bermaterai</li>
            </ul>
        `,
        // PTSL/PRONA
        layanan4: `
            <h4>Dokumen Layanan PTSL/PRONA:</h4>
            <ul>
                <li>Scan KTP dan Kartu Keluarga</li>
                <li>Scan Sertifikat PTSL/PRONA</li>
                <li>Scan PBB Tahun Terakhir</li>
                <li>Scan Surat Pernyataan Bermaterai</li>
            </ul>
        `
    };

    if (select) {
        select.addEventListener('change', function() {
            const selectedValue = this.value;
            const syaratHTML = persyaratanData[selectedValue];

            if (syaratHTML) {
                outputDiv.innerHTML = syaratHTML;
            } else {
                outputDiv.innerHTML = "Pilih layanan di atas untuk melihat daftar dokumen persyaratan.";
            }
        });
    }
});
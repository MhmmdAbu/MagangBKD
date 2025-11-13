document.addEventListener('DOMContentLoaded', function () {
  const select = document.getElementById('layanan-select');
  const outputDiv = document.getElementById('syarat-output');
  const editLayananBtn = document.getElementById('editLayananBtn');
  
  const modalEditLayanan = new bootstrap.Modal(document.getElementById('modalEditLayanan'));
  const formEditLayanan = document.getElementById('formEditLayanan');
  const modalLayananSelect = document.getElementById('modalLayananSelect');

  const modalFormEdit = new bootstrap.Modal(document.getElementById('modalFormEdit'));
  const editLayananNameInput = document.getElementById('editLayananName');
  const editPersyaratanTextarea = document.getElementById('editPersyaratan');
  const formPersyaratanEdit = document.getElementById('formPersyaratanEdit');

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
    if(!key || !persyaratanData[key]) {
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

  editLayananBtn.addEventListener('click', () => {
    modalEditLayanan.show();
  });

  formEditLayanan.addEventListener('submit', (e) => {
    e.preventDefault();

    const key = modalLayananSelect.value;
    if (!key) {
      alert('Silakan pilih layanan yang ingin diedit.');
      return;
    }

    editLayananNameInput.value = modalLayananSelect.options[modalLayananSelect.selectedIndex].text;
    editPersyaratanTextarea.value = persyaratanData[key].map(item => '- ' + item).join('\n');

    modalEditLayanan.hide();
    modalFormEdit.show();

    formPersyaratanEdit.setAttribute('data-edit-key', key);
  });

  formPersyaratanEdit.addEventListener('submit', (e) => {
    e.preventDefault();

    const key = formPersyaratanEdit.getAttribute('data-edit-key');
    if (!key) {
      alert('Terjadi kesalahan: data layanan tidak ditemukan.');
      return;
    }

    const editedText = editPersyaratanTextarea.value.trim();
    if (!editedText) {
      alert('Persyaratan tidak boleh kosong.');
      return;
    }

    const updatedItems = editedText.split('\n')
      .map(line => line.trim())
      .filter(line => line.startsWith('-'))
      .map(line => line.replace(/^-/, '').trim());

    if(updatedItems.length === 0){
      alert('Format persyaratan tidak valid. Gunakan tanda "-" diawal setiap item.');
      return;
    }

    persyaratanData[key] = updatedItems;

    if(select.value === key) {
      updatePersyaratanView(key);
    }

    alert('Persyaratan berhasil disimpan.');

    modalFormEdit.hide();
  });
});

const detailModal = document.getElementById('detailModal');
    detailModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        
        const nomorSurat = button.getAttribute('data-nomor-surat');
        const tanggal = button.getAttribute('data-tanggal');
        const nama = button.getAttribute('data-nama');
        const status = button.getAttribute('data-status');
        
        document.getElementById('modal-nomor-surat').textContent = nomorSurat;
        document.getElementById('modal-tanggal').textContent = tanggal;
        document.getElementById('modal-nama').textContent = nama;
        document.getElementById('modal-status').textContent = status;
    });
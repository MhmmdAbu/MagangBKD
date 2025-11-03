
document.addEventListener('DOMContentLoaded', function() {
    const tabAjukan = document.getElementById('tab-ajukan');
    const tabRiwayat = document.getElementById('tab-riwayat');
    const formAjukan = document.getElementById('form-ajukan');
    const formRiwayat = document.getElementById('form-riwayat');

    function activateTab(activeTab, activeForm, inactiveTab, inactiveForm) {
        activeTab.classList.add('active');
        inactiveTab.classList.remove('active');
        activeForm.style.display = 'block';
        inactiveForm.style.display = 'none';
    }

    tabAjukan.addEventListener('click', () => {
        activateTab(tabAjukan, formAjukan, tabRiwayat, formRiwayat);
    });

    tabRiwayat.addEventListener('click', () => {
        activateTab(tabRiwayat, formRiwayat, tabAjukan, formAjukan); 
    });
    function updateFileName(input, displayId) {
        const displayElement = document.getElementById(displayId); 
        if (input.files.length > 0) {
            displayElement.textContent = input.files[0].name; 
        } else {
            displayElement.textContent = 'No File Choosen'; 
        }
    }
});
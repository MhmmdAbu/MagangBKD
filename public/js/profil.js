
document.addEventListener('DOMContentLoaded', function() {
    const uploadButton = document.getElementById('upload-button');
    const fileInput = document.getElementById('profile-upload-input');
    const deleteButton = document.getElementById('delete-profile-image-button');

    const profileImageContainer = document.getElementById('profile-image-container');
    const profilePreviewImage = document.getElementById('profile-preview-image');
    const defaultAvatarIcon = document.getElementById('default-avatar-icon');

    const editProfilePreviewImage = document.getElementById('edit-profile-preview-image');
    const editDefaultAvatarIcon = document.getElementById('edit-default-avatar-icon');

    const tabLinks = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');

    function displayImage(file) {
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imageUrl = e.target.result;
                
                profilePreviewImage.src = imageUrl;
                profilePreviewImage.style.display = 'block';
                if (defaultAvatarIcon) {
                    defaultAvatarIcon.style.display = 'none';
                }

                editProfilePreviewImage.src = imageUrl;
                editProfilePreviewImage.style.display = 'block';
                if (editDefaultAvatarIcon) {
                    editDefaultAvatarIcon.style.display = 'none';
                }
            };

            reader.readAsDataURL(file);
        }
    }

    function showTab(tabName) {
        // Sembunyikan semua konten tab
        tabContents.forEach(content => {
            content.style.display = 'none';
            content.classList.remove('active');
        });
        // Hapus class 'active' dari semua link tab
        tabLinks.forEach(link => {
            link.classList.remove('active');
        });
        // Tampilkan konten tab yang dipilih
        const activeContent = document.getElementById(tabName + '-tab');
        if (activeContent) {
            activeContent.style.display = 'block';
            activeContent.classList.add('active');
        }
        // Tambahkan class 'active' pada link tab yang diklik
        const activeLink = document.querySelector(`[data-tab="${tabName}"]`);
        if (activeLink) {
            activeLink.classList.add('active');
        }
    }

    tabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah reload halaman
            const tabName = this.getAttribute('data-tab');
            showTab(tabName);
        });
    });
    // Set tab default (Edit Profile) saat halaman load
    showTab('edit-profile');

    function resetProfileImage() {
        profilePreviewImage.src = '';
        profilePreviewImage.style.display = 'none';
        if (defaultAvatarIcon) {
            defaultAvatarIcon.style.display = 'block';
        }
        editProfilePreviewImage.src = '';
        editProfilePreviewImage.style.display = 'none';
        if (editDefaultAvatarIcon) {
            editDefaultAvatarIcon.style.display = 'block';
        }
        fileInput.value = '';
    }

    if (uploadButton && fileInput) {
        uploadButton.addEventListener('click', function() {
            fileInput.click();
        });
    }

    if (fileInput) {
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                displayImage(this.files[0]);
            } else {
                resetProfileImage();
            }
        });
    }
    if (deleteButton) {
        deleteButton.addEventListener('click', function() {
            resetProfileImage();
            console.log("Gambar profil dihapus.");
            
        });
    }


});
// Start Logout Modal Handling
document.addEventListener('DOMContentLoaded', function() {
    // Open modal
    window.confirmLogout = function(event) {
        console.log('confirmLogout triggered');
        event.preventDefault();
        const modal = document.getElementById('logoutModal');
        modal.classList.remove('pointer-events-none', 'hidden');
        setTimeout(() => {
            modal.classList.add('opacity-100');
        }, 50);
        return false;
    };

    // Close modal
    window.closeLogoutModal = function() {
        const modal = document.getElementById('logoutModal');
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    };

    // Submit logout form
    window.submitLogout = function() {
        const form = document.getElementById('logoutForm');
        const submitBtn = document.querySelector('#logoutModal button[onclick="submitLogout()"]');
        const submitSpinner = submitBtn?.querySelector('.loading-spinner');

        if (form && submitBtn && submitSpinner) {
            submitBtn.disabled = true;
            submitBtn.classList.add('cursor-not-allowed', 'opacity-75');
            submitSpinner.classList.remove('hidden');
            form.submit();
        } else {
            console.error('Logout form, submit button, or spinner not found');
        }
    };

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeLogoutModal();
        }
    });

    // Close modal when clicking outside
    document.getElementById('logoutModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeLogoutModal();
        }
    });
});
// End Logout Modal Handling

// Start Popup Profile
const profileButton = document.getElementById('profileButton');
const profilePopup = document.getElementById('profilePopup');

let isPopupVisible = false;

profileButton.addEventListener('click', () => {
    if (isPopupVisible) {
        hidePopup();
    } else {
        showPopup();
    }
});

document.addEventListener('click', (event) => {
    if (!profileButton.contains(event.target) && !profilePopup.contains(event.target)) {
        hidePopup();
    }
});

function showPopup() {
    profilePopup.classList.remove('hidden');
    // trigger transition
    setTimeout(() => {
        profilePopup.classList.remove('opacity-0', 'scale-95');
        profilePopup.classList.add('opacity-100', 'scale-100');
    }, 10);
    isPopupVisible = true;
}

function hidePopup() {
    profilePopup.classList.remove('opacity-100', 'scale-100');
    profilePopup.classList.add('opacity-0', 'scale-95');
    // hide after transition
    setTimeout(() => {
        profilePopup.classList.add('hidden');
    }, 300);
    isPopupVisible = false;
}

function confirmLogout(event) {
    if (!confirm("Are you sure you want to logout?")) {
        event.preventDefault();
        return false;
    }
    return true;
}
// End Popup Profile

// Start Close Message
function showNotification(id) {
    const notif = document.getElementById(id);
    if (!notif) return;

    // Hilangkan kelas yang menyembunyikan
    notif.classList.remove('opacity-0');
    notif.classList.remove('translate-y-full', 'md:translate-x-full');

    // Tambahkan kelas tampil
    notif.classList.add('opacity-100');
    notif.classList.add('translate-y-0', 'md:translate-x-0');

    // Auto close setelah 5 detik
    setTimeout(() => closeNotification(id), 5000);
}

function closeNotification(id) {
    const notif = document.getElementById(id);
    if (!notif) return;

    // Tambahkan kelas keluar
    notif.classList.remove('opacity-100', 'translate-y-0', 'md:translate-x-0');
    notif.classList.add('opacity-0', 'translate-y-full', 'md:translate-x-full');

    // Hapus dari DOM setelah animasi
    setTimeout(() => notif.remove(), 300);
}

window.addEventListener('DOMContentLoaded', () => {
    showNotification('successNotification');
    showNotification('errorNotification');
});

// Opsional: Auto-close setelah beberapa detik
window.addEventListener('DOMContentLoaded', () => {
    const successNotif = document.getElementById('successNotification');
    const errorNotif = document.getElementById('errorNotification');

    if (successNotif) {
        setTimeout(() => closeNotification('successNotification'), 5000); // 5 detik
    }

    if (errorNotif) {
        setTimeout(() => closeNotification('errorNotification'), 7000); // 7 detik
    }
});
// End Close Message


// Start Modal Edit Profile
document.addEventListener('DOMContentLoaded', function() {
    // Open modal
    window.openEditModal = function() {
        const modal = document.getElementById('editModal');
        modal.classList.remove('opacity-0', 'pointer-events-none', 'hidden');
        setTimeout(() => {
            modal.classList.add('opacity-100');
        }, 50);
    };

    // Close modal
    window.closeEditModal = function() {
        const modal = document.getElementById('editModal');
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    };

    // Image preview handling
    function setupImagePreview(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        if (input && preview) {
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file && file.type.match('image.*')) {
                    if (file.size > 2 * 1024 * 1024) {
                        alert('File size exceeds 2MB limit!');
                        input.value = '';
                        preview.classList.add('hidden');
                        return;
                    }
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.querySelector('img').src = e.target.result;
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.classList.add('hidden');
                }
            });
        }
    }

    // Setup image previews
    ['photo_profile', 'ktp_image', 'sim_image'].forEach(id => {
        setupImagePreview(id, `${id}_preview`);
    });

    // Form submission with loading state
    const form = document.querySelector('form#editForm');
    const submitBtn = form?.querySelector('button[type="submit"]');
    const submitSpinner = submitBtn?.querySelector('.loading-spinner');

    if (form && submitBtn && submitSpinner) {
        form.addEventListener('submit', function(e) {
            submitBtn.disabled = true;
            submitBtn.classList.add('cursor-not-allowed', 'opacity-75');
            submitSpinner.classList.remove('hidden');
        });
    } else {
        console.error('Form, submit button, or spinner not found:', {
            form,
            submitBtn,
            submitSpinner
        });
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeEditModal();
        }
    });

    // Close modal when clicking outside
    document.getElementById('editModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeEditModal();
        }
    });
});
// Modal Edit Profile
// Start Scroll Up
        document.addEventListener('DOMContentLoaded', () => {
            const scrollUpBtn = document.getElementById('scrollUpBtn');

            // Handle scroll to show/hide button with smooth animation
            window.addEventListener('scroll', () => {
                if (window.scrollY > 250) {
                    // Show button with smooth "pull up" effect
                    scrollUpBtn.classList.remove('hidden');
                    // Use requestAnimationFrame for smoother transition
                    requestAnimationFrame(() => {
                        scrollUpBtn.classList.add('opacity-100', 'translate-y-0', 'scale-100', 'pointer-events-auto');
                        scrollUpBtn.classList.remove('opacity-0', 'translate-y-4', 'scale-95', 'pointer-events-none');
                    });
                } else {
                    // Hide button with smooth "pull down" effect
                    scrollUpBtn.classList.add('opacity-0', 'translate-y-4', 'scale-95', 'pointer-events-none');
                    scrollUpBtn.classList.remove('opacity-100', 'translate-y-0', 'scale-100', 'pointer-events-auto');
                    // Hide after animation completes
                    setTimeout(() => {
                        if (window.scrollY <= 250) {
                            scrollUpBtn.classList.add('hidden');
                        }
                    }, 400); // Match duration-400
                }
            });

            // Smooth scroll to top with click animation
            scrollUpBtn.addEventListener('click', () => {
                // Add subtle pulse effect on click
                scrollUpBtn.classList.add('animate-pulse');
                setTimeout(() => {
                    scrollUpBtn.classList.remove('animate-pulse');
                }, 150);

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
// End Scroll Up

// Start Using english popup
document.addEventListener('DOMContentLoaded', () => {
    // Check if notification has already been shown in this session
    if (sessionStorage.getItem('notificationShown')) {
        return; // Exit if notification was already displayed
    }

    const notification = document.getElementById('notification');
    const countdownBar = document.getElementById('countdownBar');
    
    // Mark notification as shown
    sessionStorage.setItem('notificationShown', 'true');
    
    // Initial styles for animation
    notification.style.opacity = '0';
    notification.style.transform = 'translateX(20px)';
    
    // Show notification with animation
    notification.classList.remove('hidden');
    setTimeout(() => {
        notification.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        notification.style.opacity = '1';
        notification.style.transform = 'translateX(0)';
    }, 100); // Small delay for smooth rendering
    
    // Set duration for notification (in milliseconds)
    const duration = 5000; // 5 seconds
    
    // Update countdown bar width
    let startTime = Date.now();
    const updateCountdown = () => {
        const elapsed = Date.now() - startTime;
        const progress = Math.max(0, 1 - elapsed / duration);
        countdownBar.style.width = `${progress * 100}%`;
        
        if (progress > 0) {
            requestAnimationFrame(updateCountdown);
        } else {
            // Animate out
            notification.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(20px)';
            setTimeout(() => {
                notification.classList.add('hidden');
                // Reset styles for potential reuse
                notification.style.opacity = '1';
                notification.style.transform = 'translateX(0)';
                notification.style.transition = '';
            }, 500); // Match transition duration
        }
    };
    
    // Start countdown animation
    requestAnimationFrame(updateCountdown);
});
// End Using english popup

// Navbar Js
        document.addEventListener('DOMContentLoaded', function() {
            // Mendapatkan elemen hamburger, navbar, dan header
            const hamburger = document.getElementById('hamburger');
            const navbar = document.getElementById('navbar');
            const hamburgerIcon = document.getElementById('hamburger-icon');
            const header = document.querySelector('header');
            const logo = document.querySelector('.logo');
            
            // Menambahkan event listener untuk hamburger
            hamburger.addEventListener('click', function() {
                navbar.classList.toggle('-translate-y-full');
                navbar.classList.toggle('translate-y-0');
                hamburgerIcon.classList.toggle('bx-menu');
                hamburgerIcon.classList.toggle('bx-x');
                hamburgerIcon.classList.toggle('rotate-180');
                hamburgerIcon.classList.toggle('text-shark-950');
                logo.classList.toggle('text-shark-950');
            });
    
            // Menambahkan efek scroll fixed pada header
            window.addEventListener('scroll', function() {
                if (window.scrollY > 20) {
                    // Menambahkan kelas fixed dan efek transisi pada header saat di-scrol l
                    header.classList.add(
                        'shadow-lg',
                        'bg-shark-950/30',
                        'backdrop-blur-md',
                        'transition-background-color'
                    );
                } else {
                    // Menghapus kelas fixed saat scroll ke atas
                    header.classList.remove(
                        'shadow-lg', 
                        'bg-shark-950/30', 
                        'backdrop-blur-md',
                        'transition-background-color'
                    );
                }
            });
        });
// End Navbar Js


// Dropdown Language Js
document.addEventListener('DOMContentLoaded', () => {
    const dropdowns = document.querySelectorAll('.language-dropdown');

    dropdowns.forEach(dropdown => {
        const langButton = dropdown.querySelector('.lang-button');
        const dropdownMenu = dropdown.querySelector('.dropdown-menu');
        const selectedFlag = dropdown.querySelector('.selected-flag');

        // Toggle dropdown open/close
        langButton.addEventListener('click', (e) => {
            e.stopPropagation(); // supaya klik tombol tidak menutup menu
            dropdownMenu.classList.toggle('hidden');
            dropdownMenu.classList.toggle('scale-100');
            dropdownMenu.classList.toggle('opacity-100');
        });

        // Handle language selection
        const options = dropdownMenu.querySelectorAll('.language-option');
        options.forEach(option => {
            option.addEventListener('click', (e) => {
                e.stopPropagation(); // prevent bubbling
                const flag = option.getAttribute('data-flag');
                const lang = option.getAttribute('data-lang');
                const url = option.getAttribute('data-url');

                selectedFlag.src = flag;
                selectedFlag.alt = lang;
                selectedFlag.title = lang;

                dropdownMenu.classList.add('hidden');
                dropdownMenu.classList.remove('scale-100', 'opacity-100');

                window.location.href = url;
            });
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
                dropdownMenu.classList.remove('scale-100', 'opacity-100');
            }
        });
    });
});
// End Dropdown Language Js

// Start Dropdown Any Questions
function toggleDropdown(button) {
    const article = button.nextElementSibling;
    const icon = button.querySelector('i');

    if (article.style.maxHeight && article.style.maxHeight !== '0px') {
        article.style.maxHeight = '0px';
        icon.classList.remove('rotate-180');
    } else {
        article.style.maxHeight = article.scrollHeight + 'px';
        icon.classList.add('rotate-180');
    }
}
// End Dropdown Any Questions

// Start Button Hide & Visible Password
function togglePassword(fieldId) {
const passwordField = document.getElementById(fieldId);
const iconElement = document.getElementById(fieldId + '-icon');

if (passwordField.type === 'password') {
    passwordField.type = 'text';
    iconElement.classList.remove('bx-hide');
    iconElement.classList.add('bx-show');
} else {
    passwordField.type = 'password';
    iconElement.classList.remove('bx-show');
    iconElement.classList.add('bx-hide');
}
}
// End Button Hide & Visible Password

// Start Slider Reviews
const slider = document.getElementById('slider');
const nextBtn = document.getElementById('nextBtn');
const prevBtn = document.getElementById('prevBtn');

nextBtn.addEventListener('click', () => {
    slider.scrollBy({
        left: 320,
        behavior: 'smooth'
    });
});

prevBtn.addEventListener('click', () => {
    slider.scrollBy({
        left: -320,
        behavior: 'smooth'
    });
});

// Center the first item on load
window.addEventListener('', () => {
    const firstCard = slider.querySelector('.snap-center');
    if (firstCard) {
        firstCard.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest',
            inline: 'center'
        });
    }
});
// End Slider Reviews

// Start Filter Logic
const filterBtn = document.getElementById('filterBtn');
const rentSection = document.getElementById('rent');

function toggleFilter() {
    const filter = document.getElementById('mobileFilter');
    filter.classList.toggle('translate-y-full');
    filter.classList.toggle('translate-y-0');
}

window.addEventListener('scroll', () => {
    const rect = rentSection.getBoundingClientRect();
    const isVisible = rect.top < window.innerHeight && rect.bottom > 0;

    if (isVisible) {
        filterBtn.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
        filterBtn.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
    } else {
        filterBtn.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
        filterBtn.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
    }
});
// End Filter Logic

// Start Modal Login di rent-detail.blade.php
function showModal() {
    const modal = document.getElementById('loginModal');
    const backdrop = document.getElementById('modalBackdrop');
    const content = document.getElementById('modalContent');

    // Show modal
    modal.classList.remove('hidden');

    // Reset any existing animations
    backdrop.classList.remove('backdrop-exit');
    content.classList.remove('modal-exit');

    // Add entrance animations
    requestAnimationFrame(() => {
        backdrop.classList.add('backdrop-enter');
        content.classList.add('modal-enter');
    });

    // Prevent body scroll
    document.body.style.overflow = 'hidden';

    // Add event listeners
    modal.addEventListener('keydown', handleKeyDown);
    backdrop.addEventListener('click', hideModal);
}

function hideModal() {
    const modal = document.getElementById('loginModal');
    const backdrop = document.getElementById('modalBackdrop');
    const content = document.getElementById('modalContent');

    // Remove entrance animations
    backdrop.classList.remove('backdrop-enter');
    content.classList.remove('modal-enter');

    // Add exit animations
    backdrop.classList.add('backdrop-exit');
    content.classList.add('modal-exit');

    // Hide modal after animation completes
    setTimeout(() => {
        modal.classList.add('hidden');
        backdrop.classList.remove('backdrop-exit');
        content.classList.remove('modal-exit');
        document.body.style.overflow = '';

        // Remove event listeners
        modal.removeEventListener('keydown', handleKeyDown);
        backdrop.removeEventListener('click', hideModal);
    }, 300);
}

function handleKeyDown(event) {
    if (event.key === 'Escape') {
        event.preventDefault();
        hideModal();
    }
}

// Update button untuk memanggil modal
document.querySelector('button[onclick*="loginModal"]').setAttribute('onclick', 'showModal()');
// End Modal Login di rent-detail.blade.php

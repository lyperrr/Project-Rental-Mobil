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
                        'bg-shark-950/50',
                        'backdrop-blur-md',
                        'transition-background-color'
                    );
                } else {
                    // Menghapus kelas fixed saat scroll ke atas
                    header.classList.remove(
                        'shadow-lg', 
                        'bg-shark-950/50', 
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



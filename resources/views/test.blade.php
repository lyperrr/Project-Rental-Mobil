<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixed Logout Modal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        shark: {
                            50: '#f8f9fa',
                            200: '#e9ecef',
                            400: '#6c757d',
                            500: '#495057',
                            600: '#343a40',
                            700: '#212529',
                            900: '#1a1d21'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom styles for better mobile compatibility */
        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(26, 29, 33, 0.5);
            z-index: 9999; /* Higher z-index */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            box-sizing: border-box;
        }
        
        .modal-content {
            max-width: 400px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        /* Ensure modal works on all screen sizes */
        @media (max-width: 640px) {
            .modal-content {
                max-width: 95vw;
                margin: 0 auto;
            }
        }
        
        /* Animation classes */
        .modal-hidden {
            opacity: 0;
            visibility: hidden;
            transform: scale(0.95);
            transition: all 0.3s ease;
        }
        
        .modal-visible {
            opacity: 1;
            visibility: visible;
            transform: scale(1);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100 p-8">
    <!-- Test Button -->
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">Test Logout Modal</h1>
        <p class="mb-4">Click the logout button below to test the modal</p>
        
        <!-- Logout Form -->
        <form action="#" method="POST" id="logoutForm" class="inline">
            <button type="submit"
                class="inline-flex items-center size-10 p-4 justify-center bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors"
                onclick="return confirmLogout(event)">
                <i class="bx bx-log-out text-2xl"></i>
            </button>
        </form>
    </div>

    <!-- Logout Confirmation Modal -->
    <div id="logoutModal" class="modal-backdrop modal-hidden">
        <div class="modal-content bg-white rounded-xl shadow-xl transform">
            <div class="sticky top-0 bg-white z-10 rounded-t-xl">
                <div class="flex justify-between items-center p-6 py-4 border-b border-shark-200">
                    <div class="inline-flex items-center text-shark-900">
                        <i class="bx bx-log-out mr-2 text-3xl"></i>
                        <h3 class="text-xl font-semibold">Confirm Logout</h3>
                    </div>
                    <button onclick="closeLogoutModal()"
                        class="cursor-pointer flex items-center justify-center text-shark-400 hover:text-shark-600 transition-all duration-150 hover:rotate-90">
                        <i class="bx bx-x text-3xl"></i>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <p class="text-shark-700 text-center text-base">
                    Are you sure you want to log out?
                </p>
                <div class="mt-6 flex flex-col sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-3">
                    <button type="button" onclick="closeLogoutModal()"
                        class="w-full sm:w-auto px-4 py-2 border border-shark-200 rounded-md text-sm font-medium text-shark-700 bg-white hover:bg-shark-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-shark-500">
                        Cancel
                    </button>
                    <button type="button" onclick="submitLogout()"
                        class="w-full sm:w-auto btn-loading px-4 py-2 bg-red-600 text-white font-semibold rounded flex items-center justify-center gap-2 relative hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <svg class="loading-spinner hidden animate-spin h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span class="button-text">Log Out</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Improved JavaScript with better mobile support
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing logout modal...');
            
            // Ensure modal exists
            const modal = document.getElementById('logoutModal');
            if (!modal) {
                console.error('Logout modal not found!');
                return;
            }

            // Open modal function
            window.confirmLogout = function(event) {
                console.log('confirmLogout triggered');
                event.preventDefault();
                event.stopPropagation();
                
                const modal = document.getElementById('logoutModal');
                if (modal) {
                    // Remove hidden class and add visible class
                    modal.classList.remove('modal-hidden');
                    modal.classList.add('modal-visible');
                    
                    // Prevent body scroll on mobile
                    document.body.style.overflow = 'hidden';
                    
                    console.log('Modal should be visible now');
                } else {
                    console.error('Modal element not found');
                }
                return false;
            };

            // Close modal function
            window.closeLogoutModal = function() {
                console.log('closeLogoutModal triggered');
                const modal = document.getElementById('logoutModal');
                if (modal) {
                    modal.classList.remove('modal-visible');
                    modal.classList.add('modal-hidden');
                    
                    // Restore body scroll
                    document.body.style.overflow = '';
                }
            };

            // Submit logout form
            window.submitLogout = function() {
                console.log('submitLogout triggered');
                const form = document.getElementById('logoutForm');
                const submitBtn = document.querySelector('#logoutModal button[onclick="submitLogout()"]');
                const submitSpinner = submitBtn?.querySelector('.loading-spinner');

                if (form && submitBtn && submitSpinner) {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('cursor-not-allowed', 'opacity-75');
                    submitSpinner.classList.remove('hidden');
                    
                    // For demo purposes, just show alert
                    setTimeout(() => {
                        alert('Logout form would be submitted here');
                        submitBtn.disabled = false;
                        submitBtn.classList.remove('cursor-not-allowed', 'opacity-75');
                        submitSpinner.classList.add('hidden');
                        closeLogoutModal();
                    }, 2000);
                    
                    // Uncomment this for actual form submission
                    // form.submit();
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

            // Close modal when clicking backdrop
            modal.addEventListener('click', function(event) {
                if (event.target === this) {
                    closeLogoutModal();
                }
            });

            // Prevent modal content clicks from closing modal
            const modalContent = modal.querySelector('.modal-content');
            if (modalContent) {
                modalContent.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            }

            console.log('Logout modal initialized successfully');
        });

        // Touch event handling for better mobile support
        document.addEventListener('touchstart', function() {
            // This ensures touch events are properly handled
        }, { passive: true });
    </script>
</body>
</html>
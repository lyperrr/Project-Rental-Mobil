    <!-- Logout Confirmation Modal -->
    <div id="logoutModal"
        class="fixed inset-0 bg-shark-900/50 hidden z-50 transition-opacity duration-300 h-screen">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div
                class="bg-white rounded-xl overflow-auto shadow-xl max-w-md w-full transform transition-all duration-300 relative">
                <div class="sticky top-0 bg-white z-10">
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
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="closeLogoutModal()"
                            class="px-4 py-2 border cursor-pointer border-shark-200 rounded-md text-sm font-medium text-shark-700 bg-white hover:bg-shark-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-shark-500">
                            Cancel
                        </button>
                        <button type="button" onclick="submitLogout()"
                            class="btn-loading px-4 py-2 cursor-pointer bg-red-600 text-white font-semibold rounded flex items-center justify-center gap-2 relative hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
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
    </div>

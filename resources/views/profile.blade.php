<x-layout>
    <x-navbar />
    <x-slot:title>{{ $title }}</x-slot>


    <!-- Header Section -->
    <section
        class="relative h-[60vh] flex items-center justify-center mb-4 overflow-hidden text-white text-center group">
        <img class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-105 transition-transform duration-300"
            src="{{ asset('img/banner.png') }}" alt="Banner Background">
        <h1 class="z-10 text-3xl font-bold lg:text-5xl">
            Welcome, <span class="text-orange-100 block">{{ $user->username }}</span>
        </h1>
    </section>


    <div class="py-10">
        <div class="container">
            <div class="">
                <!-- Profile Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Left Column - Personal Info & Documents -->
                    <div class="space-y-6">
                        <!-- Profile Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-shark-100 overflow-hidden">
                            <div class="px-6 py-5 border-b border-shark-100">
                                <h2 class="text-lg font-semibold text-shark-900 flex items-center">
                                    <i class="bx bxs-user-account text-orange-100 text-2xl mr-2"></i> Profile Photo
                                </h2>
                            </div>
                            <div class="p-6">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="relative w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-orange-100 shadow-md mb-4">
                                        @if ($userProfile && $userProfile->photo_profile)
                                            <img src="{{ $userProfile->photo_profile }}" alt="Profile"
                                                class="w-full h-full object-cover">
                                        @else
                                            <div
                                                class="w-full h-full flex items-center justify-center">
                                                <img src="{{ asset('img/profile.jpeg') }}" alt="{{ $user->username }}" title="{{ $user->username }}">
                                            </div>
                                        @endif
                                    </div>
                                    <h3 class="text-lg font-medium text-shark-900">{{ $user->username }}</h3>
                                    <span
                                        class="inline-block px-3 py-1 mt-2 text-white text-xs font-medium rounded-full capitalize bg-orange-100">
                                        {{ $user->role }}
                                    </span>

                                    {{-- Actions Button --}}
                                    <div class="space-x-2 mt-4">
                                        <button onclick="openEditModal()"
                                            class="inline-flex cursor-pointer items-center size-10 p-4 justify-center bg-orange-600 border border-transparent rounded-md font-semibold text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors">
                                            <i class="bx bx-edit text-2xl"></i>
                                        </button>
                                        <!-- Logout Form -->
                                        <form action="{{ route('logout') }}" method="POST" id="logoutForm"
                                            class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="inline-flex cursor-pointer items-center size-10 p-4 justify-center bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors"
                                                onclick="return confirmLogout(event)">
                                                <i class="bx bx-log-out text-2xl"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-shark-100 overflow-hidden">
                            <div class="px-6 py-5 border-b border-shark-100">
                                <h2 class="text-lg font-semibold text-shark-900 flex items-center">
                                    <i class="bx bx-line-chart text-orange-100 text-2xl mr-2"></i> Rental Statistics
                                </h2>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-orange-50 rounded-md p-3">
                                            <i class="bx bx-group text-2xl text-orange-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-shark-500">Total Rentals</p>
                                            <p class="text-lg font-semibold text-shark-900">{{ $totalRents }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-orange-50 rounded-md p-3">
                                            <i class="bx bx-wallet text-2xl text-orange-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-shark-500">Total Spent</p>
                                            <p class="text-lg font-semibold text-shark-900">Rp.
                                                {{ number_format($totalSpent, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-orange-50 rounded-md p-3">
                                            <i class="bx bx-calendar-check text-2xl text-orange-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-shark-500">Member Since</p>
                                            <p class="text-lg font-semibold text-shark-900">
                                                {{ $user->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Profile & Stats -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Personal Info Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-shark-100 overflow-hidden">
                            <div
                                class="px-6 py-5 border-b border-shark-100 flex items-center justify-between flex-wrap">
                                <h2 class="text-lg font-semibold text-shark-900 inline-flex items-center">
                                    <i class="bx bxs-user-detail text-orange-100 mr-2 text-2xl"></i>Personal Information
                                </h2>

                                <div class="flex items-center space-x-2">
                                    <span class="text-sm text-shark-500">Account Status:</span>
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-medium {{ $user->is_verified ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-white' }}">
                                        {{ $user->is_verified ? 'Verified' : 'Pending Verification' }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-shark-500 flex items-center">
                                            <i class="bx bx-user text-xl mr-2"></i> Username
                                        </label>
                                        <p class="text-shark-900 font-medium">
                                            {{ $user->username ?? 'Not set' }}</p>
                                    </div>
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-shark-500 flex items-center">
                                            <i class="bx bx-user-pin text-xl mr-2"></i> Full Name
                                        </label>
                                        <p class="text-shark-900">{{ $userProfile->full_name ?? 'Not set' }}</p>
                                    </div>
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-shark-500 flex items-center">
                                            <i class="bx bx-envelope text-xl mr-2"></i> Email
                                        </label>
                                        <p class="text-shark-900">{{ $user->email ?? 'Not set' }}</p>
                                    </div>
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-shark-500 flex items-center">
                                            <i class="bx bx-phone text-xl mr-2"></i> Phone
                                        </label>
                                        <p class="text-shark-900">{{ $userProfile->phone ?? 'Not set' }}</p>
                                    </div>
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-shark-500 flex items-center">
                                            <i class="bx bx-id-card text-xl mr-2"></i> KTP Number
                                        </label>
                                        <p class="text-shark-900">{{ $userProfile->ktp_number ?? 'Not set' }}</p>
                                    </div>
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-shark-500 flex items-center">
                                            <i class="bx bxs-id-card text-xl mr-2"></i> SIM Number
                                        </label>
                                        <p class="text-shark-900">{{ $userProfile->sim_number ?? 'Not set' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Documents Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-shark-100 overflow-hidden">
                            <div class="px-6 py-5 border-b border-shark-100">
                                <h2 class="text-lg font-semibold text-shark-900 flex items-center">
                                    <i class="bx bx-folder text-orange-100 text-2xl mr-2"></i> Documents
                                </h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- KTP Card -->
                                    <div class="border border-shark-200 rounded-lg overflow-hidden">
                                        <div class="bg-shark-50 px-4 py-3 border-b border-shark-200">
                                            <h3 class="text-sm font-medium text-shark-700 flex items-center">
                                                <i class="bx bx-id-card text-xl mr-2"></i> KTP Document
                                            </h3>
                                        </div>
                                        <div class="p-4 group">
                                            @if ($userProfile && $userProfile->ktp_image)
                                                <div class="relative pb-[75%] bg-shark-100 rounded overflow-hidden">
                                                    <img src="{{ $userProfile->ktp_image }}" alt="KTP"
                                                        class="absolute h-full w-full object-contain group-hover:scale-105 transition-all duration-150 ease-linear">
                                                </div>
                                            @else
                                                <div class="py-8 text-center">
                                                    <i class="bx bx-id-card text-6xl text-shark-300"></i>
                                                    <p class="mt-2 text-sm text-shark-500">No KTP document uploaded</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- SIM Card -->
                                    <div class="border border-shark-200 rounded-lg overflow-hidden">
                                        <div class="bg-shark-50 px-4 py-3 border-b border-shark-200">
                                            <h3 class="text-sm font-medium text-shark-700 flex items-center">
                                                <i class="bx bxs-id-card text-xl mr-2"></i> SIM Document
                                            </h3>
                                        </div>
                                        <div class="p-4 group">
                                            @if ($userProfile && $userProfile->sim_image)
                                                <div class="relative pb-[75%] bg-shark-100 rounded overflow-hidden">
                                                    <img src="{{ $userProfile->sim_image }}" alt="SIM"
                                                        class="absolute h-full w-full object-contain group-hover:scale-105 transition-all duration-150 ease-linear">
                                                </div>
                                            @else
                                                <div class="py-8 text-center">
                                                    <i class="bx bxs-id-card text-6xl text-shark-300"></i>
                                                    <p class="mt-2 text-sm text-shark-500">No SIM document uploaded</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div id="editModal"
        class="fixed inset-0 bg-shark-900/20 hidden z-50 transition-opacity duration-300 backdrop-blur-sm">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div
                class="bg-white rounded-xl overflow-auto shadow-xl max-w-3xl w-full max-h-[90vh] transform transition-all duration-300 relative">
                <div class="sticky top-0 bg-white z-10">
                    <div class="flex justify-between items-center p-6 py-4 border-b border-shark-200">
                        <div class="inline-flex items-center text-shark-900">
                            <i class="bx bx-edit mr-2 text-3xl"></i>
                            <h3 class="text-xl font-semibold">Edit Profile Information</h3>
                        </div>
                        <button onclick="closeEditModal()"
                            class="cursor-pointer flex items-center justify-center text-shark-400 hover:text-shark-600 transition-all duration-150 hover:rotate-90">
                            <i class="bx bx-x text-3xl"></i>
                        </button>
                    </div>
                </div>

                <form id="editForm" class="p-6" action="{{ route('profile.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Username -->
                            <div>
                                <label class="block text-sm font-medium text-shark-700 mb-1">Username</label>
                                <div class="relative">
                                    <i
                                        class="bx bx-user absolute left-3 top-1/2 transform -translate-y-1/2 text-shark-400 text-xl"></i>
                                    <input type="text" name="username" value="{{ $user->username }}" required
                                        class="w-full pl-10 pr-3 py-2 border border-shark-200 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                </div>
                            </div>
                            <!-- Full Name -->
                            <div>
                                <label class="block text-sm font-medium text-shark-700 mb-1">Full Name</label>
                                <div class="relative">
                                    <i
                                        class="bx bx-user-pin absolute left-3 top-1/2 transform -translate-y-1/2 text-shark-400 text-xl"></i>
                                    <input type="text" name="full_name"
                                        value="{{ $userProfile->full_name ?? '' }}"
                                        class="w-full pl-10 pr-3 py-2 border border-shark-200 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                </div>
                            </div>
                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium text-shark-700 mb-1">Email</label>
                                <div class="relative">
                                    <i
                                        class="bx bx-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-shark-400 text-xl"></i>
                                    <input type="email" name="email" value="{{ $user->email }}" required
                                        class="w-full pl-10 pr-3 py-2 border border-shark-200 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                </div>
                            </div>
                            <!-- Phone -->
                            <div>
                                <label class="block text-sm font-medium text-shark-700 mb-1">Phone</label>
                                <div class="relative">
                                    <i
                                        class="bx bx-phone absolute left-3 top-1/2 transform -translate-y-1/2 text-shark-400 text-xl"></i>
                                    <input type="number" name="phone" value="{{ $userProfile->phone ?? '' }}"
                                        class="w-full pl-10 pr-3 py-2 border border-shark-200 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                </div>
                            </div>
                            <!-- KTP Number -->
                            <div>
                                <label class="block text-sm font-medium text-shark-700 mb-1">KTP Number</label>
                                <div class="relative">
                                    <i
                                        class="bx bx-id-card absolute left-3 top-1/2 transform -translate-y-1/2 text-shark-400 text-xl"></i>
                                    <input type="number" name="ktp_number"
                                        value="{{ $userProfile->ktp_number ?? '' }}"
                                        class="w-full pl-10 pr-3 py-2 border border-shark-200 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                </div>
                            </div>
                            <!-- SIM Number -->
                            <div>
                                <label class="block text-sm font-medium text-shark-700 mb-1">SIM Number</label>
                                <div class="relative">
                                    <i
                                        class="bx bxs-id-card absolute left-3 top-1/2 transform -translate-y-1/2 text-shark-400 text-xl"></i>
                                    <input type="number" name="sim_number"
                                        value="{{ $userProfile->sim_number ?? '' }}"
                                        class="w-full pl-10 pr-3 py-2 border border-shark-200 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                </div>
                            </div>
                        </div>

                        <!-- Upload Fields -->
                        <div class="space-y-4">
                            <div class="inline-flex items-center">
                                <i class="bx bx-upload mr-2 text-2xl"></i>
                                <h4 class="text-sm font-medium text-shark-700">Upload Files (Max 2MB each)</h4>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Profile Photo Upload -->
                                <div>
                                    <label class="block text-sm font-medium text-shark-700 mb-1">Profile Photo</label>
                                    <div
                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 items-center border-2 border-shark-200 border-dashed rounded-md hover:border-orange-500 transition-all duration-150 ease-linear">
                                        <div class="space-y-1 text-center">
                                            <i class="bx bx-image-add text-6xl text-shark-300"></i>
                                            <div class="flex text-sm text-shark-600">
                                                <label
                                                    class="relative cursor-pointer bg-white rounded-md font-medium text-orange-600 hover:text-orange-700 focus-within:outline-none">
                                                    <span>Upload a file</span>
                                                    <input type="file" name="photo_profile" id="photo_profile"
                                                        accept="image/*" class="sr-only">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="photo_profile_preview" class="mt-2 hidden">
                                        <img src="" alt="Profile Photo Preview"
                                            class="max-w-[200px] max-h-[200px] object-contain mx-auto rounded-full border border-shark-200">
                                    </div>
                                </div>
                                <!-- KTP Image Upload -->
                                <div>
                                    <label class="block text-sm font-medium text-shark-700 mb-1">KTP Image</label>
                                    <div
                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 items-center border-2 border-shark-200 border-dashed rounded-md hover:border-orange-500 transition-all duration-150 ease-linear">
                                        <div class="space-y-1 text-center">
                                            <i class="bx bx-id-card text-6xl text-shark-300"></i>
                                            <div class="flex text-sm text-shark-600">
                                                <label
                                                    class="relative cursor-pointer bg-white rounded-md font-medium text-orange-600 hover:text-orange-700 focus-within:outline-none">
                                                    <span>Upload a file</span>
                                                    <input type="file" name="ktp_image" id="ktp_image"
                                                        accept="image/*" class="sr-only">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ktp_image_preview" class="mt-2 hidden">
                                        <img src="" alt="KTP Image Preview"
                                            class="w-full max-h-[200px] object-contain rounded-md border border-shark-200">
                                    </div>
                                </div>
                                <!-- SIM Image Upload -->
                                <div>
                                    <label class="block text-sm font-medium text-shark-700 mb-1">SIM Image</label>
                                    <div
                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 items-center border-2 border-shark-200 border-dashed rounded-md hover:border-orange-500 transition-all duration-150 ease-linear">
                                        <div class="space-y-1 text-center">
                                            <i class="bx bxs-id-card text-6xl text-shark-300"></i>
                                            <div class="flex text-sm text-shark-600">
                                                <label
                                                    class="relative cursor-pointer bg-white rounded-md font-medium text-orange-600 hover:text-orange-700 focus-within:outline-none">
                                                    <span>Upload a file</span>
                                                    <input type="file" name="sim_image" id="sim_image"
                                                        accept="image/*" class="sr-only">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="sim_image_preview" class="mt-2 hidden">
                                        <img src="" alt="SIM Image Preview"
                                            class="w-full max-h-[200px] object-contain rounded-md border border-shark-200">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="mt-8 flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()"
                            class="px-4 py-2 border border-red-500 rounded-md text-sm font-medium text-red-500 bg-white hover:bg-shark-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
                            Cancel
                        </button>
                        <button type="submit"
                            class="btn-loading px-4 py-2 bg-orange-600 text-white font-semibold rounded flex items-center justify-center gap-2 relative hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                            <svg class="loading-spinner hidden animate-spin h-5 w-5 text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span class="button-text">Save Changes</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <x-LogoutModalConfirmation />

    <!-- SUCCESS NOTIFICATION -->
    @if (session('success'))
        <div id="successNotification"
            class="fixed z-50 w-[90%] md:w-[350px] bg-green-50 border-l-4 border-green-500 rounded-lg shadow-lg p-4 transition-all duration-300 ease-in-out opacity-0 translate-y-full md:translate-y-0 md:translate-x-full left-1/2 md:left-auto md:right-4 top-20 md:top-18 transform -translate-x-1/2 md:translate-x-0">
            <div class="flex items-center">
                <i class="bx bx-check-circle text-2xl text-green-500 mr-2 mt-0.5"></i>
                <div class="flex-1 text-sm text-green-700">
                    {{ session('success') }}
                </div>
                <button onclick="closeNotification('successNotification')"
                    class="text-green-500 hover:text-green-700 ml-2">
                    <i class="bx bx-x text-xl"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- ERROR NOTIFICATION -->
    @if ($errors->any())
        <div id="errorNotification"
            class="fixed z-50 w-[90%] md:w-[350px] bg-red-50 border-l-4 border-red-500 rounded-lg shadow-lg p-4 transition-all duration-300 ease-in-out opacity-0 translate-y-full md:translate-y-0 md:translate-x-full left-1/2 md:left-auto md:right-4 top-20 md:top-18 transform -translate-x-1/2 md:translate-x-0">
            <div class="flex items-center flex-1">
                <i class="bx bx-error-circle text-2xl text-red-500 mr-2 mt-0.5"></i>
                <div class="flex items-center text-sm text-red-700">
                    <p class="font-semibold mb-1">There were {{ $errors->count() }} errors with your
                        submission</p>
                    <ul class="list-disc ml-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button onclick="closeNotification('errorNotification')" class="text-red-500 hover:text-red-700 ml-2">
                    <i class="bx bx-x text-xl"></i>
                </button>
            </div>
        </div>
    @endif
</x-layout>

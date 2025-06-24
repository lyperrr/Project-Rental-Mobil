<header class="w-full fixed transition-all duration-500 ease-linear text-white z-50">
    <div class="relative py-4 sm:py-3 lg:py-2 xl:py-1">
        <div class="container flex items-center justify-between">
            <div class="flex items-center justify-between w-full relative z-50 lg:w-auto">
                {{-- Logo --}}
                <a href="/" class="w-fit flex items-center">
                    <img class="w-20 sm:w-25 object-contain lg:w-25 xl:w-30" src="{{ asset('img/logo.png') }}"
                        alt="">
                </a>

                <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
                    {{-- Ganti Bahasa --}}
                    <div class="relative language-dropdown text-shark-950">
                        <button id="langButtonMobile"
                            class="lang-button rounded-full border border-orange-200 focus:outline-none cursor-pointer w-8 h-8 sm:w-12 sm:h-12 flex items-center justify-center bg-white shadow">
                            <img id="selectedFlagMobile"
                                src="{{ asset(App::getLocale() == 'id' ? 'img/flag/indonesia.png' : 'img/flag/britain.png') }}"
                                alt="{{ App::getLocale() == 'id' ? 'Indonesia' : 'English' }}"
                                title="{{ App::getLocale() == 'id' ? 'Indonesia' : 'English' }}"
                                class="selected-flag object-cover">
                        </button>

                        <div id="dropdownMenuMobile"
                            class="dropdown-menu absolute mt-2 left-1/2 space-y-2 -translate-x-1/2 w-full min-w-max bg-white border border-gray-200 rounded-lg shadow-lg hidden transform scale-95 opacity-0 transition-all duration-200 ease-in-out origin-top overflow-hidden sm:text-xl">
                            <button data-url="{{ url('locale/en') }}"
                                class="flex items-center w-full px-2 pt-2 hover:bg-gray-100 transition-colors duration-150 language-option"
                                data-flag="{{ asset('img/flag/britain.png') }}" data-lang="English">
                                <img src="{{ asset('img/flag/britain.png') }}" alt="English"
                                    class="w-6 h-6 sm:w-10 sm:h-10 object-cover mr-2">
                                English
                            </button>
                            <button data-url="{{ url('locale/id') }}"
                                class="flex items-center w-full px-2 pb-2 hover:bg-gray-100 transition-colors duration-150 language-option"
                                data-flag="{{ asset('img/flag/indonesia.png') }}" data-lang="Indonesia">
                                <img src="{{ asset('img/flag/indonesia.png') }}" alt="Indonesia"
                                    class="w-6 h-6 sm:w-10 sm:h-10 object-cover mr-2">
                                Indonesia
                            </button>
                        </div>
                    </div>

                    {{-- Hamburger Menu --}}
                    <button id="hamburger"
                        class="focus:border-orange-200 border-2 p-1 rounded-md border-transparent flex items-center justify-center">
                        <i id="hamburger-icon"
                            class='bx bx-menu text-3xl sm:text-5xl transition-all duration-300 ease-linear'></i>
                    </button>
                </div>
            </div>

            {{-- Navbar --}}
            <nav id="navbar"
                class="absolute p-4 pt-20 shadow-lg bg-white top-0 left-0 w-full rounded-b-2xl transition-all duration-500 ease-in-out lg:absolute lg:top-auto lg:translate-x-1/2 lg:right-1/2 lg:w-auto lg:bg-transparent lg:rounded-none lg:p-0 lg:shadow-none lg:flex lg:items-center lg:justify-center -translate-y-full lg:translate-y-0">
                <ul
                    class="font-medium text-xl sm:text-3xl lg:text-base space-y-2 sm:space-y-5 lg:space-y-0 lg:flex lg:gap-6 lg:items-center">
                    <x-nav-link href="/" icon="home">
                        {{ __('messages.navbar.home') }}
                    </x-nav-link>
                    <x-nav-link href="about" icon="info-circle">
                        {{ __('messages.navbar.about') }}
                    </x-nav-link>
                    <x-nav-link href="rent" icon="car">
                        {{ __('messages.navbar.rent') }}
                    </x-nav-link>
                    <x-nav-link href="blog" icon="news">
                        {{ __('messages.navbar.blog') }}
                    </x-nav-link>
                    <x-nav-link href="contact" icon="phone">
                        {{ __('messages.navbar.contact') }}
                    </x-nav-link>
                </ul>
                <div class="w-auto p-4 sm:mx-auto lg:hidden">
                    {{-- Profile Photo or Login/Signup --}}
                    @if (Auth::check())
                        <a href="{{ route('profile') }}" class="flex items-center gap-2">
                            @if ($userProfile && $userProfile->photo_profile)
                                <img src="{{ $userProfile->photo_profile }}"
                                    alt="{{ Auth::user()->username }}'s Profile" title="{{ Auth::user()->username }}"
                                    class="w-15 h-15 sm:w-20 sm:h-20 rounded-full border border-orange-200 object-cover hover:border-orange-100 transition-all duration-200 sm:mx-auto">
                                <span class="text-shark-950 text-2xl font-medium">{{ Auth::user()->username }}</span>
                            @else
                                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full sm:mx-auto border border-orange-200 bg-shark-100 flex items-center justify-center text-shark-400 hover:border-orange-100 transition-all duration-200"
                                    title="{{ Auth::user()->username }}">
                                    <i class="bx bx-user text-2xl sm:text-4xl"></i>
                                </div>
                            @endif
                        </a>
                    @else
                        <div class="mt-4 flex items-center gap-4 w-full sm:w-[70%] sm:mx-auto sm:gap-5">
                            <a href="{{ route('login') }}"
                                class="btn-primary flex justify-center items-center w-full lg:w-auto sm:py-4 sm:text-2xl">
                                {{ __('messages.button.login') }}
                            </a>
                            <a href="{{ route('signup') }}"
                                class="btn-outline flex justify-center text-shark-950 items-center w-full lg:w-auto sm:py-4 sm:text-2xl">
                                {{ __('messages.button.signup') }}
                            </a>
                        </div>
                    @endif
                </div>
            </nav>

            <div class="hidden lg:block">
                <div class="flex items-center gap-4 lg:gap-2 lg:w-auto justify-end">
                    {{-- Ganti Bahasa --}}
                    <div class="relative language-dropdown text-shark-950">
                        <button id="langButtonDesktop"
                            class="lang-button rounded-full border border-orange-200 focus:outline-none cursor-pointer w-8 h-8 sm:w-8 sm:h-8 flex items-center justify-center bg-white shadow">
                            <img id="selectedFlagDesktop"
                                src="{{ asset(App::getLocale() == 'id' ? 'img/flag/indonesia.png' : 'img/flag/britain.png') }}"
                                alt="{{ App::getLocale() == 'id' ? 'Indonesia' : 'English' }}"
                                title="{{ App::getLocale() == 'id' ? 'Indonesia' : 'English' }}"
                                class="selected-flag object-cover">
                        </button>

                        <div id="dropdownMenuDesktop"
                            class="dropdown-menu absolute mt-2 left-1/2 space-y-2 -translate-x-1/2 w-full min-w-max bg-white border border-gray-200 rounded-lg shadow-lg hidden transform scale-95 opacity-0 transition-all duration-200 ease-in-out origin-top overflow-hidden sm:text-xl">
                            <button data-url="{{ url('locale/en') }}"
                                class="flex items-center w-full px-2 pt-2 hover:bg-gray-100 transition-colors duration-150 language-option sm:text-base"
                                data-flag="{{ asset('img/flag/britain.png') }}" data-lang="English">
                                <img src="{{ asset('img/flag/britain.png') }}" alt="English"
                                    class="w-6 h-6 sm:w-6 sm:h-6 object-cover mr-2">
                                English
                            </button>
                            <button data-url="{{ url('locale/id') }}"
                                class="flex items-center w-full px-2 pb-2 hover:bg-gray-100 transition-colors duration-150 language-option sm:text-base"
                                data-flag="{{ asset('img/flag/indonesia.png') }}" data-lang="Indonesia">
                                <img src="{{ asset('img/flag/indonesia.png') }}" alt="Indonesia"
                                    class="w-6 h-6 sm:w-6 sm:h-6 object-cover mr-2">
                                Indonesia
                            </button>
                        </div>
                    </div>

                    {{-- Profile Photo or Login/Signup --}}
                    @if (Auth::check())
                        <div class="relative">
                            <!-- Profile Button -->
                            <button type="button" id="profileButton" class="flex items-center justify-center cursor-pointer">
                                @if ($userProfile && $userProfile->photo_profile)
                                    <img src="{{ $userProfile->photo_profile }}"
                                        alt="{{ Auth::user()->username }}'s Profile"
                                        title="{{ Auth::user()->username }}"
                                        class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border border-orange-200 object-cover hover:border-orange-100 transition-all duration-200">
                                @else
                                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border border-orange-200 bg-shark-100 flex items-center justify-center text-shark-400 hover:border-orange-100 transition-all duration-200"
                                        title="{{ Auth::user()->username }}">
                                        <i class="bx bx-user text-2xl sm:text-4xl"></i>
                                    </div>
                                @endif
                            </button>

                            <!-- Profile Popup -->
                            <div id="profilePopup"
                                class="hidden fixed z-50 right-10 top-16 sm:top-20 w-64 bg-white rounded-xl shadow-xl transform transition-all duration-300">
                                <div class="p-2 border-b border-shark-200">
                                    <div class="flex items-center space-x-2">
                                        @if ($userProfile && $userProfile->photo_profile)
                                            <img src="{{ $userProfile->photo_profile }}"
                                                alt="{{ Auth::user()->username }}'s Profile"
                                                class="w-12 h-12 rounded-full border border-orange-200 object-cover">
                                        @else
                                            <div
                                                class="w-12 h-12 rounded-full border border-orange-200 bg-shark-100 flex items-center justify-center text-shark-400">
                                                <i class="bx bx-user text-3xl"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="text-shark-900 font-semibold text-base">
                                                {{ Auth::user()->username }}</h4>
                                            <p class="text-shark-500 text-sm">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 space-y-2">
                                    <a href="/profile"
                                        class="p-2 flex items-center gap-2 text-shark-700 hover:text-shark-950 hover:bg-shark-50 rounded-md text-sm font-medium transition-all duration-150">
                                        <i class="bx bx-user text-xl"></i>
                                        View Profile
                                    </a>
                                    <!-- Logout Form -->
                                    <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center cursor-pointer gap-2 w-full p-2 justify-center bg-red-600 border border-transparent rounded-md font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors"
                                            onclick="return confirmLogout(event)">
                                            <i class="bx bx-log-out text-xl"></i>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Logout Modal (unchanged) -->
                            <x-LogoutModalConfirmation />
                        </div>

                    @else
                        <a href="{{ route('login') }}"
                            class="btn-primary flex justify-center items-center text-base">
                            {{ __('messages.button.login') }}
                        </a>
                        <a href="{{ route('signup') }}"
                            class="btn-outline flex justify-center items-center border-white lg:block text-base hover:border-orange-100 hover:text-orange-100">
                            {{ __('messages.button.signup') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

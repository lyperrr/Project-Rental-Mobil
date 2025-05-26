    <header class="w-full fixed transition-all duration-500 ease-linear text-white z-50">
        <div class="relative py-4 sm:py-2">
            <div class="container flex items-center justify-between">
                <div class="flex items-center justify-between w-full relative z-50 lg:w-auto">
                    {{-- Logo --}}
                    <a href="/" class="w-fit flex items-center">
                            <img class="w-20 sm:w-25 object-contain xl:w-35" src="{{ asset('img/logo.png') }}" alt="">
                    </a>

                    <div class="flex items-center gap-2 lg:hidden">
                        {{-- Ganti Bahasa  --}}
                        <div class="relative language-dropdown text-shark-950">
                            <button id="langButton"
                                class="lang-button rounded-full border border-orange-200 focus:outline-none cursor-pointer w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-white shadow">
                                <img id="selectedFlag"
                                    src="{{ App::getLocale() == 'id' ? 'img/flag/indonesia.png' : 'img/flag/britain.png' }}"
                                    alt="{{ App::getLocale() == 'id' ? 'Indonesia' : 'English' }}"
                                    title="{{ App::getLocale() == 'id' ? 'Indonesia' : 'English' }}"
                                    class="selected-flag object-cover">
                            </button>

                            <div id="dropdownMenu"
                                class="dropdown-menu absolute mt-2 left-1/2 space-y-2 -translate-x-1/2 w-full min-w-max bg-white border border-gray-200 rounded-lg shadow-lg hidden transform scale-95 opacity-0 transition-all duration-200 ease-in-out origin-top overflow-hidden sm:text-xl">

                                <button data-url="{{ url('locale/en') }}"
                                    class="flex items-center w-full px-2 pt-2 hover:bg-gray-100 transition-colors duration-150 language-option"
                                    data-flag="img/flag/britain.png" data-lang="English">
                                    <img src="img/flag/britain.png" alt="English"
                                        class="w-6 h-6 sm:w-10 sm:h-10 object-cover mr-2"> English
                                </button>

                                <button data-url="{{ url('locale/id') }}"
                                    class="flex items-center w-full px-2 pb-2 hover:bg-gray-100 transition-colors duration-150 language-option"
                                    data-flag="img/flag/indonesia.png" data-lang="Indonesia">
                                    <img src="img/flag/indonesia.png" alt="Indonesia"
                                        class="w-6 h-6 sm:w-10 sm:h-10 object-cover mr-2"> Indonesia
                                </button>
                            </div>
                        </div>

                        {{-- Hamburger Menu --}}
                        <button id="hamburger"
                            class=" focus:border-orange-200 border-2 p-1 rounded-md border-transparent flex items-center justify-center">
                            <i id="hamburger-icon"
                                class='bx bx-menu text-3xl sm:text-5xl transition-all duration-300 ease-linear'></i>
                        </button>
                    </div>
                </div>

                {{-- Navbar --}}
                <nav id="navbar"
                    class="absolute p-4 pt-20 shadow-lg bg-white top-0 left-0 w-full rounded-b-2xl transition-all duration-500 ease-in-out lg:absolute lg:top-auto lg:translate-x-1/2 lg:right-1/2 lg:w-auto lg:bg-transparent lg:rounded-none lg:p-0 lg:shadow-none lg:flex lg:items-center lg:justify-center -translate-y-full lg:translate-0">
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
                    <div class="mt-4 flex items-center gap-4 lg:hidden w-full sm:w-[70%] sm:mx-auto sm:gap-5">
                        <a href="{{ route('login') }}"
                            class="btn-primary flex justify-center items-center w-full lg:w-auto sm:py-4 sm:text-xl">
                            {{ __('messages.button.login') }}
                        </a>
                        <a href="{{ route('signup') }}"
                            class="btn-outline flex justify-center text-shark-950 items-center w-full lg:w-auto sm:py-4 sm:text-xl">
                            {{ __('messages.button.signup') }}
                        </a>
                    </div>
                </nav>

                <div class="hidden lg:block">
                    <div class=" flex items-center gap-4 lg:gap-2 lg:w-auto justify-end">
                        {{-- Ganti Bahasa  --}}
                        <div class="relative language-dropdown text-shark-950">
                            <button id="langButton"
                                class="lang-button rounded-full border border-orange-200 focus:outline-none cursor-pointer w-8 h-8 sm:w-8 sm:h-8 flex items-center justify-center bg-white shadow">
                                <img id="selectedFlag"
                                    src="{{ App::getLocale() == 'id' ? 'img/flag/indonesia.png' : 'img/flag/britain.png' }}"
                                    alt="{{ App::getLocale() == 'id' ? 'Indonesia' : 'English' }}"
                                    title="{{ App::getLocale() == 'id' ? 'Indonesia' : 'English' }}"
                                    class="selected-flag object-cover">
                            </button>

                            <div id="dropdownMenu"
                                class="dropdown-menu absolute mt-2 left-1/2 space-y-2 -translate-x-1/2 w-full min-w-max bg-white border border-gray-200 rounded-lg shadow-lg hidden transform scale-95 opacity-0 transition-all duration-200 ease-in-out origin-top overflow-hidden sm:text-xl">

                                <button data-url="{{ url('locale/en') }}"
                                    class="flex items-center w-full px-2 pt-2 hover:bg-gray-100 transition-colors duration-150 language-option sm:text-base"
                                    data-flag="img/flag/britain.png" data-lang="English">
                                    <img src="img/flag/britain.png" alt="English"
                                        class="w-6 h-6 sm:w-6 sm:h-6 object-cover mr-2"> English
                                </button>

                                <button data-url="{{ url('locale/id') }}"
                                    class="flex items-center w-full px-2 pb-2 hover:bg-gray-100 transition-colors duration-150 language-option sm:text-base"
                                    data-flag="img/flag/indonesia.png" data-lang="Indonesia">
                                    <img src="img/flag/indonesia.png" alt="Indonesia"
                                        class="w-6 h-6 sm:w-6 sm:h-6 object-cover mr-2"> Indonesia
                                </button>
                            </div>
                        </div>


                        {{-- Login & Sign Up --}}
                        <a href="{{ route('login') }}" class="btn-primary flex justify-center items-center text-base">
                            {{ __('messages.button.login') }}
                        </a>
                        <a href="{{ route('signup') }}"
                            class="btn-outline flex justify-center items-center border-white lg:block text-base hover:border-orange-100 hover:text-orange-100">
                            {{ __('messages.button.signup') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

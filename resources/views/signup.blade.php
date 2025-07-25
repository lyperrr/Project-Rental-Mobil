<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="relative min-h-screen  py-12 container">
        <div
            class="flex w-full max-w-6xl mx-auto bg-white/10 backdrop-blur-2xl rounded-3xl shadow-2xl overflow-hidden border border-white/20">
            <!-- Left Side - Hero Section -->
            <div
                class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-orange-300 via-orange-100 to-orange-200 p-12 flex-col justify-between relative overflow-hidden">

                <div class="relative z-10">
                    <!-- Logo/Brand -->
                    <div class="flex items-center space-x-3 mb-16">
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <i class='bx bxs-bolt text-white text-3xl'></i>
                        </div>
                        <span
                            class="text-2xl font-bold text-white">{{ __('messages.sections.signup_page.left_desktop.badge') }}</span>
                    </div>

                    <!-- Hero Content -->
                    <div class="space-y-6">
                        <h1 class="text-4xl xl:text-5xl font-bold text-white leading-tight">
                            {{ __('messages.sections.signup_page.left_desktop.title') }}
                            <span class="bg-gradient-to-r from-yellow-300  to-yellow-200 bg-clip-text text-transparent">
                                {{ __('messages.sections.signup_page.left_desktop.subtitle') }}
                            </span>
                        </h1>
                        <p class="text-lg text-white/80 leading-relaxed">
                            {{ __('messages.sections.signup_page.left_desktop.paragraph') }}
                        </p>
                    </div>

                    <!-- Features -->
                    <div class="space-y-4 mt-12 text-white">
                        <div class="flex items-center space-x-3">
                            <div class="size-8 bg-white/20 rounded-full flex items-center justify-center">
                                <i class='bx bx-check text-xl'></i>
                            </div>
                            <p>{{ __('messages.sections.signup_page.left_desktop.list.list1') }}</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="size-8 bg-white/20 rounded-full flex items-center justify-center">
                                <i class='bx bx-check text-xl'></i>
                            </div>
                            <p>{{ __('messages.sections.signup_page.left_desktop.list.list2') }}</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="size-8 bg-white/20 rounded-full flex items-center justify-center">
                                <i class='bx bx-check text-xl'></i>
                            </div>
                            <p>{{ __('messages.sections.signup_page.left_desktop.list.list3') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Signup Form -->
            <div class="w-full lg:w-1/2 p-8 lg:p-12 flex items-center justify-center relative">
                {{-- Globe --}}
                <div class="absolute opacity-50 -z-10">
                    <img src="{{ asset('svg/globe.svg') }}" alt="">
                </div>
                <div class="w-full max-w-md space-y-8">
                    <!-- Form Header -->
                    <div class="text-center space-y-2">
                        <h2 class="text-3xl font-bold">{{ __('messages.sections.signup_page.title') }}</h2>
                        <p class="">{{ __('messages.sections.signup_page.subtitle') }}</p>
                    </div>

                    <!-- Signup Form -->
                    <form method="POST" action="{{ route('signup') }}" class="space-y-6">
                        @csrf

                        <!-- Name Field -->
                        <div class="space-y-2">
                            <label class="flex items-center gap-4">
                                <p for="username" class="text-sm font-medium sm:text-base">
                                    {{ __('messages.sections.signup_page.label.username') }}
                                </p>
                                @error('username')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </label>
                            <div class="relative">
                                <input id="username" name="username" type="text" autocomplete="username" required
                                    value="{{ old('username') }}"
                                    class="w-full pl-12 pr-4 py-4 bg-shark-100/80 border border-shark-950/20 rounded-2xl placeholder-shark-950/50 focus:outline-none focus:ring-2 focus:ring-orange-200 focus:border-transparent transition-all duration-300 hover:bg-shark-100/90"
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.username') }}">

                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class='bx bx-user text-2xl'></i>
                                </div>
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label class="flex items-center gap-4">
                                <p for="email" class="text-sm font-medium sm:text-base">
                                    {{ __('messages.sections.signup_page.label.email') }}
                                </p>
                                @error('email')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </label>
                            <div class="relative">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    value="{{ old('email') }}"
                                    class="w-full pl-12 pr-4 py-4 bg-shark-100/80 border border-shark-950/20 rounded-2xl placeholder-shark-950/50 focus:outline-none focus:ring-2 focus:ring-orange-200 focus:border-transparent transition-all duration-300 hover:bg-shark-100/90"
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.email') }}">

                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class='bx bx-envelope text-2xl'></i>
                                </div>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label class="flex items-center gap-4">
                                <p for="password" class="text-sm font-medium sm:text-base">
                                    {{ __('messages.sections.signup_page.label.password') }}
                                </p>
                                @error('password')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </label>
                            <div class="relative">
                                <input id="password" name="password" type="password" autocomplete="new-password"
                                    required
                                    class="w-full pl-12 pr-12 py-4 bg-shark-100/80 border border-shark-950/20 rounded-2xl placeholder-shark-950/50 focus:outline-none focus:ring-2 focus:ring-orange-200 focus:border-transparent transition-all duration-300 hover:bg-shark-100/90"
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.password') }}">

                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class='bx bx-lock-alt text-2xl'></i>
                                </div>

                                <button type="button" onclick="togglePassword('password')"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-shark-950/50 hover:text-shark-950/70 transition-colors duration-200">
                                    <i id="password-icon" class='bx bx-hide text-2xl cursor-pointer'></i>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="space-y-2">
                            <label class="flex items-center gap-4">
                                <p for="password_confirmation" class="text-sm font-medium sm:text-base">
                                    {{ __('messages.sections.signup_page.label.confirm_password') }}
                                </p>
                                @error('password_confirmation')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </label>
                            <div class="relative">
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    autocomplete="new-password" required
                                    class="w-full pl-12 pr-12 py-4 bg-shark-100/80 border border-shark-950/20 rounded-2xl placeholder-shark-950/50 focus:outline-none focus:ring-2 focus:ring-orange-200 focus:border-transparent transition-all duration-300 hover:bg-shark-100/90"
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.confirm_password') }}">

                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class='bx bx-lock text-2xl'></i>
                                </div>

                                <button type="button" onclick="togglePassword('password_confirmation')"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-shark-950/50 hover:text-shark-950/70 transition-colors duration-200">
                                    <i id="password_confirmation-icon" class='bx bx-hide text-2xl cursor-pointer'></i>
                                </button>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="flex items-start space-x-3">
                            <input id="terms" name="terms" type="checkbox" required
                                class="h-4 w-4 mt-1 cursor-pointer text-orange-600 focus:ring-orange-500 border-white/30 rounded bg-white/10 backdrop-blur-sm accent-orange-300">
                            <label for="terms" class="text-sm sm:text-base cursor-pointer leading-relaxed">
                                {{ __('messages.sections.signup_page.agree_to') }}
                                <a href="#" class="text-purple-600 underline">
                                    {{ __('messages.sections.signup_page.terms_and_conditions') }}
                                </a>
                                {{ __('messages.sections.signup_page.and') }}
                                <a href="#" class="text-purple-600 underline">
                                    {{ __('messages.sections.signup_page.privacy_policy') }}
                                </a>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-primary w-full lg:text-xl py-2.5 shadow-sm">
                            {{ __('messages.button.signup') }}
                        </button>

                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-white/20"></div>
                            </div>
                            <div class="relative flex justify-center text-sm lg:text-base">
                                <span
                                    class="px-4 bg-transparent opacity-80">{{ __('messages.sections.signup_page.or_signup_with') }}</span>
                            </div>
                        </div>

                        <!-- Social Signup -->
                        <button type="button" onclick="window.location.href='{{ route('auth.google') }}'"
                            class="w-full flex items-center cursor-pointer justify-center px-4 py-4 border border-white/20 rounded-2xl shadow-sm bg-white/60 backdrop-blur-sm gap-2 font-medium transition-all duration-300 hover:bg-shark-100">
                            <img class="size-5" src="{{ asset('svg/google.svg') }}" alt="">
                            {{ __('messages.button.signup_with_google') }}
                        </button>
                    </form>

                    <!-- Login Link -->
                    <div class="text-center">
                        <p class="text-shark-950/70">
                            {{ __('messages.sections.signup_page.label.already_have_account') }}
                            <a href="{{ route('login') }}" class="">
                                <span class="underline font-medium  text-purple-600">
                                    {{ __('messages.button.login') }}
                                </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>

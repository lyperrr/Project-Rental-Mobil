<div class="bg-shark-950 h-screen fixed lg:w-[25%]">
    <nav class="px-4 py-4">
        <div class="flex items-center justify-between pb-2 border-b-2 border-shark-600">
            <div class="flex items-center gap-2">
                <a href="{{ route('profile') }}" class="flex items-center justify-center">
                    <img src="{{ asset('img/profile.jpeg') }}" alt="{{ Auth::user()->username }}'s Profile"
                        title="{{ Auth::user()->username }}"
                        class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border border-orange-200 object-cover hover:border-orange-100 transition-all duration-200">
                </a>
                @if (Auth::check())
                    <span class="text-white capitalize font-medium">{{ Auth::user()->username }}</span>
                @else
                    <span class="text-white">Guest <a href="{{ route('login') }}"
                            class="underline text-blue-400">{{ __('messages.button.login') }}</a></span>
                @endif
            </div>
            {{-- Logo --}}
            <a href="/dashboard" class="w-fit flex items-center">
                <img class="w-20 sm:w-15 object-contain lg:w-25 xl:w-20" src="{{ asset('img/logo.png') }}"
                    alt="">
            </a>
        </div>

        <div class="">
            <ul>
                <li>
                    <a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-600 text-white rounded-xl flex items-center gap-2 justify-center py-2 font-medium">
                        <i class='bx bx-exit text-xl'></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

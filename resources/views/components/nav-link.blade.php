<li class="overflow-hidden">
    <a {{ $attributes }}
        class="{{ request()->fullUrlIs(url($href)) ? 'bg-shark-50 sm:bg-transparent lg:bg-transparent text-orange-100' : 'hover:text-orange-100 text-shark-950 lg:text-white' }}  relative px-4 py-3 rounded-md transition-all duration-200 ease-linear lg:bg-transparent lg:p-0 group lg:rounded-none sm:justify-center flex items-center gap-1.5 sm:gap-2 lg:gap-0 sm:py-5">
        <span class="
        {{-- {{ $slot }}  --}}
        lg:hidden flex items-center justify-center">
            <i class='bx bx-{{ $icon }} text-[1.5rem] sm:text-4xl'></i>
        </span>
        <span
            class="inline-block transition-transform duration-300 lg:group-hover:-translate-y-full">{{ $slot }}</span>
        <span
            class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-100 transition-all duration-700 group-hover:w-full hidden lg:block"></span>
        <span
            class="absolute top-0 left-0 transition-transform duration-300 lg:translate-y-full group-hover:translate-y-0 hidden lg:block text-orange-100">{{ $slot }}</span>
    </a>
</li>

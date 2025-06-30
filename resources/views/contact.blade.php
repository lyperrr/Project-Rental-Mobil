<x-layout>
    {{-- Title --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-navbar />

    <section
        class="relative text-3xl font-bold text-center mb-4 flex items-center justify-center text-white h-[60vh] overflow-hidden group">
        <!-- Background dengan hover scale -->
        <div
            class="absolute inset-0 bg-hero-blog bg-cover bg-top transition-transform duration-700 ease-out group-hover:scale-110">
        </div>

        <!-- Teks yang tidak terpengaruh scale -->
        <h1 class="relative z-10">{{ __('messages.sections.contact_page.in_article.contact_us') }}</h1>
    </section>

    <section class="py-10">
        <div class="container">
            <article class="sm:text-center">
                <span class="badge">{{ __('messages.sections.contact_page.in_article.contact_us') }}</span>
                <h1 class="title">
                    {{ __('messages.sections.contact_page.in_article.get_in_touch') }}
                </h1>
                <p class="paragraph">
                    {{ __('messages.sections.contact_page.in_article.description') }}
                </p>
            </article>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-5">
                {{-- Left Side --}}
                <aside class="bg-white p-5 rounded-xl shadow-lg border border-white/20 ">
                    <div class="flex items-center">
                        <i class='bx bxs-contact text-3xl text-orange-200 mr-3'></i>
                        <h4 class="font-semibold text-2xl">{{ __('messages.sections.contact_page.left_side.contact_information') }}</h4>
                    </div>

                    <div class="">
                        <ul class="space-y-4 mt-4">
                            <li class="flex items-center space-x-4 group w-fit">
                                <div
                                    class="size-10 bg-gradient-to-r from-red-500 to-red-600 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                                    <i
                                        class='bx bxs-map text-xl text-white group-hover:animate-bounce transition-all duration-200 ease-linear'></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-shark-900">{{ __('messages.sections.contact_page.left_side.address') }}</h4>
                                    <p class="text-shark-600">{{ __('messages.sections.contact_page.left_side.addreses') }}</p>
                                </div>
                            </li>
                            <li class="flex items-center space-x-4 group w-fit">
                                <div
                                    class="size-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                                    <i
                                        class='bx bxs-phone text-xl text-white group-hover:animate-bounce transition-all duration-200 ease-linear'></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-shark-900">{{ __('messages.sections.contact_page.left_side.phone') }}</h4>
                                    <span class="text-shark-600">
                                        {{ __('messages.sections.contact_page.left_side.number') }}
                                        <a href="tel:123456789" class="text-blue-500 underline">+628123456789</a>
                                    </span>
                                </div>
                            </li>
                            <li class="flex items-center space-x-4 group w-fit">
                                <div
                                    class="size-10 bg-gradient-to-r from-amber-500 to-amber-600 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                                    <i
                                        class='bx bxs-envelope text-xl text-white group-hover:animate-bounce transition-all duration-200 ease-linear'></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-shark-900">{{ __('messages.sections.contact_page.left_side.email') }}</h4>
                                    <span class="text-shark-600">
                                        {{ __('messages.sections.contact_page.left_side.email_addres') }}
                                        <a href="example@gmail.com"
                                            class="text-blue-500 underline">example@gmail.com</a>
                                    </span>
                                </div>
                            </li>
                            <li class="flex space-x-4 group w-fit">
                                <div
                                    class="size-10 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                                    <i
                                        class='bx bxs-time text-xl text-white group-hover:animate-bounce transition-all duration-200 ease-linear'></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-shark-900">{{ __('messages.sections.contact_page.left_side.opening_hours') }}</h4>
                                    <div class="text-gray-600 space-y-1">
                                        <p>{{ __('messages.sections.contact_page.left_side.hours.p_1') }}</p>
                                        <p>{{ __('messages.sections.contact_page.left_side.hours.p_2') }}</p>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </aside>

                {{-- Right Side --}}
                <aside class="bg-white p-5 rounded-xl min-h-96 shadow-lg border border-white/20 flex flex-col">
                    <div class="flex items-center mb-4">
                        <h3 class="text-2xl font-semibold flex items-center">
                            <i class='bx bxs-map text-2xl text-orange-200 mr-3'></i>
                            {{ __('messages.sections.contact_page.location') }}
                        </h3>
                    </div>
                    <div class="flex-1">
                        <iframe class="w-full h-full border border-white/20 rounded-lg"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.8656270402657!2d115.15990671004744!3d-8.798692689918306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244c13ee9d753%3A0x6c05042449b50f81!2sPoliteknik%20Negeri%20Bali!5e0!3m2!1sid!2sid!4v1749447544884!5m2!1sid!2sid"
                            allowfullscreen="" loading="fast" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </aside>

                {{-- Contact Us --}}
                <aside class="bg-white p-5 rounded-xl shadow-lg border border-white/20 h-fit">
                    <div class="flex items-center">
                        <h3 class="text-2xl font-semibold mb-4 flex items-center">
                            <i class='bx bxs-share-alt text-2xl text-orange-200 mr-3'></i>
                            {{ __('messages.sections.contact_page.follow_us') }}
                        </h3>
                    </div>
                    <div class="flex space-x-4 ">
                        <a href="#"
                            class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl flex items-center justify-center hover:scale-110 transition-transform duration-300 group">
                            <i class='bx bxl-facebook text-xl text-white group-hover:animate-bounce'></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 bg-gradient-to-r from-pink-500 to-rose-600 rounded-xl flex items-center justify-center hover:scale-110 transition-transform duration-300 group">
                            <i class='bx bxl-instagram text-xl text-white group-hover:animate-bounce'></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 bg-gradient-to-r from-blue-400 to-blue-500 rounded-xl flex items-center justify-center hover:scale-110 transition-transform duration-300 group">
                            <i class='bx bxl-twitter text-xl text-white group-hover:animate-bounce'></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center hover:scale-110 transition-transform duration-300 group">
                            <i class='bx bxl-whatsapp text-xl text-white group-hover:animate-bounce'></i>
                        </a>
                    </div>
                </aside>

                <aside class="bg-white p-5 rounded-xl shadow-lg border border-white/20">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        <!-- Transportation -->
                        <div
                            class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 rounded-xl flex flex-col items-center justify-center text-center text-white min-h-[120px] hover:scale-103 hover:shadow-md transition-transform duration-300">
                            <i class='bx bxs-car text-5xl mb-2'></i>
                            <h4 class="font-semibold text-lg lg:text-base">{{ __('messages.sections.contact_page.aside.transportation') }}</h4>
                        </div>

                        <div
                            class="bg-gradient-to-r from-green-500 to-green-600 p-6 rounded-xl flex flex-col items-center justify-center text-center text-white min-h-[120px] hover:scale-103 hover:shadow-md transition-transform duration-300">
                            <i class='bx bx-check-shield text-5xl mb-2'></i>
                            <h4 class="font-semibold text-lg lg:text-base">{{ __('messages.sections.contact_page.aside.trusted_service') }}</h4>
                        </div>

                        <div
                            class="bg-gradient-to-r from-purple-500 to-purple-600 p-6 rounded-xl flex flex-col items-center justify-center text-center text-white min-h-[120px] hover:scale-103 hover:shadow-md transition-transform duration-300">
                            <i class='bx bx-support text-5xl mb-2'></i>
                            <h4 class="font-semibold text-lg lg:text-base">{{ __('messages.sections.contact_page.aside.support') }}</h4>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <x-footer />

    {{-- Scroll Up --}}
    <x-scroll-up />
</x-layout>

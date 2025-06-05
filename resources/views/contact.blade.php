<x-layout>
    {{-- Title --}}
    <x-slot:title>Kontak Kami</x-slot:title>
    <x-navbar />

    {{-- Container Content --}}
    <main class="h-screen sm:h-[110vh] bg-no-repeat bg-cover bg-left sm:bg-center bg-hero">
        {{-- Content --}}
        {{-- Start Hero Section --}}
        <section id="hero" class=" ">
            <div class="container">
                <div class="flex items-center justify-center h-screen">
                    <div class="">
                        <article class="text-center text-white">
                            <span class="badge">{{ __('messages.sections.home_page.hero_section.badge') }}</span>
                            <h1 class="title text-5xl">{{ __('messages.sections.home_page.hero_section.title.span_1') }}
                                <span
                                    class="text-orange-200">{{ __('messages.sections.home_page.hero_section.title.span_2') }}</span>
                            </h1>
                            <p class="paragraph text-white text-lg">
                                {{ __('messages.sections.home_page.hero_section.paragraph') }}
                            </p>
                        </article>

                        <div
                            class="mt-4 sm:w-[70%] sm:mt-5 mx-auto lg:mt-4 lg:flex lg:gap-4 lg:items-center lg:justify-center">
                            <a href="rent" class="btn-primary gap-2 sm:py-2.5 sm:text-2xl lg:px-6 lg:text-base">
                                {{ __('messages.button.rent_now') }}
                                <i class='bx bx-car text-2xl'></i>
                            </a>
                            <a href="{{ url('/rent#rent') }}"
                                class="btn-outline gap-2 mt-2 group sm:mt-3 sm:py-2 sm:text-2xl lg:text-base lg:m-0 border-white text-white hover:border-orange-100 hover:text-orange-100 ">
                                {{ __('messages.button.explore_our_cars') }}
                                <i
                                    class='bx bx-right-arrow-alt text-2xl group-hover:translate-x-2 transition-all duration-200 ease-linear'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Hero Section --}}
    </main>

    <section class="flex justify-center items-center py-16 bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl w-full">
            <h2 class="text-2xl font-bold mb-6 text-center">Our Contact Us</h2>

            <ul class="space-y-4 text-gray-800 text-base">
                <li>
                    <span class="font-bold">📍 Address:</span><br>
                    Jimbaran, Bali Indonesia
                </li>

                <li>
                    <span class="font-bold">📞 Phone:</span><br>
                    +081-111-222-333
                </li>

                <li>
                    <span class="font-bold">📧 Email:</span><br>
                    <a href="mailto:example@gmail.com" class="text-blue-600 hover:underline">example@gmail.com</a>
                </li>

                <li>
                    <span class="font-bold">⏰ Opening Hours:</span><br>
                    Senin – Jumat: 09.00 – 17.00 WITA<br>
                    Sabtu: 09.00 – 13.00 WITA
                </li>
            </ul>
        </div>
    </section>

    <x-footer />
</x-layout>

<x-layout>
    {{-- Title --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Navbar --}}
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

    {{-- Start Filter Section --}}
    <section class="sm:relative pt-10 sm:pt-0">
        <div class="sm:absolute sm:inset-x-0 sm:-bottom-10">
            <div class="container">
                <div class="p-4 w-full bg-white border-2 border-orange-200 shadow-lg rounded-xl">
                    <div class="flex items-center gap-2 lg:gap-4 flex-wrap">
                        @foreach (__('messages.sections.home_page.filter_section') as $filter)
                            <div class="relative w-full sm:grow sm:w-auto flex">
                                <button
                                    class="btn-outline grow justify-between px-4 capitalize focus:border-orange-200 border-2 focus:text-orange-200 lg:text-base">
                                    {{ $filter['filter_item'] }}
                                    <i class='bx bx-chevron-down text-3xl'></i>
                                </button>
                            </div>
                        @endforeach
                        <button class="btn-primary gap-1.5 lg:p-auto grow text-xl lg:text-base lg:grow-0 capitalize">
                            <span class="lg:hidden">{{ __('messages.button.search') }}</span>
                            <span class="hidden lg:block">
                                <i class='bx bx-search text-2xl'></i>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Search Section --}}

    {{-- Srart Brands --}}
    <section class="py-10 sm:pt-16">
        <div class="container">
            <div
                class="flex flex-wrap lg:flex-nowrap justify-center items-center *:flex *:justify-center *:items-center *:w-1/3 *:sm:w-1/4">
                <!-- Brand Item -->
                <div class="">
                    <img src="{{ 'img/cars-brand/lexus.png' }}" alt="Lexus" class="h-18 lg:h-20 object-contain" />
                </div>
                <div class="">
                    <img src="{{ 'img/cars-brand/toyota.png' }}" alt="Toyota" class="h-18 lg:h-20 object-contain" />
                </div>
                <div class="">
                    <img src="{{ 'img/cars-brand/audi.png' }}" alt="Audi" class="h-18 lg:h-20 object-contain" />
                </div>
                <div class="">
                    <img src="{{ 'img/cars-brand/suzuki.png' }}" alt="Suzuki" class="h-18 lg:h-20 object-contain" />
                </div>
                <div class="">
                    <img src="{{ 'img/cars-brand/mercedes.png' }}" alt="Mercedes"
                        class="h-18 lg:h-20 object-contain" />
                </div>
                <div class="">
                    <img src="{{ 'img/cars-brand/hyundai.png' }}" alt="Hyundai" class="h-18 lg:h-20 object-contain" />
                </div>
            </div>
        </div>
    </section>
    {{-- End Brands --}}

    {{-- Start Why Choose Us --}}
    <section class="py-10 sm:py-10">
        <div class="container">
            <div class="">
                <div class="">
                    <article class="sm:text-center">
                        <span
                            class="badge">{{ __('messages.sections.home_page.whychooseus_section.article.badge') }}</span>
                        <h1 class="title">
                            {{ __('messages.sections.home_page.whychooseus_section.article.title') }}</span></h1>
                        <p class="paragraph">
                            {{ __('messages.sections.home_page.whychooseus_section.article.paragraph') }}
                        </p>
                    </article>

                    <div class="grid mt-10 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach (__('messages.sections.home_page.whychooseus_section.card') as $whychooseus)
                            <div
                                class="border-l-4 p-4 sm:p-4 group lg:pt-8 flex items-center gap-4 sm:gap-0 sm:flex-col xl:pt-4 sm:border-t-4 sm:border-l-0 rounded-2xl bg-white hover:shadow-lg shadow-lg hover:shadow-orange-100/70 border-orange-200 lg:border-t-4 lg:border-l-0 transition-all duration-200 ease-linear ">
                                <div
                                    class="bg-radial flex group-hover:shadow-md group-hover:shadow-orange-100 group-hover:scale-105 items-center mx-auto shadow-md justify-center p-1 size-18 from-orange-100 via-orange-200 to-orange-300 rounded-full overflow-hidden flex-shrink-0 transition-all duration-200 ease-linear">
                                    <img class="w-[70%] lg:w-[80%] xl:w-[70%]"
                                        src="{{ __($whychooseus['url_image']) }}" alt="">
                                </div>
                                <article class="pt-4">
                                    <h4 class="subtitle sm:text-center text-2xl lg:text-xl lg:mt-2 xl:mt-0">
                                        {{ $whychooseus['title'] }}
                                    </h4>
                                    <p class="paragraph w-auto sm:text-center">
                                        {{ $whychooseus['description'] }}
                                    </p>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Why Choose Us --}}

    {{-- Start About Us --}}
    <section class="py-10">
        <div class="container">
            <div class="">
                <div class="grid lg:grid-cols-2 gap-4 lg:gap-10 items-center">
                    <div class="h-full overflow-hidden rounded-lg">
                        <img src="{{ 'img/about-us.jpg' }}" alt=""
                            class="brightness-80 h-full hover:scale-105 transition-all duration-200 ease-linear">
                    </div>

                    <div class="">
                        <article class="mt-4 lg:m-0">
                            <span
                                class="badge">{{ __('messages.sections.home_page.wideselection_section.badge') }}</span>
                            <h1 class="title mx-0 w-auto">
                                {{ __('messages.sections.home_page.wideselection_section.title') }}</span></h1>
                            <p class="paragraph mx-0 w-auto">
                                {{ __('messages.sections.home_page.wideselection_section.paragraph') }}
                            </p>
                            <a href="{{ url('/rent') }}" class="btn-primary gap-2 group w-fit mt-4">
                                {{ __('messages.button.browse_cars') }}
                                <i
                                    class='bx bx-right-arrow-alt text-2xl group-hover:translate-x-2 transition-all duration-200 ease-linear'></i>
                            </a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Why Choose Us --}}

    {{-- Start Our Collection --}}
    <section id="rent" class="py-10 sm:py-10">
        <div class="container">
            <div class="">
                <div class="">
                    <article class="sm:text-center">
                        <span
                            class="badge">{{ __('messages.sections.home_page.our_collection_section.badge') }}</span>
                        <h1 class="title">
                            {{ __('messages.sections.home_page.our_collection_section.title') }}</span></h1>
                        <p class="paragraph">
                            {{ __('messages.sections.home_page.our_collection_section.paragraph') }}
                        </p>
                    </article>

                    <div class="">
                        <div
                            class="py-10 pb-5 hide-scrollbar flex mx-auto *:cursor-pointer *:font-medium overflow-x-auto whitespace-nowrap gap-3 *:border *:px-4 *:py-1.5 *:lg:text-sm *:rounded-full *:hover:bg-shark-100 *:bg-shark-50 *:*:transition-all *:*:duration-200 *:*:ease-linear">
                            <button class="">
                                City Cars
                            </button>
                            <button class="">
                                Luxury Cars
                            </button>
                            <button class="">
                                Sports Cars
                            </button>
                            <button class="">
                                SUV Cars
                            </button>
                            <button class="">
                                Electric Cars
                            </button>
                        </div>
                        <x-rent />

                        <a href="{{ url('/rent#rent') }}" class="btn-primary gap-2 group w-fit mt-4 mx-auto">
                            {{ __('messages.button.browse_cars') }}
                            <i
                                class='bx bx-right-arrow-alt text-2xl group-hover:translate-x-2 transition-all duration-200 ease-linear'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Why Choose Us --}}

    {{-- Your Dream --}}
    <section class="py-10 sm:p-0 bg-sports_luxury_section lg:bg-none bg-center bg-no-repeat">
        <div class="container">
            <div
                class="h-[70vh] sm:h-[60vh] lg:h-[70vh] bg-cover bg-center bg-no-repeat flex justify-center items-center rounded-xl lg:bg-sports_luxury_section">
                <article class="text-center text-white">
                    <span
                        class="badge mx-auto">{{ __('messages.sections.home_page.sports_&_luxury_section.badge') }}</span>
                    <h1 class="title capitalize w-auto">
                        {{ __('messages.sections.home_page.sports_&_luxury_section.title') }}</span></h1>
                    <p class="paragraph text-white">
                        {{ __('messages.sections.home_page.sports_&_luxury_section.paragraph') }}
                    </p>
                    <a href="{{ url('/rent') }}" class="btn-primary gap-2 group mx-auto w-fit mt-4">
                        {{ __('messages.button.book_now') }}
                        <i
                            class='bx bx-right-arrow-alt text-2xl group-hover:translate-x-2 transition-all duration-200 ease-linear'></i>
                    </a>
                </article>
            </div>
        </div>
    </section>

    {{-- Start Reviews --}}
    <x-reviews />
    {{-- End Reviews --}}

    {{-- Start Questions --}}
    <x-any-questions />
    {{-- End Questions --}}

    {{-- Footer --}}
    <x-footer />
</x-layout>

<x-layout>
    {{-- Title --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Navbar --}}
    <x-navbar />

    <main class="h-screen sm:h-[110vh] bg-no-repeat bg-cover bg-center lg:bg-left sm:bg-center bg-hero-rent">

        {{-- Content --}}
        {{-- Start Hero Section --}}
        <section class="">
            <div class="container">
                <div class="flex items-center justify-center h-screen">
                    <div class="">
                        <article class="text-center text-white">
                            <span class="badge">{{ __('messages.sections.rent_page.hero_section.badge') }}</span>
                            <h1 class="title text-5xl">{{ __('messages.sections.rent_page.hero_section.title.span_1') }}
                                <span
                                    class="text-orange-200">{{ __('messages.sections.rent_page.hero_section.title.span_2') }}</span>
                            </h1>
                            <p class="paragraph text-white text-lg">
                                {{ __('messages.sections.rent_page.hero_section.paragraph') }}
                            </p>
                        </article>

                        <div
                            class="mt-4 sm:w-[70%] sm:mt-5 mx-auto lg:mt-4 lg:flex lg:gap-4 lg:items-center lg:justify-center">
                            <a href="#rent" class="btn-primary gap-2 sm:py-2.5 sm:text-2xl lg:px-6 lg:text-base">
                                {{ __('messages.button.rent_now') }}
                                <i class='bx bx-car text-2xl'></i>
                            </a>
                            <a href="{{ url('/rent') }}"
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

    <!-- Start Car Grid -->
    <section id="rent" class="py-10 relative">
        <div class="container">
            <div class="grid xl:grid-cols-12 gap-4">
                {{-- Button filter --}}
                <div class="fixed xl:hidden z-50 bottom-4 right-4">
                    <button id="filterBtn" onclick="toggleFilter()"
                        class="fixed bottom-4 right-4 z-50 opacity-0 translate-y-4 pointer-events-none transition-all duration-300 ease-in-out bg-orange-200 flex items-center justify-center hover:bg-orange-100 hover:scale-103 text-white rounded-full size-14 border border-white">
                        <i class='bx bx-filter-alt text-2xl'></i>
                    </button>
                </div>
                {{-- FIlter --}}
                <div id="mobileFilter"
                    class="fixed z-40 bottom-0 w-full left-0 bg-white xl:top-auto xl:left-auto xl:z-auto rounded-b-none rounded-t-2xl xl:rounded-2xl p-4 xl:static xl:col-span-3 border border-shark-100 h-fit transform translate-y-full xl:translate-0 transition-transform duration-300 ease-in-out">
                    <div
                        class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-1 gap-6 max-h-[85vh] xl:max-h-full overflow-y-auto relative bg-white">
                        <!-- Filter Header -->
                        <div
                            class="flex justify-between col-span-2 lg:col-span-3 xl:col-span-1 items-center sticky top-0 left-0 w-full bg-white pb-5 xl:p-0 xl:static">
                            <h3 class="text-xl font-bold flex items-center gap-2">
                                <i class='bx bx-filter-alt text-2xl'></i>
                                Filter Pencarian
                            </h3>

                            <button onclick="toggleFilter()" class="xl:hidden cursor-pointer">
                                <i
                                    class='bx bx-x text-3xl hover:text-orange-200 hover:rotate-90 transition-all duration-200 ease-linear'></i>
                            </button>
                        </div>

                        <!-- Price Range Filter -->
                        <div
                            class="border border-shark-100 shadow p-4 rounded-lg col-span-2 sm:col-span-1 text-lg lg:text-base">
                            <h4 class="font-semibold mb-3 flex items-center gap-2">
                                <i class='bx bx-money text-2xl'></i>
                                Rentang Harga
                            </h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="text-sm text-shark-600">Minimum (Rp)</label>
                                    <input type="number" min="0"
                                        class="w-full mt-1 px-3 py-2 border-1 border-orange-300/60 rounded-lg focus:ring-1 focus:outline-none focus:ring-orange-200 focus:border-orange-200"
                                        placeholder="100,000">
                                </div>
                                <div>
                                    <label class="text-sm text-shark-600">Maksimum (Rp)</label>
                                    <input type="number" min="0"
                                        class="w-full mt-1 px-3 py-2 border-1 border-orange-300/60 rounded-lg focus:ring-1 focus:outline-none focus:ring-orange-200 focus:border-orange-200"
                                        placeholder="1,000,000">
                                </div>
                            </div>
                        </div>

                        <!-- Car Type Filter -->
                        <div
                            class="border border-shark-100 shadow p-4 rounded-lg col-span-2 sm:col-span-1 text-lg lg:text-base">
                            <h4 class="font-semibold mb-3 flex items-center gap-2">
                                <i class='bx bx-car text-2xl'></i>
                                Tipe Mobil
                            </h4>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">Sedan</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">SUV</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">Hatchback</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">MPV</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">Pickup</span>
                                </label>
                            </div>
                        </div>

                        <!-- Transmission Filter -->
                        <div
                            class="border border-shark-100 shadow p-4 rounded-lg col-span-2 sm:col-span-1 text-lg lg:text-base">
                            <h4 class="font-semibold mb-3 flex items-center gap-2">
                                <i class='bx bx-cog text-2xl'></i>
                                Transmisi
                            </h4>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="transmission"
                                        class="w-4 h-4 text-orange-200 border-shark-300 focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">Manual</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="transmission"
                                        class="w-4 h-4 text-orange-200 border-shark-300 focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">Automatic</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="transmission"
                                        class="w-4 h-4 text-orange-200 border-shark-300 focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">Semua</span>
                                </label>
                            </div>
                        </div>

                        <!-- Passenger Capacity -->
                        <div
                            class="border border-shark-100 shadow p-4 rounded-lg col-span-2 sm:col-span-1 text-lg lg:text-base">
                            <h4 class="font-semibold mb-3 flex items-center gap-2">
                                <i class='bx bx-group text-2xl'></i>
                                Kapasitas Penumpang
                            </h4>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">2 Orang</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">4 Orang</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">6 Orang</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">8+ Orang</span>
                                </label>
                            </div>
                        </div>

                        <!-- Year Filter -->
                        <div
                            class="border border-shark-100 shadow p-4 rounded-lg col-span-2 sm:col-span-1 text-lg lg:text-base">
                            <h4 class="font-semibold mb-3 flex items-center gap-2">
                                <i class='bx bxs-calendar text-2xl'></i>
                                Tahun Kendaraan
                            </h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="text-sm text-shark-600">Dari Tahun</label>
                                    <select
                                        class="w-full mt-1 px-3 py-2 border-1 border-orange-300/60 rounded-lg focus:ring-1 focus:outline-none focus:ring-orange-200 focus:border-orange-200">
                                        <option value="">Pilih Tahun</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-sm text-shark-600">Sampai Tahun</label>
                                    <select
                                        class="w-full mt-1 px-3 py-2 border-1 border-orange-300/60 rounded-lg focus:ring-1 focus:outline-none focus:ring-orange-200 focus:border-orange-200">
                                        <option value="">Pilih Tahun</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Brand Filter -->
                        <div
                            class="border border-shark-100 shadow p-4 rounded-lg col-span-2 sm:col-span-1 text-lg lg:text-base">
                            <h4 class="font-semibold mb-3 flex items-center gap-2">
                                <i class='bx bx-badge text-2xl'></i>
                                Merek Mobil
                            </h4>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">Toyota</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">Honda</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">Daihatsu</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">Mitsubishi</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-orange-200 border-shark-300 rounded focus:ring-orange-200 accent-orange-300">
                                    <span class="ml-2 text-sm text-shark-700 md:text-base xl:text-sm">Suzuki</span>
                                </label>
                            </div>
                        </div>

                        <!-- Filter Buttons -->
                        <div
                            class="flex flex-wrap gap-2 sm:gap-4 w-full sm:w-[70%] col-span-2 lg:col-span-3 lg:w-[70%] mx-auto lg:gap-4 xl:gap-2 pb-10 xl:pb-0 xl:mt-0 xl:w-full xl:flex-wrap xl:col-span-1 mt-6 grow">
                            <button class="btn-primary w-full grow sm:text-lg lg:text-base xl:text-sm sm:py-4 lg:py-2">
                                Terapkan Filter
                            </button>
                            <button
                                class="btn-outline border grow w-full sm:text-lg lg:text-base xl:text-sm sm:py-4 lg:py-2">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-span-9 pt-10 xl:pt-0">
                    {{-- Card Rent --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                        <x-cars :cars=$cars />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Car Grid -->


    <!-- Call to Action -->
    <section class="bg-orange-200 container text-white py-10">
        <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left">
            <h2 class="text-2xl font-bold">Ready To Go Now?</h2>
            <p class="my-4 md:my-0"><b>Book your car today and enjoy a smooth ride. AutoRent is ready 24/7 for your
                    journey.</b></p>
            <button
                class="bg-white text-orange-200 hover:bg-white/80 transition-all duration-200 ease-linear hover:text-orange-100 px-4 py-2 rounded cursor-pointer font-semibold">Get
                Started</button>
        </div>
    </section>

    {{-- Recent Reviews --}}
    <x-reviews />

    {{-- Footer --}}
    <x-footer />

    {{-- Scroll Up --}}
    <x-scroll-up />
</x-layout>

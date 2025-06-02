<section class="py-10">
    <div class="container">
        <div class="">
            <article class="text-left sm:text-center">
                <span class="badge">{{ __('messages.sections.components.feedback_section.badge') }}</span>
                <h1 class="title">{{ __('messages.sections.components.feedback_section.title') }}</span></h1>
            </article>

            <div class="relative">
                <!-- Tombol Navigasi -->
                <button id="prevBtn"
                    class="absolute left-0 top-1/2 -translate-y-1/2 bg-white size-12 lg:size-10 text-orange-200 flex justify-center items-center shadow p-2 rounded-full z-10 cursor-pointer">
                    <i class='bx bx-chevron-left text-2xl'></i>
                </button>
                <button id="nextBtn"
                    class="absolute right-0 top-1/2 -translate-y-1/2 bg-white size-12 lg:size-10 text-orange-200 flex justify-center items-center shadow p-2 rounded-full z-10 cursor-pointer">
                    <i class='bx bx-chevron-right text-2xl'></i>
                </button>

                <!-- Wrapper untuk centering -->
                <div class="flex justify-center">
                    <!-- Slider -->
                    <div id="slider"
                        class="flex space-x-6 overflow-x-auto scroll-smooth hide-scrollbar pt-10 px-10 snap-x snap-mandatory max-w-[1200px] snap-center">
                        @foreach (__('messages.sections.rentPage.reviews') as $review)
                            <div
                                class="w-[300px] bg-white shadow-md rounded-xl overflow-hidden flex-shrink-0 group snap-center">
                                <div>
                                    <img src="{{ $review['image'] }}"
                                        class="w-full h-48 object-cover group-hover:scale-103 transition-all duration-150 ease-linear"
                                        alt="{{ $review['title'] }}" />
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-lg text-shark-950">{{ $review['title'] }}</h3>
                                    <p class="text-sm text-shark-600 mt-2">{{ $review['description'] }}</p>
                                </div>
                                <div class="flex items-center justify-between mt-4 mb-2 px-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ $review['profile_image'] }}" alt="{{ $review['username'] }}"
                                            class="w-8 h-8 rounded-full object-cover">
                                        <span
                                            class="font-semibold text-sm text-shark-950">{{ $review['username'] }}</span>
                                    </div>
                                    <div class="flex items-center space-x-1 text-sm *:text-orange-200 *:text-lg">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review['rating'])
                                                <span class=""><i class='bx bxs-star text-base'></i></span>
                                            @else
                                                <span class=""><i class='bx bx-star text-base'></i></span>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

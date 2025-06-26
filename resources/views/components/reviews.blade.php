<section class="py-10">
    <div class="container">
        <div class="">
            <article class="text-left sm:text-center">
                <span class="badge">{{ __('messages.sections.components.feedback_section.badge') }}</span>
                <h1 class="title">{{ __('messages.sections.components.feedback_section.title') }}</span></h1>
            </article>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-4">
                <!-- Form Review -->
                <aside>
                    <div class="bg-white shadow-md rounded-xl p-4 border border-white/20">
                        <form action="" class="space-y-4">
                            <!-- Rating Stars -->
                            <div class="flex flex-col gap-4">
                                <div class="flex items-center gap-4 text-lg font-semibold">
                                    Layanan
                                    <div class="text-2xl text-orange-400">
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 text-lg font-semibold">
                                    Mobil
                                    <div class="text-2xl text-orange-400">
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 text-lg font-semibold">
                                    Website
                                    <div class="text-2xl text-orange-400">
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                        <i class='bx bx-star'></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div>
                                <textarea class="border rounded-md w-full h-32 p-4 resize-none" placeholder="Share your experience with our rentals"></textarea>
                            </div>

                            <!-- Upload Button -->
                            <div>
                                <label for="photo-upload"
                                    class="btn-primary flex justify-center items-center text-base gap-2">
                                    <i class='bx bxs-camera-plus text-2xl'></i>
                                    Add photo
                                </label>
                                <input type="file" id="photo-upload" class="hidden" />
                            </div>
                        </form>
                    </div>
                </aside>

                <!-- Rating Summary -->
                <aside>
                    <div class="space-y-4 bg-white shadow-md rounded-xl p-4 border border-white/20">
                        <div class="">
                            <div class="text-lg font-semibold">Average Rating</div>
                            <div class="flex items-center gap-4">
                                <div
                                    class="text-6xl font-bold bg-gradient-to-r from-orange-100 via-orange-200 to-orange-300 bg-clip-text text-transparent">
                                    4.2</div>
                                <div class="text-gray-600">out of 5</div>
                            </div>
                            <div
                                class="bg-gradient-to-r from-orange-100 via-orange-200 to-orange-300 text-transparent bg-clip-text text-2xl">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star-half"></i>
                                <i class="bx bx-star"></i>
                            </div>
                            <div class="text-sm text-gray-500">128 reviews</div>
                        </div>

                        <!-- Rating Bars -->
                        <div class="space-y-2 mt-4">
                            <!-- 5 stars -->
                            <div class="flex items-center gap-2">
                                <div class="w-10 text-sm">5</div>
                                <div class="w-full bg-gray-200 rounded h-3">
                                    <div class="bg-gradient-to-r from-orange-100 via-orange-200 to-orange-300 h-3 rounded"
                                        style="width: 60%"></div>
                                </div>
                            </div>
                            <!-- 4 stars -->
                            <div class="flex items-center gap-2">
                                <div class="w-10 text-sm">4</div>
                                <div class="w-full bg-gray-200 rounded h-3">
                                    <div class="bg-gradient-to-r from-orange-100 via-orange-200 to-orange-300 h-3 rounded"
                                        style="width: 25%"></div>
                                </div>
                            </div>
                            <!-- 3 stars -->
                            <div class="flex items-center gap-2">
                                <div class="w-10 text-sm">3</div>
                                <div class="w-full bg-gray-200 rounded h-3">
                                    <div class="bg-gradient-to-r from-orange-100 via-orange-200 to-orange-300 h-3 rounded"
                                        style="width: 10%"></div>
                                </div>
                            </div>
                            <!-- 2 stars -->
                            <div class="flex items-center gap-2">
                                <div class="w-10 text-sm">2</div>
                                <div class="w-full bg-gray-200 rounded h-3">
                                    <div class="bg-gradient-to-r from-orange-100 via-orange-200 to-orange-300 h-3 rounded"
                                        style="width: 3%"></div>
                                </div>
                            </div>
                            <!-- 1 star -->
                            <div class="flex items-center gap-2">
                                <div class="w-10 text-sm">1</div>
                                <div class="w-full bg-gray-200 rounded h-3">
                                    <div class="bg-gradient-to-r from-orange-100 via-orange-200 to-orange-300 h-3 rounded"
                                        style="width: 2%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>


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

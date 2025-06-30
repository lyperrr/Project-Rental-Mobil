@php
    // Ambil data review dari messages (atau bisa dari controller jika dinamis)
    $reviews = __('messages.sections.rentPage.reviews');

    // Hitung rata-rata rating
    $averageRating = count($reviews) > 0 ? collect($reviews)->avg('rating') : 0;

    // Hitung jumlah rating untuk masing-masing skor (1–5)
    $ratingCount = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
    foreach ($reviews as $r) {
        $score = (int) round($r['rating']);
        $score = max(1, min(5, $score));
        $ratingCount[$score]++;
    }

    // Total review
    $totalReviews = count($reviews);

    // Fungsi menampilkan bintang visual dari rating rata-rata
    function renderStars($rating) {
        $fullStars = floor($rating);
        $halfStar = ($rating - $fullStars) >= 0.5;
        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);

        $output = str_repeat("<i class='bx bxs-star'></i>", $fullStars);
        if ($halfStar) $output .= "<i class='bx bxs-star-half'></i>";
        $output .= str_repeat("<i class='bx bx-star'></i>", $emptyStars);

        return $output;
    }
@endphp


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
                        <form action="" method="POST" class="space-y-4">
                            @csrf

                            <!-- Rating Input -->
                            @foreach(['service_rating' => 'Layanan', 'car_rating' => 'Mobil', 'website_rating' => 'Website'] as $name => $label)
                                <div class="flex items-center gap-4 text-lg font-semibold">
                                    {{ $label }}
                                    <div class="text-2xl text-orange-400 space-x-1 star-rating" data-name="{{ $name }}">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <label>
                                                <input type="radio" name="{{ $name }}" value="{{ $i }}" class="opacity-0 absolute" required>
                                                <i class='bx bx-star cursor-pointer'></i>
                                            </label>
                                        @endfor
                                    </div>
                                    <script>
                                        document.querySelectorAll('.star-rating').forEach(group => {
                                            const stars = group.querySelectorAll('i');
                                            const radios = group.querySelectorAll('input');

                                            stars.forEach((star, index) => {
                                                star.addEventListener('click', () => {
                                                    radios[index].checked = true;
                                                    stars.forEach((s, i) => {
                                                        s.classList.toggle('bxs-star', i <= index);
                                                        s.classList.toggle('bx-star', i > index);
                                                    });
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            @endforeach

                            <!-- Description -->
                            <textarea name="description" class="border rounded-md w-full h-32 p-4 resize-none" required placeholder="Bagikan pengalaman Anda..."></textarea>

                            <!-- Submit -->
                            <button type="submit" class="btn-primary w-full">Kirim Review</button>
                        </form>
                    </div>
                </aside>

                <!-- Rating Summary -->
                <aside>
                    <div class="space-y-4 bg-white shadow-md rounded-xl p-4 border border-white/20">
                        <div class="">
                            <div class="text-lg font-semibold">Average Rating</div>
                            <div class="flex items-center gap-4">
                                <div class="text-6xl font-bold bg-gradient-to-r from-orange-100 via-orange-200 to-orange-300 bg-clip-text text-transparent">
                                    {{ number_format($averageRating, 1) }}
                                </div>
                            <div class="text-gray-600">out of 5</div>
                            <div class="bg-gradient-to-r from-orange-100 via-orange-200 to-orange-300 text-transparent bg-clip-text text-2xl">
                                {!! renderStars($averageRating) !!}
                            </div>
                            <div class="text-sm text-gray-500">{{ $totalReviews }} reviews</div>
                        </div>
                        @for ($i = 5; $i >= 1; $i--)
                            @php
                                $percent = $totalReviews > 0 ? ($ratingCount[$i] / $totalReviews) * 100 : 0;
                            @endphp
                            <div class="flex items-center gap-2">
                                <div class="w-10 text-sm">{{ $i }}</div>
                                <div class="w-full bg-gray-200 rounded h-3">
                                    <div class="bg-gradient-to-r from-orange-100 via-orange-200 to-orange-300 h-3 rounded"
                                        style="width: {{ round($percent) }}%">
                                    </div>
                                </div>
                            </div>
                        @endfor
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
                        @foreach ($reviews as $review)
                            <div class="w-[300px] bg-white shadow-md rounded-xl overflow-hidden flex-shrink-0 group snap-center">
                                <!-- Ganti gambar utama dengan placeholder -->

                                <div class="p-4">
                                    <h3 class="font-semibold text-lg text-shark-950">{{ $review['title'] }}</h3>
                                    <p class="text-sm text-shark-600 mt-2">{{ $review['description'] }}</p>
                                </div>

                                <div class="flex items-center justify-between mt-4 mb-2 px-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ $review['profile_image'] }}" alt="{{ $review['username'] }}"
                                            class="w-8 h-8 rounded-full object-cover">
                                        <span class="font-semibold text-sm text-shark-950">{{ $review['username'] }}</span>
                                    </div>
                                    <div class="flex items-center space-x-1 text-sm *:text-orange-200 *:text-lg">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review['rating'])
                                                <span><i class='bx bxs-star text-base'></i></span>
                                            @else
                                                <span><i class='bx bx-star text-base'></i></span>
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

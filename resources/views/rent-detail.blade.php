<x-layout>
    <x-slot:title>{{ $car->brand }} {{ $car->model }}</x-slot:title>

    <x-navbar />

    <section
        class="relative text-3xl font-bold text-center mb-4 flex items-center justify-center text-white h-[60vh] overflow-hidden group">
        <!-- Background dengan hover scale -->
        <div
            class="absolute inset-0 bg-hero-blog bg-cover bg-top transition-transform duration-700 ease-out group-hover:scale-110">
        </div>

        <h2 class="text-white text-3xl xl:text-4xl font-bold z-10">
            {{ $car->brand }} {{ $car->model }}
        </h2>
    </section>

    <section class="py-10">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <aside class="bg-white shadow-lg rounded-xl">
                    <div class="overflow-hidden group min-h-[20vh] max-h-[40vh] xl:max-h-[60vh] aspect-[16/9] w-full">
                        @if ($car->image)
                            <img src="{{ $car->image }}" alt="{{ $car->brand }} {{ $car->model }}"
                                class="w-full h-full object-cover rounded-md group-hover:scale-103 transition-all duration-150 ease-linear" />
                        @else
                            <div class="flex items-center justify-center bg-shark-100 rounded-md w-full h-full">
                                <i
                                    class="bx bx-image-alt text-7xl text-shark-400 group-hover:scale-103 transition-all duration-150 ease-linear"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-5 border-t border-shark-400">
                        <div
                            class="bg-gradient-to-r from-orange-100/30 to-orange-300/20 rounded-md text-center border border-orange-200/60 p-4 font-medium py-2 md:py-4 lg:flex justify-between items-center lg:h-32">
                            <h5 class="text-base md:text-lg">Rental Price:</h5>
                            <p
                                class="text-lg md:text-2xl bg-gradient-to-r from-orange-300 to-orange-100 bg-clip-text text-transparent">
                                Rp. {{ number_format($car->price_per_day, 0, ',', '.') }}/day
                            </p>
                        </div>
                    </div>
                </aside>

                {{-- Details --}}
                <aside class="bg-white p-5 rounded-xl shadow-lg border border-white/20">
                    <div class="grid grid-cols-2 gap-4 md:gap-6 *:text-center">
                        @forelse([
                                ['icon' => 'bx-car', 'label' => 'Brand', 'value' => $car->brand],
                                ['icon' => 'bx-calendar', 'label' => 'Model Year', 'value' => $car->year],
                                ['icon' => 'bx-cog', 'label' => 'Transmission', 'value' => $car->transmission],
                                ['icon' => 'bx-gas-pump', 'label' => 'Fuel Type', 'value' => $car->fuel_type],
                                ['icon' => 'bx-group', 'label' => 'Seats', 'value' => $car->seats],
                                ['icon' => 'bx-id-card', 'label' => 'License Plate', 'value' => $car->license_plate],
                            ] as $item)
                            <aside>
                                <div class="flex gap-1 items-center">
                                    <i class='bx {{ $item['icon'] }} text-2xl text-orange-200/80'></i>
                                    <h5 class="font-semibold text-base md:text-xl lg:text-base">{{ $item['label'] }}
                                    </h5>
                                </div>
                                <p
                                    class="bg-shark-50/50 mt-1 md:mt-2 md:text-lg lg:text-base py-2 border border-orange-100/40 font-medium rounded-md capitalize">
                                    {{ $item['value'] }}
                                </p>
                            </aside>
                        @empty
                            <p class="text-center text-shark-500">N/A</p>
                        @endforelse
                        <div class="col-span-2">
                            <div class="border-t border-shark-400 pt-2">
                                <div class="flex items-center gap-1 mb-3">
                                    <i class="bx bx-info-circle text-3xl text-orange-200"></i>
                                    <h5 class="font-semibold text-base md:text-xl lg:text-base">Requirements</h5>
                                </div>
                                <ul class="grid md:grid-cols-2 gap-2 text-left">
                                    <li class="">
                                        <i class="bx bx-check text-green-500"></i>
                                        Valid driver's license
                                    </li>
                                    <li class="">
                                        <i class="bx bx-check text-green-500"></i>
                                        Minimum age 21 years
                                    </li>
                                    <li class="">
                                        <i class="bx bx-check text-green-500"></i>
                                        Security deposit required
                                    </li>
                                    <li class="">
                                        <i class="bx bx-check text-green-500"></i>
                                        Valid ID card/passport
                                    </li>
                                </ul>
                            </div>

                            <!-- Pengecekan Login dan Profil -->
                            @auth
                                @php
                                    $userProfile = auth()->user()->userProfile;
                                @endphp
                                @if ($userProfile && !empty($userProfile->identity_number))
                                    <!-- Form Penyewaan -->
                                    <form action="{{ route('rent.store') }}" method="POST" class="mt-4">
                                        @csrf
                                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                                        <div class="grid gap-4">
                                            <div>
                                                <label for="start_date" class="block text-sm font-medium text-shark-700">Start Date</label>
                                                <input type="date" name="start_date" id="start_date" class="w-full mt-1 p-2 border border-shark-300 rounded-md" required>
                                            </div>
                                            <div>
                                                <label for="end_date" class="block text-sm font-medium text-shark-700">End Date</label>
                                                <input type="date" name="end_date" id="end_date" class="w-full mt-1 p-2 border border-shark-300 rounded-md" required>
                                            </div>
                                            <div>
                                                <label for="notes" class="block text-sm font-medium text-shark-700">Additional Notes</label>
                                                <textarea name="notes" id="notes" class="w-full mt-1 p-2 border border-shark-300 rounded-md" rows="4"></textarea>
                                            </div>
                                            <button type="submit" class="btn-primary w-full md:text-lg py-3">
                                                {{ __('messages.button.submit_rental') }}
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <!-- Arahkan ke halaman profil jika belum lengkap -->
                                    <div class="text-center mt-4">
                                        <p class="text-shark-600 mb-2">Please complete your profile to proceed with the rental.</p>
                                        <a href="{{ route('profile') }}" class="btn-primary w-full md:text-lg py-3">
                                            Complete Your Profile
                                        </a>
                                    </div>
                                @endif
                            @else
                                <!-- Tombol Rent Now untuk pengguna yang belum login -->
                                <button onclick="showModal('{{ $car->id }}')" class="btn-primary w-full md:text-lg mt-4 py-3">
                                    {{ __('messages.button.rent_now') }}
                                </button>
                            @endauth
                        </div>
                    </div>
                </aside>

                {{-- Car Details --}}
                <aside class="bg-white p-5 rounded-xl shadow-lg border border-white/20">
                    <div>
                        <div class="flex items-center gap-1 mb-3">
                            <i class="bx bx-detail text-3xl text-orange-200"></i>
                            <h4 class="font-semibold text-2xl">Car Details</h4>
                        </div>

                        <div class="grid grid-cols-2 gap-4 md:gap-6 *:text-center border-t border-shark-400 pt-2">
                            @forelse([
                                ['icon' => 'bx-car', 'label' => 'Brand', 'value' => $car->brand],
                                ['icon' => 'bxs-car', 'label' => 'Model', 'value' => $car->model],
                                ['icon' => 'bx-calendar', 'label' => 'Model Year', 'value' => $car->year],
                                [
                                    'icon' => $car->status === 'available' ? 'bx-check-circle' : ($car->status === 'rented' ? 'bx-car' : 'bx-wrench'),
                                    'label' => 'Status',
                                    'value' => ucfirst($car->status ?? 'Unknown'),
                                ],
                                ['icon' => 'bx-cog', 'label' => 'Transmission', 'value' => $car->transmission],
                                ['icon' => 'bx-gas-pump', 'label' => 'Fuel Type', 'value' => $car->fuel_type],
                                ['icon' => 'bx-group', 'label' => 'Seats', 'value' => $car->seats],
                                ['icon' => 'bx-id-card', 'label' => 'License Plate', 'value' => $car->license_plate],
                            ] as $item)
                                <div>
                                    <div class="flex gap-1 items-center">
                                        <i class='bx {{ $item['icon'] }} text-2xl text-orange-200/80'></i>
                                        <h5 class="font-semibold text-base md:text-xl lg:text-base">
                                            {{ $item['label'] }}
                                        </h5>
                                    </div>
                                    <p
                                        class="bg-shark-50/50 mt-1 md:mt-2 md:text-lg lg:text-base py-2 border border-orange-100/40 font-medium rounded-md capitalize">
                                        {{ $item['value'] }}
                                    </p>
                                </div>
                            @empty
                                <p class="text-center text-shark-500">N/A</p>
                            @endforelse
                        </div>
                    </div>
                </aside>

                {{-- Description --}}
                <aside class="bg-white p-5 rounded-xl shadow-lg border border-white/20">
                    <div class="">
                        <div class="flex items-center gap-1 mb-3">
                            <i class="bx bx-info-circle text-3xl text-orange-200"></i>
                            <h4 class="font-semibold text-2xl">Description</h4>
                        </div>
                        <div class="border-t border-shark-400 pt-2">
                            @if (!empty(trim($car->description ?? '')))
                                <p class="text-base text-shark-600">{{ trim($car->description) }}</p>
                            @else
                                <p class="text-base text-shark-600 italic">No description available</p>
                            @endif
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- Modal HTML -->
    <div id="loginModal" class="fixed inset-0 z-50 hidden">
        <!-- Backdrop dengan blur effect -->
        <div id="modalBackdrop" class="fixed inset-0 bg-black/60 modal-overlay"></div>

        <!-- Modal Container -->
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div id="modalContent"
                class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 overflow-hidden relative">

                <!-- Close Button -->
                <button onclick="hideModal()"
                    class="absolute top-4 right-4 z-40 cursor-pointer flex items-center justify-center origin-center text-shark-400 hover:text-shark-600 transition-all duration-150 hover:rotate-90">
                    <i class="bx bx-x text-3xl"></i>
                </button>

                <!-- Modal Content -->
                <div class="relative z-10 p-8">
                    <!-- Header Icon -->
                    <div class="text-center mb-6">
                        <div class="relative inline-block">
                            <div
                                class="bg-gradient-to-br from-orange-500 to-orange-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg pulse-ring">
                                <i class="bx bx-lock-alt text-white text-3xl"></i>
                            </div>
                            <div
                                class="absolute -top-1 -right-1 bg-red-500 w-6 h-6 rounded-full flex items-center justify-center">
                                <i class="bx bx-shield-check text-white text-xs"></i>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-shark-800 mb-2">Please Login</h3>
                        <p class="text-shark-600 leading-relaxed">You need to be logged in to rent this car and access
                            all our premium features.</p>
                    </div>

                    <!-- Features Preview -->
                    <div
                        class="bg-gradient-to-r from-orange-50 to-orange-100/50 rounded-xl p-4 mb-6 border border-orange-200/50">
                        <h5 class="font-semibold text-shark-800 mb-3 flex items-center">
                            <i class="bx bx-star text-orange-500 mr-2"></i>
                            Member Benefits
                        </h5>
                        <div class="grid grid-cols-2 gap-3 text-sm">
                            <div class="flex items-center text-shark-700">
                                <i class="bx bx-check-circle text-green-500 mr-2 text-base"></i>
                                Easy Booking
                            </div>
                            <div class="flex items-center text-shark-700">
                                <i class="bx bx-check-circle text-green-500 mr-2 text-base"></i>
                                Fast Checkout
                            </div>
                            <div class="flex items-center text-shark-700">
                                <i class="bx bx-check-circle text-green-500 mr-2 text-base"></i>
                                Order History
                            </div>
                            <div class="flex items-center text-shark-700">
                                <i class="bx bx-check-circle text-green-500 mr-2 text-base"></i>
                                Special Offers
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-4">
                        <a href="{{ route('login') }}"
                            class="btn-primary md:py-4 w-full flex items-center justify-center">
                            <i
                                class="bx bx-log-in mr-3 text-xl group-hover:translate-x-1 transition-transform duration-200 relative z-10"></i>
                            <span class="relative z-10">Login Now</span>
                        </a>

                        <div class="text-center pt-2 border-t border-shark-400">
                            <p class="text-sm text-shark-500 mb-2">Don't have an account yet?</p>
                            <a href="{{ route('signup') }}"
                                class="text-orange-100 hover:text-orange-300 font-semibold text-sm hover:underline transition-all duration-200 inline-flex items-center">
                                Create Free Account
                                <i
                                    class="bx bx-right-arrow-alt ml-1 text-lg group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-layout>
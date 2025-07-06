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

                <div class="grid grid-cols-1 gap-6">
                    <aside class="bg-white shadow-lg rounded-xl">
                        <div
                            class="overflow-hidden group min-h-[20vh] max-h-[40vh] xl:max-h-[60vh] aspect-[16/9] w-full">
                            @if ($car->image_base64)
                                <img src="{{ $car->image_base64 }}" alt="{{ $car->brand }} {{ $car->model }}"
                                    class="w-full h-full object-cover rounded-md group-hover:scale-103 transition-all duration-150 ease-linear"
                                    loading="lazy" />
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
                </div>

                <div class="space-y-6">
                    @auth
                        @php
                            $userProfile = auth()->user()->userProfile;
                            $profileComplete =
                                $userProfile &&
                                !empty($userProfile->full_name) &&
                                !empty($userProfile->phone) &&
                                !empty($userProfile->ktp_number) &&
                                !empty($userProfile->sim_number) &&
                                !empty($userProfile->ktp_image) &&
                                !empty($userProfile->ktp_image_mime) &&
                                !empty($userProfile->sim_image) &&
                                !empty($userProfile->sim_image_mime);
                        @endphp

                        @if ($profileComplete)
                            <!-- Payment Form Section -->
                            @auth
                                @php
                                    $userProfile = auth()->user()->userProfile;
                                    $profileComplete =
                                        $userProfile &&
                                        !empty($userProfile->full_name) &&
                                        !empty($userProfile->phone) &&
                                        !empty($userProfile->ktp_number) &&
                                        !empty($userProfile->sim_number) &&
                                        !empty($userProfile->ktp_image) &&
                                        !empty($userProfile->ktp_image_mime) &&
                                        !empty($userProfile->sim_image) &&
                                        !empty($userProfile->sim_image_mime);
                                @endphp

                                @if ($profileComplete)
                                    <!-- Payment Form Section -->
                                    <aside class="bg-white p-5 rounded-xl shadow-lg border border-white/20 order-2 lg:order-1">
                                        <div class="flex items-center gap-3 mb-6">
                                            <i class="bx bx-credit-card text-3xl text-orange-200"></i>
                                            <h5 class="font-bold text-xl text-gray-800">Book Your Rental</h5>
                                        </div>

                                        <!-- Order Summary -->
                                        <div
                                            class="bg-gradient-to-r from-orange-50 to-orange-100/50 rounded-lg p-4 mb-6 border border-orange-200/50">
                                            <h6 class="font-semibold text-gray-800 mb-3">Order Summary</h6>
                                            <div class="text-sm text-gray-600 space-y-2">
                                                <p>Car: {{ $car->brand }} {{ $car->model }}</p>
                                                <p>Rental Price: Rp. {{ number_format($car->price_per_day, 0, ',', '.') }}/day
                                                </p>
                                                <p id="summary-period" class="hidden">Rental Period: <span
                                                        id="summary-start-date"></span> to <span id="summary-end-date"></span>
                                                </p>
                                                <p id="summary-total" class="font-semibold text-orange-600 hidden">Total: Rp
                                                    <span id="total-amount"></span>
                                                </p>
                                            </div>
                                        </div>

                                        <form action="#" method="POST" class="space-y-5" id="payment-form">
                                            @csrf
                                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="order_id" id="order_id" value="">
                                            <input type="hidden" name="payment_token" id="payment_token" value="">
                                            <input type="hidden" name="rental_type" id="rental_type" value="days">

                                            <!-- Pickup and Dropoff Location -->
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="pickup_location"
                                                        class="block text-sm font-semibold text-gray-700 mb-2">Pickup
                                                        Location</label>
                                                    <h1>Jimbaran, Bali Indonesia</h1>
                                                </div>
                                            </div>

                                            <!-- Pickup and Dropoff Date -->
                                            <div class="grid grid-cols-1 gap-4">
                                                <div>
                                                    <label for="pickup_date"
                                                        class="block text-sm font-semibold text-gray-700 mb-2">Pickup Date &
                                                        Time</label>
                                                    <div class="flex gap-2">
                                                        <input type="date" name="pickup_date" id="pickup_date"
                                                            class="w-2/3 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-300 focus:border-transparent shadow-sm transition duration-200"
                                                            required>
                                                        <input type="time" name="pickup_time" id="pickup_time"
                                                            class="w-1/3 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-300 focus:border-transparent shadow-sm transition duration-200"
                                                            required>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="dropoff_date"
                                                        class="block text-sm font-semibold text-gray-700 mb-2">Dropoff Date &
                                                        Time</label>
                                                    <div class="flex gap-2">
                                                        <input type="date" name="dropoff_date" id="dropoff_date"
                                                            class="w-2/3 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-300 focus:border-transparent shadow-sm transition duration-200"
                                                            required>
                                                        <input type="time" name="dropoff_time" id="dropoff_time"
                                                            class="w-1/3 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-300 focus:border-transparent shadow-sm transition duration-200"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Optional Features -->
                                            <div>
                                                <label class="block text-sm font-semibold text-gray-700 mb-2">Optional
                                                    Features</label>
                                                <label class="flex items-center space-x-2 text-sm text-gray-600">
                                                    <input type="checkbox" name="baby_seat" value="1"
                                                        class="accent-orange-300">
                                                    <span>Baby Seat - Rp 150,000</span>
                                                </label>
                                            </div>

                                            <button type="button" id="pay-button"
                                                class="btn-primary w-full md:text-lg mt-4 py-3 flex justify-center items-center gap-2 relative">
                                                <svg id="pay-spinner" class="hidden animate-spin h-8 w-8 text-white"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                                        stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor"
                                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                    </path>
                                                </svg>
                                                <span id="pay-button-text">{{ __('messages.button.book_now') }}</span>
                                            </button>

                                        </form>
                                    </aside>

                                    <!-- Include Midtrans Snap.js -->
                                    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
                                        data-client-key="{{ config('midtrans.client_key') }}"></script>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const form = document.getElementById('payment-form');
                                            const payButton = document.getElementById('pay-button');
                                            const pickupDateInput = document.getElementById('pickup_date');
                                            const pickupTimeInput = document.getElementById('pickup_time');
                                            const dropoffDateInput = document.getElementById('dropoff_date');
                                            const dropoffTimeInput = document.getElementById('dropoff_time');
                                            const babySeatCheckbox = document.querySelector('input[name="baby_seat"]');
                                            const summaryPeriod = document.getElementById('summary-period');
                                            const summaryStartDate = document.getElementById('summary-start-date');
                                            const summaryEndDate = document.getElementById('summary-end-date');
                                            const summaryTotal = document.getElementById('summary-total');
                                            const totalAmount = document.getElementById('total-amount');
                                            const paySpinner = document.getElementById('pay-spinner');
                                            const payButtonText = document.getElementById('pay-button-text');

                                            const pricePerDay = {{ $car->price_per_day }};
                                            const babySeatPrice = 150000;

                                            function updateSummary() {
                                                if (pickupDateInput.value && dropoffDateInput.value) {
                                                    const startDate = new Date(`${pickupDateInput.value}T${pickupTimeInput.value || '00:00'}`);
                                                    const endDate = new Date(`${dropoffDateInput.value}T${dropoffTimeInput.value || '00:00'}`);

                                                    if (endDate < startDate) {
                                                        summaryPeriod.classList.add('hidden');
                                                        summaryTotal.classList.add('hidden');
                                                        alert('Waktu pengembalian tidak boleh sebelum waktu penjemputan.');
                                                        return;
                                                    }

                                                    let diffTime = endDate - startDate;
                                                    let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                                                    if (diffDays <= 0) {
                                                        diffDays = 1; // Minimal 1 hari
                                                    }

                                                    let total = pricePerDay * diffDays;
                                                    if (babySeatCheckbox.checked) {
                                                        total += babySeatPrice;
                                                    }

                                                    summaryPeriod.classList.remove('hidden');
                                                    summaryStartDate.textContent = startDate.toLocaleDateString('en-GB', {
                                                        timeZone: 'Asia/Makassar'
                                                    });
                                                    summaryEndDate.textContent = endDate.toLocaleDateString('en-GB', {
                                                        timeZone: 'Asia/Makassar'
                                                    });
                                                    summaryTotal.classList.remove('hidden');
                                                    totalAmount.textContent = total.toLocaleString('id-ID');
                                                }
                                            }

                                            pickupDateInput.addEventListener('change', updateSummary);
                                            pickupTimeInput.addEventListener('change', updateSummary);
                                            dropoffDateInput.addEventListener('change', updateSummary);
                                            dropoffTimeInput.addEventListener('change', updateSummary);
                                            babySeatCheckbox.addEventListener('change', updateSummary);

                                            updateSummary();

                                            payButton.addEventListener('click', function(e) {
                                                e.preventDefault();

                                                const startDate = new Date(`${pickupDateInput.value}T${pickupTimeInput.value || '00:00'}`);
                                                const endDate = new Date(`${dropoffDateInput.value}T${dropoffTimeInput.value || '00:00'}`);
                                                if (endDate < startDate) {
                                                    alert('Waktu pengembalian tidak boleh sebelum waktu penjemputan.');
                                                    return;
                                                }

                                                paySpinner.classList.remove('hidden');
                                                payButtonText.classList.add('hidden');
                                                payButton.disabled = true;

                                                const orderId = 'ORDER-' + Math.floor(Math.random() * 1000000);
                                                document.getElementById('order_id').value = orderId;

                                                const formData = new FormData(form);
                                                formData.append('order_id', orderId);
                                                //console.log(formData);
                                                fetch('{{ route('cars.rent.store') }}', {
                                                        method: 'POST',
                                                        body: formData,
                                                        headers: {
                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                        }
                                                    })
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        if (data.error) {
                                                            alert(data.error);
                                                            resetPayButton();
                                                            return;
                                                        }

                                                        window.snap.pay(data.snap_token, {
                                                            onSuccess: function(result) {
                                                                document.getElementById('payment_token').value = result
                                                                    .transaction_id;
                                                                //form.submit();
                                                                resetPayButton();
                                                            },
                                                            onPending: function(result) {
                                                                alert('Payment is pending. Please complete the payment.');
                                                                resetPayButton();
                                                            },
                                                            onError: function(result) {
                                                                alert('Payment failed. Please try again.');
                                                                resetPayButton();
                                                            },
                                                            onClose: function() {
                                                                alert('You closed the payment popup.');
                                                                resetPayButton();
                                                            }
                                                        });
                                                    })
                                                    .catch(error => {
                                                        console.error('Error:', error);
                                                        alert('An error occurred. Please try again.');
                                                        resetPayButton();
                                                    });

                                                function resetPayButton() {
                                                    paySpinner.classList.add('hidden');
                                                    payButtonText.classList.remove('hidden');
                                                    payButton.disabled = false;
                                                }
                                            });
                                        });
                                    </script>
                                @else
                                    <!-- Original Details Section -->
                                    <aside class="bg-white p-5 rounded-xl shadow-lg border border-white/20 order-2 lg:order-1">
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
                                                        <h5 class="font-semibold text-base md:text-xl lg:text-base">
                                                            {{ $item['label'] }}</h5>
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
                                                        <h5 class="font-semibold text-base md:text-xl lg:text-base">
                                                            Requirements
                                                        </h5>
                                                    </div>
                                                    <ul class="grid md:grid-cols-2 gap-2 text-left">
                                                        <li class=""><i class="bx bx-check text-green-500"></i> Valid
                                                            driver's license</li>
                                                        <li class=""><i class="bx bx-check text-green-500"></i> Minimum
                                                            age
                                                            21 years</li>
                                                        <li class=""><i class="bx bx-check text-green-500"></i> Security
                                                            deposit required</li>
                                                        <li class=""><i class="bx bx-check text-green-500"></i> Valid ID
                                                            card/passport</li>
                                                    </ul>
                                                </div>
                                                <div class="text-center mt-4">
                                                    <p class="text-shark-600 mb-2">Please complete your profile to proceed with
                                                        the
                                                        rental.</p>
                                                    <a href="{{ route('profile') }}"
                                                        class="btn-primary w-full md:text-lg py-3">Complete Your Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </aside>
                                @endif
                            @endauth
                        @else
                            <!-- Original Details Section -->
                            <aside class="bg-white p-5 rounded-xl shadow-lg border border-white/20 order-2 lg:order-1">
                                <div class="grid grid-cols-2 gap-4 md:gap-6 *:text-center">
                                    @forelse([
                                                                                                            ['icon' => 'bx-car', 'label' => 'Brand', 'value' => $car->brand],
                                                                                                            ['icon' => 'bx-calendar', 'label' => 'Model Year', 'value' => $car->year],
                                                                                                            ['icon' => 'bx-cog', 'label' => 'Transmission', 'value' => $car->transmission],
                                                                                                            ['icon' => 'bx-gas-pump', 'label' => 'Fuel Type', 'value' => $car->fuel_type],
                                                                                                            ['icon' => 'bx-group', 'label' => 'Seats', 'value' => $car->seats],
                                                                                                            ['icon' => 'bx-id-card', 'label' => 'License Plate', 'value' => $car->license_plate],
                                                                                                        ] as $item)
                                        <div>
                                            <div class="flex gap-1 items-center">
                                                <i class='bx {{ $item['icon'] }} text-2xl text-orange-200/80'></i>
                                                <h5 class="font-semibold text-base md:text-xl lg:text-base">
                                                    {{ $item['label'] }}</h5>
                                            </div>
                                            <p
                                                class="bg-shark-50/50 mt-1 md:mt-2 md:text-lg lg:text-base py-2 border border-orange-100/40 font-medium rounded-md capitalize">
                                                {{ $item['value'] }}
                                            </p>
                                        </div>
                                    @empty
                                        <p class="text-center text-shark-500">N/A</p>
                                    @endforelse
                                    <div class="col-span-2">
                                        <div class="border-t border-shark-400 pt-2">
                                            <div class="flex items-center gap-1 mb-3">
                                                <i class="bx bx-info-circle text-3xl text-orange-200"></i>
                                                <h5 class="font-semibold text-base md:text-xl lg:text-base">Requirements
                                                </h5>
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
                                        <div class="text-center mt-4">
                                            <p class="text-shark-600 mb-2">Please complete your profile to proceed with the
                                                rental.</p>
                                            <a href="{{ route('profile') }}" class="btn-primary w-full md:text-lg py-3">
                                                Complete Your Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        @endif
                    @else
                        <!-- Original Details Section for Unauthenticated Users -->
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
                                    <button onclick="showModal('{{ $car->id }}')"
                                        class="btn-primary w-full md:text-lg mt-4 py-3">
                                        {{ __('messages.button.rent_now') }}
                                    </button>
                                </div>
                            </div>
                        </aside>
                    @endauth

                    {{-- Description --}}
                    <aside class="bg-white p-5 rounded-xl shadow-lg border border-white/20 order-1">
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
                                class="bg-gradient-to-br from-orange-300 to-orange-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg pulse-ring">
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
                            <i class="bx bx-star text-orange-300 mr-2"></i>
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

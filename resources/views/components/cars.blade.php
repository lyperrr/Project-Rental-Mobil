@forelse ($cars as $car)
    <div class="group overflow-hidden bg-white shadow rounded-2xl border border-shark-100 hover:shadow-md">
        <div class="overflow-hidden">
            <a href="{{ route('cars.show', $car->id) }}">
                @if ($car->image_base64)
                    <img src="{{ $car->image_base64 }}"
                        class="w-full min-h-50 max-h-50 object-cover group-hover:scale-103 transition-all duration-150 ease-linear"
                        alt="{{ $car->brand . ' ' . $car->model }}" />
                @else
                    <div
                        class="w-full min-h-50 max-h-50 flex items-center justify-center bg-gray-100 group-hover:scale-103 transition-all duration-150 ease-linear">
                        <i class='bx bx-car text-6xl text-shark-400'></i>
                    </div>
                @endif
            </a>
        </div>
        <div class="p-4">
            <div class="w-fit">
                <a href="{{ route('cars.show', $car->id) }}">
                    <h2 class="text-lg font-semibold hover:text-orange-200 transition-all duration-150 ease-linear">
                        {{ $car->brand }} {{ $car->model }}
                    </h2>
                </a>
            </div>
            <div
                class="grid grid-cols-3 lg:grid-cols-2 opacity-70 gap-1 py-4 border-b border-shark-950/50 font-medium text-sm">
                <div class="flex items-center gap-1 font-medium">
                    <i class='bx bx-cog text-xl lg:text-2xl xl:text-xl font-normal'></i>
                    <span>{{ ucfirst($car->transmission) }}</span>
                </div>
                <div class="flex items-center gap-1 font-medium">
                    <i class='bx bx-car text-xl lg:text-2xl xl:text-xl font-normal'></i>
                    <span>{{ $car->fuel_type ? ucfirst($car->fuel_type) : 'N/A' }}</span>
                </div>
                <div class="flex items-center gap-1 font-medium">
                    <i class='bx bxs-calendar text-xl lg:text-2xl xl:text-xl font-normal'></i>
                    <span>{{ $car->year ?? 'N/A' }}</span>
                </div>
                <div class="flex items-center gap-1 font-medium">
                    <i class='bx bx-group text-xl lg:text-2xl xl:text-xl font-normal'></i>
                    <span>{{ $car->seats }} People</span>
                </div>
            </div>
            <div class="flex items-center justify-between mt-2">
                <article class="font-medium">
                    <span class="text-sm flex items-center gap-1.5 opacity-70">
                        <i class='bx bxs-purchase-tag text-xl'></i>
                        <span>{{ __('messages.sections.rent_page.rent_price') }}</span>
                    </span>
                    <p class="text-orange-200 font-semibold text-base">
                        Rp. {{ number_format($car->price_per_day, 0, ',', '.') }} / day
                    </p>
                </article>
                <a href="{{ route('cars.show', $car->id) }}" class="btn-primary lg:text-sm px-4">
                    {{ __('messages.button.rent_now') }}
                </a>
            </div>
        </div>
    </div>
@empty
    <div class="col-span-full text-center py-8">
        <div class="flex flex-col items-center justify-center">
            <i class='bx bx-car text-5xl text-gray-400 mb-4'></i>
            <h3 class="text-xl font-semibold text-gray-600">No Cars Available</h3>
            <p class="text-gray-500 mt-2">Sorry, no cars are available for rent at the moment. Please check back later!
            </p>
            <a href="{{ route('cars.home') }}" class="mt-4 btn-primary px-4 py-2">
                Back to Home
            </a>
        </div>
    </div>
@endforelse

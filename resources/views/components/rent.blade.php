<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach (__('messages.sections.rentPage.cars') as $car)
        <div class="group overflow-hidden bg-white shadow rounded-2xl border border-shark-100 hover:shadow-md">
            <div class="overflow-hidden">
                <a href="" >
                    <img src="{{ $car['image'] }}"
                        class="w-full min-h-50 max-h-50 object-cover group-hover:scale-103 transition-all duration-150 ease-linear"
                        alt="Car" />
                </a>
            </div>
            <div class="p-4 ">
                <div class="w-fit">
                    <a href="">
                        <h2 class="text-lg font-semibold hover:text-orange-200 transition-all duration-150 ease-linear">
                            {{ $car['title'] }}</h2>
                    </a>
                </div>
                <div class="grid grid-cols-3 lg:grid-cols-2 opacity-70 gap-1 py-4 border-b border-shark-950/50 font-medium text-sm">
                    <div class="flex items-center gap-1 font-medium">
                        <i class='bx bx-cog text-xl lg:text-2xl xl:text-xl font-normal'></i>
                        <span>Manual</span>
                    </div>
                    <div class="flex items-center gap-1 font-medium">
                        <i class='bx bx-car text-xl lg:text-2xl xl:text-xl font-normal'></i>
                        <span>Sedan</span>
                    </div>
                    <div class="flex items-center gap-1 font-medium">
                        <i class='bx bxs-calendar text-xl lg:text-2xl xl:text-xl font-normal'></i>
                        <span>2022</span>
                    </div>
                    <div class="flex items-center gap-1 font-medium">
                        <i class='bx bx-group text-xl lg:text-2xl xl:text-xl font-normal'></i>
                        <span>4 People</span>
                    </div>
                </div>

                {{-- Price & Button --}}
                <div class="flex items-center justify-between mt-2">
                    <article class="font-medium">
                        <span class="text-sm flex items-center gap-1.5 opacity-70">
                            <i class='bx bxs-purchase-tag text-xl'></i>
                            <span>Rental price</span>
                        </span>
                        <p class="text-orange-200 font-semibold text-lg">Rp.
                            {{ $car['price'] }} /
                            {{ $car['duration'] }}
                        </p>
                    </article>
                    <a href="/rent-detail" class="btn-primary lg:text-sm px-4">
                        {{ __('messages.button.rent_now') }}
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

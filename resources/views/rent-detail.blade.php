<x-layout>
    <x-slot:title>Rent Detail</x-slot:title>

    {{-- Navbar --}}
    <x-navbar />
    <section class="">
        <div class="bg-hero h-[30vh] lg:h-[40vh] bg-center bg-cover bg-no-repeat flex justify-center items-center">
            <p class="text-white text-3xl font-medium">
            Rent Detail
            </p>
        </div>
    </section>

    {{-- Vehicle Detail Section --}}
    <section class="container py-12 grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-4">
        {{-- Image Section --}}
        <div class="text-center">
            <div class="overflow-hidden rounded-2xl shadow-sm">
                <img src="https://img.freepik.com/free-psd/red-isolated-car_23-2151852884.jpg?ga=GA1.1.1193633351.1743924281&semt=ais_hybrid&w=740"
                    alt="Car Image" class="w-full object-cover rounded-md" />
            </div>
            <div
                class="flex flex-col sm:flex-row items-center justify-between mt-4 gap-2 sm:gap-0 px-4 sm:px-6 md:px-12 w-full">
                <h2 class="text-2xl font-semibold text-black">Acura Sport Version</h2>
                <div class="bg-orange-500 text-white text-xl sm:text-2xl font-semibold px-6 py-2 rounded">
                    $49,078.00
                </div>
            </div>
        </div>

        <section>
            {{-- Detail Card --}}
            <div class=" bg-white rounded-xl p-6 shadow-sm border/50">
                {{-- Grid of Info --}}
                <div class="grid grid-cols-2 gap-4 text-sm text-center">
                    @for ($i = 0; $i < 6; $i++)
                        <div>
                            <div class="text-lg font-semibold text-black mb-1">Brand</div>
                            <div
                                class="text-black text-base font-medium border border-orange-300 rounded-sm px-3 py-1 inline-block">
                                <span>🚗</span> Honda
                            </div>
                        </div>
                    @endfor
                </div>

                {{-- Price & Button --}}
                <div class="mt-8">
                    <div
                        class="flex items-center justify-between text-white bg-orange-100/70 h-20 px-4 py-2 rounded-lg mb-2">
                        <span class="text-lg font-medium ">Rental Price</span>
                        <span class="text-lg font-bold ">$49,078.00</span>
                    </div>
                    <button class="w-full btn-primary sm:py-4 sm:text-lg lg:text-base">
                        Rent Now
                    </button>
                </div>
            </div>
        </section>
    </section>



    <section class="container">

        {{-- Tab Section --}}
        <div class="border border-orange-400 rounded-md  bg-white overflow-x-auto">
            <div
                class="flex justify-between text-center text-lg font-semibold text-black divide-x divide-white whitespace-nowrap min-w-max">
                <button class="w-full py-3 hover:bg-orange-50 focus:bg-orange-200 focus:outline-none">Rent
                    Details</button>
                <button
                    class="w-full py-3 hover:bg-orange-50 focus:bg-orange-200 focus:outline-none">Description</button>
                <button class="w-full py-3 hover:bg-orange-50 focus:bg-orange-200 focus:outline-none">Reviews</button>
            </div>
        </div>

        {{-- Rent Detail Grid --}}
        <div class="p-8 bg-white shadow-md rounded-md  mt-4 mb-20">
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @for ($i = 0; $i < 9; $i++)
                    <div class="text-center">
                        <h3 class="text-lg font-bold">Rent Details</h3>
                        <p class="text-sm text-gray-600">Rent Details</p>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <x-footer />
</x-layout>

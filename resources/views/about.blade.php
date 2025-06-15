<x-layout>
    {{-- Title --}}
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Navbar --}}
    <x-navbar />
    <section
        class="relative text-3xl font-bold text-center mb-4 flex items-center justify-center text-white h-[60vh] overflow-hidden group">
        <!-- Background dengan hover scale -->
        <div
            class="absolute inset-0 bg-hero-blog bg-cover bg-top transition-transform duration-700 ease-out group-hover:scale-110">
        </div>

        <!-- Teks yang tidak terpengaruh scale -->
        <h1 class="relative z-10">About Company</h1>
    </section>

    <section class="py-16">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 items-center text-center lg:text-left">
                <div class="overflow-hidden rounded-xl shadow-xl">
                    <img src="https://i.pinimg.com/736x/f7/0d/7c/f70d7c16ed2f811edfdd4fc5eb0adf9f.jpg" alt="Hero Image"
                        class="w-full hover:scale-105 hover:rotate-1 h-full transition-all duration-200 ease-linear" />
                </div>
                <div class="">
                    <h1 class="title lg:mx-0">
                        About Company
                    </h1>
                    <p
                        class="text-2xl sm:text-xl lg:text-2xl font-bold mb-4 leading-tight bg-gradient-to-r from-orange-300 to-orange-100 bg-clip-text text-transparent">
                        You Start The Engine and Your Advanture Begin
                    </p>
                    <p class="text-base text-gray-600 max-w-xl">
                        Kami adalah perusahaan yang bergerak di bidang otomotif dan petualangan, menyediakan kendaraan
                        berkualitas serta layanan terbaik untuk menemani setiap langkah perjalanan Anda. Dengan semangat
                        eksplorasi, kami percaya bahwa setiap perjalanan adalah awal dari cerita baru — dan semuanya
                        dimulai saat Anda menyalakan mesin.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-br from-orange-100 to-orange-300 text-white py-12 xl:py-20">
        <div class="container text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold mb-4 drop-shadow-md">Save Big With Our Cheap Car Rental!</h2>
            <p class="my-4 md:my-0 text-lg font-semibold"><b>Top Outlet. Local Suppliers. 24/7 Support</b></p>
            <div class="flex justify-center gap-4 mt-10">
                <a href="/rent"
                    class="bg-white text-orange-600 border-2 border-white px-8 py-2 rounded-full font-semibold text-base hover:text-white hover:bg-orange-100 hover:text-orange-700 transition-all duration-300 ease-in-out transform hover:scale-105">
                    Book Ride
                </a>
                <a href="/contact"
                    class="bg-transparent text-white border-2 border-white px-8 py-2 flex items-center rounded-full font-semibold text-base hover:bg-white hover:text-orange-600 transition-all duration-300 ease-in-out transform hover:scale-105">
                    Contact Us <i class="bx bxs-phone text-xl ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container">
            <div class="grid grid-cols-1 xl:grid-cols-2 items-center justify-between gap-12 text-center lg:text-left">
                <div class="">
                    <p class="badge w-fit mx-auto xl:mx-0">Why Choose Us</p>
                    <h2
                        class="text-4xl md:text-5xl text-center xl:text-left lg:max-w-xl xl:max-w-none mx-auto font-extrabold mb-6 leading-tight">
                        Experience Excellence In Every Mile
                    </h2>
                    <p
                        class="text-base sm:text-lg lg:text-xl max-w-2xl text-center mx-auto xl:text-left xl:mx-0 text-shark-600 leading-relaxed mb-10">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor minus in nemo nostrum totam aut
                        eveniet, saepe corrupti sed nobis autem voluptates atque iste dolorum nam corporis placeat
                        earum.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="text-left flex items-start">
                            <i class="bx bx-check-circle text-orange-500 text-3xl mr-3 mt-1"></i>
                            <div>
                                <h3 class="text-xl font-bold">Transparansi Harga</h3>
                                <p class="text-base text-shark-600">Tidak ada biaya tersembunyi, semua jelas di awal.
                                </p>
                            </div>
                        </div>
                        <div class="text-left flex items-start">
                            <i class="bx bx-car text-orange-500 text-3xl mr-3 mt-1"></i>
                            <div>
                                <h3 class="text-xl font-bold">Armada Terbaru</h3>
                                <p class="text-base text-shark-600">Beragam pilihan mobil terbaru dan terawat.</p>
                            </div>
                        </div>
                        <div class="text-left flex items-start">
                            <i class="bx bx-support text-orange-500 text-3xl mr-3 mt-1"></i>
                            <div>
                                <h3 class="text-xl font-bold">Dukungan 24/7</h3>
                                <p class="text-base text-shark-600">Tim kami siap membantu kapan saja Anda butuhkan.</p>
                            </div>
                        </div>
                        <div class="text-left flex items-start">
                            <i class="bx bx-map text-orange-500 text-3xl mr-3 mt-1"></i>
                            <div>
                                <h3 class="text-xl font-bold">Lokasi Penjemputan Fleksibel</h3>
                                <p class="text-base text-shark-600">Ambil dan kembalikan mobil di tempat yang nyaman
                                    bagi
                                    Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:hidden xl:block lg:max-w-2xl mx-auto rounded-xl shadow-2xl overflow-hidden">
                    <img src="https://media.istockphoto.com/id/820863404/photo/ford-mustang.jpg?s=612x612&w=0&k=20&c=58ajYzeJSW8hr7tU4kaEwalHTArjfDK_udrop-1fnxQ="
                        alt="Sporty car demonstrating excellence"
                        class="w-full hover:scale-105 transition-all duration-200 ease-linear transform hover:-rotate-1" />
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 mx-auto bg-black/40 md:bg-transparent">
        <div class="container text-center">
            <div class="md:bg-black/40 md:rounded-2xl md:py-20">
                <p class="badge w-fit mx-auto">Save Big With Our Cheap Car Rental!</p>
                <h2 class="text-2xl lg:text-3xl text-white font-bold mt-4">Save Big With Our Cheap Car Rental!</h2>
                <p class="my-2 text-white"><b>Top Outlet. Local Suppliers. 24/7 Support</b></p>
                <div class="flex justify-center mt-10">
                    <a href="/rent" class="btn-primary px-4 py-2 rounded font-semibold">Book Ride</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Any Questions --}}
    <x-any-questions />

    {{-- Footer --}}
    <x-footer />
    {{-- Scroll Up --}}
    <x-scroll-up />
</x-layout>

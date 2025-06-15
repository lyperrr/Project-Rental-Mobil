<x-layout>
    {{-- Title --}}
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Container Content --}}
    <main class="h-screen sm:h-[110vh] bg-no-repeat bg-cover bg-top bg-hero-blog" >
        {{-- Navbar --}}
        <x-navbar />

        {{-- Hero Section --}}
        <section id="hero" class="">
            <div class="container">
                <div class="flex items-center justify-center h-screen">
                    <div class="text-center text-white">
                        <article>
                            <span class="badge">Blog Terpercaya</span>
                            <h1 class="title text-5xl">
                                Temukan Inspirasi <span class="text-orange-200">Setiap Hari</span>
                            </h1>
                            <p class="paragraph text-white text-lg">
                                Baca artikel menarik, tips berguna, dan cerita inspiratif yang akan memperkaya wawasan Anda setiap hari
                            </p>
                        </article>

                        <div class="mt-6 flex justify-center">
                            <a href=""
                                class="btn-outline gap-2 border-white text-white hover:border-orange-100 hover:text-orange-100 px-6 py-2  rounded-lg inline-flex items-center">
                                Lihat Artikel
                                <i class='bx bx-right-arrow-alt text-2xl ml-2'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- Featured Posts --}}
    <section class="py-10">
        <div class="container">
            <article class="text-center mb-10">
                <span class="badge">Artikel Pilihan</span>
                <h1 class="title">Artikel Terpopuler</h1>
                <p class="paragraph">Temukan artikel-artikel terbaik yang paling banyak dibaca dan disukai oleh pembaca kami</p>
            </article>
            <div class="grid lg:grid-cols-3 gap-6">
                <!-- Artikel 1 - Mobil -->
                <article class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group border border-slate-200 flex flex-col relative p-4">
                    <div class="h-48 overflow-hidden relative rounded-lg">
                        <img src="{{ asset('img/hero_section-blog.jpg') }}" alt="Mobil Bali"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6 relative flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-slate-800 hover:text-orange-600 transition-colors duration-300 mb-3 leading-tight">
                            <a href="#" class="block">Mobil Terbaru di Bali yang Dapat Anda Sewa</a>
                        </h3>
                        <p class="text-slate-600 mb-4 leading-relaxed flex-grow">
                            Temukan mobil sewaan terbaik di Bali yang cocok untuk perjalanan Anda bersama keluarga atau teman.
                        </p>
                        <div class="flex items-center justify-between mt-auto">
                            <p class="text-slate-500 text-sm">15 Jun 2025</p>
                            <a href="#" class="btn-primary text-sm bg-orange-500 text-white rounded-full px-6 py-2 hover:bg-orange-600 transition-colors duration-300">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Artikel 2 - Mobil -->
                <article class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group border border-slate-200 flex flex-col relative p-4">
                    <div class="h-48 overflow-hidden relative rounded-lg">
                        <img src="{{ asset('img/hero_section-blog.jpg') }}" alt="Mobil Bali"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6 relative flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-slate-800 hover:text-orange-600 transition-colors duration-300 mb-3 leading-tight">
                            <a href="#" class="block">Mobil Hemat BBM untuk Liburan Bali</a>
                        </h3>
                        <p class="text-slate-600 mb-4 leading-relaxed flex-grow">
                            Temukan pilihan mobil dengan efisiensi bahan bakar terbaik untuk pengalaman liburan yang lebih hemat dan nyaman di Bali dan keren dan nyaman.
                        </p>
                        <div class="flex items-center justify-between mt-auto">
                            <p class="text-slate-500 text-sm">17 Jun 2025</p>
                            <a href="#" class="btn-primary text-sm bg-orange-500 text-white rounded-full px-6 py-2 hover:bg-orange-600 transition-colors duration-300">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Artikel 3 - Mobil -->
                <article class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group border border-slate-200 flex flex-col relative p-4">
                    <div class="h-48 overflow-hidden relative rounded-lg">
                        <img src="{{ asset('img/hero_section-blog.jpg') }}" alt="Mobil Bali"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6 relative flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-slate-800 hover:text-orange-600 transition-colors duration-300 mb-3 leading-tight">
                            <a href="#" class="block">Mobil Keluarga Terbaik untuk Wisata Bali</a>
                        </h3>
                        <p class="text-slate-600 mb-4 leading-relaxed flex-grow">
                            Temukan mobil keluarga yang nyaman dan cocok untuk membawa seluruh anggota keluarga menjelajahi Bali.
                        </p>
                        <div class="flex items-center justify-between mt-auto">
                            <p class="text-slate-500 text-sm">20 Jun 2025</p>
                            <a href="#" class="btn-primary text-sm bg-orange-500 text-white rounded-full px-6 py-2 hover:bg-orange-600 transition-colors duration-300">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Artikel 4 - Wisata Bali -->
                <article class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group border border-slate-200 flex flex-col relative p-4">
                    <div class="h-48 overflow-hidden relative rounded-lg">
                        <img src="{{ asset('img/hero_section-blog.jpg') }}" alt="Wisata Bali"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6 relative flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-slate-800 hover:text-orange-600 transition-colors duration-300 mb-3 leading-tight">
                            <a href="#" class="block">Wisata Alam Terbaik di Bali yang Harus Dikunjungi</a>
                        </h3>
                        <p class="text-slate-600 mb-4 leading-relaxed flex-grow">
                            Jelajahi keindahan wisata alam yang memukau dan tak terlupakan di Bali, mulai dari hamparan pantai berpasir putih yang menenangkan.
                        </p>
                        <div class="flex items-center justify-between mt-auto">
                            <p class="text-slate-500 text-sm">23 Jun 2025</p>
                            <a href="#" class="btn-primary text-sm bg-orange-500 text-white rounded-full px-6 py-2 hover:bg-orange-600 transition-colors duration-300">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Artikel 5 - Wisata Bali -->
                <article class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group border border-slate-200 flex flex-col relative p-4">
                    <div class="h-48 overflow-hidden relative rounded-lg">
                        <img src="{{ asset('img/hero_section-blog.jpg') }}" alt="Wisata Bali"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6 relative flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-slate-800 hover:text-orange-600 transition-colors duration-300 mb-3 leading-tight">
                            <a href="#" class="block">Destinasi Wisata Bali yang Instagramable</a>
                        </h3>
                        <p class="text-slate-600 mb-4 leading-relaxed flex-grow">
                            Temukan spot-spot wisata di Bali yang cocok untuk berfoto dan mendapatkan foto Instagram yang menakjubkan.
                        </p>
                        <div class="flex items-center justify-between mt-auto">
                            <p class="text-slate-500 text-sm">25 Jun 2025</p>
                            <a href="#" class="btn-primary text-sm bg-orange-500 text-white rounded-full px-6 py-2 hover:bg-orange-600 transition-colors duration-300">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Artikel 6 - Wisata Bali -->
                <article class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group border border-slate-200 flex flex-col relative p-4">
                    <div class="h-48 overflow-hidden relative rounded-lg">
                        <img src="{{ asset('img/hero_section-blog.jpg') }}" alt="Wisata Bali"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6 relative flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-slate-800 hover:text-orange-600 transition-colors duration-300 mb-3 leading-tight">
                            <a href="#" class="block">Panduan Wisata Bali: Kuliner dan Keindahan Alam</a>
                        </h3>
                        <p class="text-slate-600 mb-4 leading-relaxed flex-grow">
                            Temukan berbagai tempat kuliner di Bali yang wajib dicoba dan nikmati keindahan alam yang menenangkan.
                        </p>
                        <div class="flex items-center justify-between mt-auto">
                            <p class="text-slate-500 text-sm">28 Jun 2025</p>
                            <a href="#" class="btn-primary text-sm bg-orange-500 text-white rounded-full px-6 py-2 hover:bg-orange-600 transition-colors duration-300">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
{{-- Load More Articles Button Section --}}
<section class="py-8">
    <div class="container">
        <div class="text-center">
            <a href="#"
                class="btn-primary bg-orange-500 text-white rounded-full px-6 py-3 hover:bg-orange-600 transition-colors duration-300 inline-flex items-center gap-2 text-lg">
                Lihat Lebih Banyak Artikel
                <i class='bx bx-chevron-down text-2xl'></i>
            </a>
        </div>
    </div>
</section>


    {{-- Newsletter Section --}}
    <section class="py-10 bg-newsletter_section bg-center bg-no-repeat bg-cover" style="background-color: #2c2c2c;">
        <div class="container">
            <div class="h-[70vh] bg-black bg-opacity-70 rounded-xl flex items-center justify-center">
                <article class="text-white text-center max-w-2xl px-4">
                    <span class="badge text-white">Newsletter</span>
                    <h1 class="text-3xl font-bold my-4 text-gray-100">Dapatkan Update Artikel Terbaru</h1>
                    <p class="mb-6 text-gray-200">Subscribe newsletter kami dan dapatkan notifikasi artikel terbaru yang menarik untuk dibaca</p>
                    <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                        <input type="email" placeholder="Masukkan email Anda"
                            class="flex-1 px-4 py-3 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-orange-500 border-white border" required>
                        <button type="submit" class="btn-primary gap-2 group">
                            Subscribe
                            <i class='bx bx-envelope text-xl'></i>
                        </button>
                    </form>
                </article>
            </div>
        </div>
    </section>
    
    {{-- Footer --}}
    <x-footer />

    {{-- Scroll Up --}}
    <x-scroll-up />
</x-layout>
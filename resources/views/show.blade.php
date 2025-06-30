<x-layout>
    {{-- Title --}}
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Article Content --}}
    <main class="py-16 container">
        <div class="sm:max-w-3xl bg-white rounded-2xl overflow-hidden shadow-md group mx-auto">

            <div class="overflow-hidden">
                @if ($blog->image)
                    <img src="{{ route('blog.image', $blog->id) }}" 
                         alt="{{ $blog->title }}"
                         class="w-full h-full object-cover group-hover:scale-103 transition-all duration-150 ease-linear">
                @else
                    <div class="w-full min-h-50 max-h-50 object-cover flex justify-center items-center group-hover:scale-103 transition-all duration-150 ease-linear">
                        <i class="bx bx-image text-6xl text-gray-400"></i>
                    </div>
                @endif
            </div>

            {{-- Article Header --}}
            <article class="">
                {{-- Article Content --}}
                <div class="p-8">
                    {{-- Article Meta --}}
                    <div class="flex items-center justify-between mb-6 pb-6 border-b border-gray-200">
                        <div class="flex items-center space-x-4">
                            <span class="badge">Artikel</span>
                            <time class="text-gray-500 text-sm">{{ $blog->formatted_created_at }}</time>
                        </div>
                        <div class="flex items-center space-x-3">
                            {{-- Share Buttons --}}
                            <span class="text-gray-500 text-sm">Bagikan:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                               target="_blank" 
                               class="text-blue-600 hover:text-blue-800 transition-colors duration-200 p-2 rounded-full hover:bg-blue-50">
                                <i class='bx bxl-facebook text-xl'></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}" 
                               target="_blank" 
                               class="text-blue-400 hover:text-blue-600 transition-colors duration-200 p-2 rounded-full hover:bg-blue-50">
                                <i class='bx bxl-twitter text-xl'></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . request()->url()) }}" 
                               target="_blank" 
                               class="text-green-600 hover:text-green-800 transition-colors duration-200 p-2 rounded-full hover:bg-green-50">
                                <i class='bx bxl-whatsapp text-xl'></i>
                            </a>
                        </div>
                    </div>

                    {{-- Article Title --}}
                    <h1 class="text-4xl font-bold text-gray-900 mb-6 leading-tight">{{ $blog->title }}</h1>

                    {{-- Article Description --}}
                    @if($blog->description)
                    <div class="text-xl text-gray-600 mb-8 leading-relaxed italic border-l-4 border-orange-500 pl-6 bg-orange-50 py-4 rounded-r-lg">
                        {{ $blog->description }}
                    </div>
                    @endif

                    {{-- Since there's no `content` field --}}
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-600">Konten artikel sedang dalam proses penulisan lebih lanjut...</p>
                    </div>

                    {{-- Article Footer --}}
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <div class="flex items-center justify-between flex-col sm:flex-row mt-2">
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-500 text-sm">Artikel ini dipublikasikan pada:</span>
                                <time class="text-gray-900 font-medium">{{ $blog->formatted_created_at }}</time>
                            </div>
                            <a href="/blog#featured-posts"
                               class="btn-primary flex items-center gap-1 mt-2 w-full sm:w-auto">
                                <i class='bx bx-arrow-back'></i>
                                Kembali ke Blog
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </main>

    {{-- Related Articles - Grid Layout (3 Articles) --}}
    @if($relatedBlogs->count() > 0)
    <section class="py-16 bg-white">
        <div class="container ">
            <div class="text-center mb-12">
                <span class="badge">Artikel Lainnya</span>
                <h2 class="text-3xl font-bold text-gray-900 mt-4">Artikel Terkait</h2>
                <p class="text-gray-600 mt-2">Baca artikel menarik lainnya yang mungkin Anda suka</p>
            </div>

            {{-- Articles Grid (3 columns) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-4">
                @foreach($relatedBlogs->take(3) as $related)
                <article class="bg-gray-50 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group">
                    {{-- Reduced Image Container for Related Articles --}}
                    <div class="w-full h-40 overflow-hidden">
                        @if ($related->image)
                            <img src="{{ route('blog.image', $related->id) }}" 
                                 alt="{{ $related->title }}"
                                 class="w-full min-h-50 max-h-50 object-cover group-hover:scale-103 transition-all duration-150 ease-linear">
                        @else
                            <div class="w-full min-h-50 max-h-50 object-cover group-hover:scale-103 transition-all duration-150 ease-linear bg-shark-50 flex items-center justify-center">
                                <i class='bx bx-image text-7xl text-gray-400'></i>
                            </div>
                        @endif
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-900 hover:text-orange-600 transition-colors duration-300 mb-3 line-clamp-2">
                            <a href="{{ route('show', $related->id) }}">{{ $related->title }}</a>
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3 text-sm">
                            {{ $related->excerpt }}
                        </p>
                        <div class="flex items-center justify-between">
                            <time class="text-gray-500 text-xs">{{ $related->formatted_created_at }}</time>
                            <a href="{{ route('show', $related->id) }}" 
                               class="text-orange-600 hover:text-orange-800 font-medium text-sm hover:underline inline-flex items-center gap-1">
                                Baca Selengkapnya <i class='bx bx-right-arrow-alt text-lg'></i>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CSS for line-clamp --}}
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    @endif

    {{-- Footer --}}
    <x-footer />

    {{-- Scroll Up --}}
    <x-scroll-up />
</x-layout>
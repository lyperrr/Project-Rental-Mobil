<x-layout>
    {{-- Title --}}
    <x-slot:title>{{ $title }}</x-slot:title>

    <main class="h-screen sm:h-[110vh] bg-no-repeat bg-cover bg-top bg-hero-blog">
        {{-- Navbar --}}
        <x-navbar />

        {{-- Hero Section --}}
        <section id="hero">
            <div class="container">
                <div class="flex items-center justify-center h-screen">
                    <div class="text-center text-white">
                        <article>
                            <span class="badge">{{ __('messages.sections.blog_page.article.badge') }}</span>
                            <h1 class="title text-5xl">
                                {{ __('messages.sections.blog_page.article.text') }} <span class="text-orange-200">Every
                                    Day</span>
                            </h1>
                            <p class="paragraph text-white text-lg">
                                {{ __('messages.sections.blog_page.article.paragraph') }}
                            </p>
                        </article>

                        <div class="mt-6 flex justify-center">
                            <a href="#featured-posts"
                                class="btn-outline gap-2 border-white text-white hover:border-orange-100 hover:text-orange-100 px-6 py-2 rounded-lg inline-flex items-center">
                                {{ __('messages.button.view_article') }}
                                <i class='bx bx-right-arrow-alt text-2xl ml-2'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- Featured Posts --}}
    <section id="featured-posts" class="py-18">
        <div class="container">
            <article class="text-center mb-10">
                <span class="badge">{{ __('messages.sections.blog_page.container.badge') }}</span>
                <h1 class="title">{{ __('messages.sections.blog_page.container.title') }}</h1>
                <p class="paragraph">{{ __('messages.sections.blog_page.container.paragraph') }}</p>
            </article>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-4">
                @forelse($featuredPosts as $post)
                    <article
                        class="bg-gray-50 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group">
                        {{-- Image Section --}}
                        <div class="w-full h-40 overflow-hidden">
                            @if ($post->image)
                                <img src="{{ route('blog.image', $post->id) }}" alt="{{ $post->title }}"
                                    class="w-full min-h-50 max-h-50 object-cover group-hover:scale-103 transition-all duration-150 ease-linear">
                            @else
                                <div
                                    class="w-full min-h-50 max-h-50 object-cover group-hover:scale-103 transition-all duration-150 ease-linear bg-slate-100 flex items-center justify-center">
                                    <i class='bx bx-image text-7xl text-gray-400'></i>
                                </div>
                            @endif
                        </div>

                        {{-- Content Section --}}
                        <div class="p-6">
                            <h3
                                class="text-lg font-bold text-slate-800 hover:text-orange-600 transition-colors duration-300 mb-3 line-clamp-2">
                                <a href="{{ route('show', $post->id) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-slate-600 mb-4 leading-relaxed line-clamp-3 text-sm">
                                {{ $post->excerpt }}
                            </p>
                            <div class="flex items-center justify-between">
                                <time class="text-slate-500 text-xs">{{ $post->formatted_created_at }}</time>
                                <a href="{{ route('show', $post->id) }}"
                                    class="btn-primary group gap-2 lg:text-sm">
                                    {{ __('messages.button.read_more') }}
                                    <i class='bx bx-right-arrow-alt text-lg group-hover:translate-x-1'></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-8">
                        <p class="text-slate-600 text-lg">
                            {{ __('messages.sections.blog_page.all_articles.empty_message') }}</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    {{-- All Posts Section --}}
    @if ($allPosts->count() > 0)
        <section class="py-10 bg-slate-50">
            <div class="container">
                <article class="text-center mb-10">
                    <span class="badge">{{ __('messages.blog_page.all_articles.badge') }}</span>
                    <h1 class="title">{{ __('messages.blog_page.all_articles.title') }}</h1>
                    <p class="paragraph">{{ __('messages.blog_page.all_articles.paragraph') }}</p>
                </article>

                <div class="grid lg:grid-cols-3 gap-6">
                    @foreach ($allPosts as $post)
                        <article
                            class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group border border-slate-200 flex flex-col relative p-4">
                            <div class="h-48 overflow-hidden relative rounded-lg">
                                <img src="{{ $post->image ? route('blog.image', $post->id) : asset('img/hero_section-blog.jpg') }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-6 relative flex flex-col flex-grow">
                                <h3
                                    class="text-xl font-bold text-slate-800 hover:text-orange-600 transition-colors duration-300 mb-3 leading-tight">
                                    <a href="{{ route('show', $post->id) }}" class="block">{{ $post->title }}</a>
                                </h3>
                                <p class="text-slate-600 mb-4 leading-relaxed flex-grow">
                                    {{ $post->excerpt }}
                                </p>
                                <div class="flex items-center justify-between mt-auto">
                                    <p class="text-slate-500 text-sm">{{ $post->formatted_created_at }}</p>
                                    <a href="{{ route('show', $post->id) }}"
                                        class="btn-primary text-sm bg-orange-500 text-white rounded-full px-6 py-2 hover:bg-orange-600 transition-colors duration-300">
                                        {{ __('messages.button.read_more') }}
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-8 flex justify-center">
                    {{ $allPosts->links() }}
                </div>
            </div>
        </section>
    @endif

    {{-- Newsletter Section --}}
    <section class="py-10 bg-newsletter_section bg-center bg-no-repeat bg-cover" style="background-color: #2c2c2c;">
        <div class="container">
            <div class="h-[70vh] bg-black bg-opacity-70 rounded-xl flex items-center justify-center">
                <article class="text-white text-center max-w-2xl px-4">
                    <span
                        class="badge text-white">{{ __('messages.sections.blog_page.newsletter_section.span') }}</span>
                    <h1 class="text-3xl font-bold my-4 text-gray-100">
                        {{ __('messages.sections.blog_page.newsletter_section.text') }}
                    </h1>
                    <p class="mb-6 text-gray-200">
                        {{ __('messages.sections.blog_page.newsletter_section.paragraph') }}.
                    </p>
                    <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                        <input type="email"
                            placeholder="{{ __('messages.sections.blog_page.newsletter_section.placeholder') }}"
                            class="flex-1 px-4 py-3 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-orange-500 border-white border"
                            required>
                        <button type="submit" class="btn-primary gap-2 group">
                            {{ __('messages.sections.blog_page.newsletter_section.subscribe') }}
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

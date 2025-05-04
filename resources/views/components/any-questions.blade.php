<section class="py-10">
    <div class="container">
        <div class="">
            <article class="text-left sm:text-center">
                <span class="badge">{{ __('messages.sections.components.any_questions_section.badge') }}</span>
                <h1 class="title">{{ __('messages.sections.components.any_questions_section.title') }}</span></h1>
                <p class="paragraph">
                    {{ __('messages.sections.components.any_questions_section.paragraph') }}
                </p>
            </article>

            @php
                $faqs = __('messages.sections.components.any_questions_section.dropdown');
                $half = ceil(count($faqs) / 2);
                $left = array_slice($faqs, 0, $half);
                $right = array_slice($faqs, $half);
            @endphp

            <div class="grid sm:grid-cols-2 gap-4 lg:gap-15 mt-6">
                <!-- Left -->
                <aside class="space-y-4 sm:space-y-6">
                    @foreach ($left as $faq)
                        <div class="faq-items border-b border-shark-950/40 pb-1.5">
                            <button
                                class="flex text-lg items-center justify-between w-full text-start font-semibold cursor-pointer gap-2"
                                onclick="toggleDropdown(this)">
                                <span>{{ $faq['title'] }}</span>
                                <div class="btn-primary p-2 lg:p-1 rounded-md">
                                    <i
                                        class='bx bx-chevron-down text-xl transform transition-transform duration-300 ease-in-out'></i>
                                </div>
                            </button>
                            <article
                                class="dropdown-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out">
                                <p class="pt-2">
                                    {{ $faq['description'] }}
                                </p>
                            </article>
                        </div>
                    @endforeach
                </aside>

                <!-- Right -->
                <aside class="space-y-4 sm:space-y-6">
                    @foreach ($right as $faq)
                        <div class="faq-items border-b border-shark-950/40 pb-1.5">
                            <button
                                class="flex text-lg items-center justify-between w-full text-start font-semibold cursor-pointer gap-2"
                                onclick="toggleDropdown(this)">
                                <span>{{ $faq['title'] }}</span>
                                <div class="btn-primary p-2 lg:p-1 rounded-md">
                                    <i
                                        class='bx bx-chevron-down text-xl transform transition-transform duration-300 ease-in-out'></i>
                                </div>
                            </button>
                            <article
                                class="dropdown-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out">
                                <p class="pt-2">
                                    {{ $faq['description'] }}
                                </p>
                            </article>
                        </div>
                    @endforeach
                </aside>
            </div>



        </div>
    </div>
</section>

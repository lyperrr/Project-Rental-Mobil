<section class="py-10">
    <div class="container">
        <div class="">
            <article class="text-left sm:text-center">
                <span class="badge">{{ __('messages.any_questions_section.badge') }}</span>
                <h1 class="title">{{ __('messages.any_questions_section.title') }}</span></h1>
                <p class="paragraph">
                    {{ __('messages.any_questions_section.paragraph') }}
                </p>
            </article>

            <div class="grid sm:grid-cols-2 gap-4 mt-6">
                <aside>
                    <div class="faq-items border-b border-shark-950/40 pb-1.5">
                        <button
                            class="flex text-lg  items-center justify-between w-full text-start font-semibold cursor-pointer"
                            onclick="toggleDropdown(this)"
                        >
                            <span>{{ __('messages.any_questions_section.dropdown.title.question-1') }}</span>
                    
                            <div class="btn-primary p-2 lg:p-1 rounded-md">
                                <i class='bx bx-chevron-down text-xl transform transition-transform duration-300 ease-in-out'></i>
                            </div>
                        </button>
                    
                        <article class="dropdown-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out">
                            <p class="pt-2">
                                {{ __('messages.any_questions_section.dropdown.questions.question-1') }}
                            </p>
                        </article>
                    </div>
                    

                    
                    
                </aside>
            </div>


        </div>
    </div>
</section>

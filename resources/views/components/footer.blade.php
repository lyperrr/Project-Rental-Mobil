<footer class="bg-gradient-to-b from-orange-100 to-orange-300">
    <div class="container">
        <div class="grid lg:grid-cols-12 py-10 lg:gap-5 xl:gap-10">
            <aside class="lg:col-span-5">
                <div class="">
                    <a href="/" class="title text-white w-fit">
                        <img class="w-20 sm:w-25 object-contain lg:w-25 xl:w-30" src="{{ asset('img/logo.png') }}" alt="">
                    </a>
                    <p class="paragraph mx-0 w-auto sm:text-lg text-white">
                        {{ __('messages.sections.components.footer.description') }}
                    </p>
                </div>
                <div class="text-white mt-4">
                    <span class="flex font-medium items-center gap-1.5">
                        <i class='bx text-xl bx-phone'></i>
                        081-111-222-333
                    </span>
                    <span class="flex font-medium items-center gap-1.5">
                        <i class='bx text-xl bx-envelope'></i>
                        example@gmail.com
                    </span>
                </div>
            </aside>

            <aside class="lg:col-span-7 mt-10 lg:m-0">
                <div class="grid lg:grid-cols-3 gap-4 lg:gap-0 text-white">

                    <div class="">
                        <h4 class="subtitle border-b-2 w-fit">
                            {{ __('messages.sections.components.footer.title_footer.quicklinks') }}</h4>
                        <ul class="space-y-1 mt-2">
                            <li>
                                <a href=""
                                    class="hover:underline">{{ __('messages.sections.components.footer.privacy_policy') }}</a>
                            </li>
                            <li>
                                <a href=""
                                    class="hover:underline">{{ __('messages.sections.components.footer.terms_and_conditions') }}</a>
                            </li>
                            <li>
                                <a href=""
                                    class="hover:underline">{{ __('messages.sections.components.footer.refund_policy') }}</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Start Quicklinks --}}
                    <div class="">
                        <h4 class="subtitle border-b-2 w-fit">
                            {{ __('messages.sections.components.footer.title_footer.navigation') }}</h4>
                        <ul class="space-y-1 mt-2">
                            <li>
                                <a href="/" class="hover:underline">{{ __('messages.navbar.home') }}</a>
                            </li>
                            <li>
                                <a href="about" class="hover:underline">{{ __('messages.navbar.about') }}</a>
                            </li>
                            <li>
                                <a href="blog" class="hover:underline">{{ __('messages.navbar.blog') }}</a>
                            </li>
                            <li>
                                <a href="rent" class="hover:underline">{{ __('messages.navbar.rent') }}</a>
                            </li>
                            <li>
                                <a href="contact" class="hover:underline">{{ __('messages.navbar.contact') }}</a>
                            </li>
                        </ul>
                    </div>
                    {{-- End Quicklinks --}}

                    {{-- Start Contact With Us --}}
                    <div class="">
                        <h4 class="subtitle border-b-2 w-fit">
                            {{ __('messages.sections.components.footer.title_footer.contact_with_us') }}
                        </h4>
                        <div
                            class="flex items-center gap-2 mt-4 *:p-2 *:text-2xl *:lg:text-xl *:rounded-full *:bg-orange-100 *:w-fit *:flex *:justify-center *:items-center *:border *:border-white *:hover:bg-orange-200 *:transition-colors *:duration-150 *:ease-linear">
                            <a href="" target="">
                                <i class='bx bxl-whatsapp'></i>
                            </a>
                            <a href="" target="">
                                <i class='bx bxl-facebook'></i>
                            </a>
                            <a href="" target="">
                                <i class='bx bxl-tiktok'></i>
                            </a>
                            <a href="" target="">
                                <i class='bx bxl-instagram'></i>
                            </a>
                        </div>
                    </div>
                    {{-- End Contact With Us --}}

                    {{-- Start Subscribe --}}
                    <div class="lg:col-span-2">
                        <article>
                            <h4 class="subtitle border-b-[3px] w-fit">
                                {{ __('messages.sections.components.footer.title_footer.subscribe') }}!
                            </h4>
                            <p class="paragraph text-white mx-0 w-auto">
                                {{ __('messages.sections.components.footer.description_subs') }}
                            </p>
                        </article>
                        <div class="relative sm:flex w-full mt-2">
                            <input
                                class="bg-white w-full border-2 border-white text-shark-950/80 focus:outline-orange-100 focus:border-2 rounded-lg sm:rounded-r-none lg:rounded-xl sm:rounded-xl p-3 grow"
                                placeholder="{{ __('messages.sections.signup_page.placeholder.email') }}"
                                type="text" name="" id="">
                            <button
                                class="border-2 border-white w-full sm:w-auto mt-2 sm:mt-0 bg-transparent hover:bg-white/20 lg:absolute text-lg lg:text-base lg:right-1.5 rounded-lg sm:rounded-l-none lg:top-1/2 lg:-translate-y-1/2 sm:px-4 py-3 sm:py-2 lg:py-1.5 lg:bg-gradient-to-r lg:from-orange-300 lg:to-orange-100 lg:rounded-lg lg:hover:bg-gradient-to-l text-white lg:border-none transition-all duration-200 ease-linear">
                                {{ __('messages.sections.components.footer.title_footer.subscribe') }}
                            </button>
                        </div>
                    </div>
                    {{-- End Subscribe --}}
                </div>
            </aside>
        </div>
    </div>
    <div class="bg-shark-950 text-center py-2">
        <span class="text-white text-xs md:text-sm">All rights reserved <a href=""
                class="underline">AutoRent.</a> ©2025.</span>
    </div>
</footer>

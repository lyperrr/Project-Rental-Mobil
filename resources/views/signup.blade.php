<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <main class="bg-sports_luxury_section sm:bg-none bg-center bg-no-repeat">
        <div class="container sm:pt-10">
            <div
                class="bg-cover bg-center bg-no-repeat flex justify-center items-center h-80 rounded-xl sm:bg-sports_luxury_section sm:shadow-md">
                <h1 class="tracking-wider text-white title w-auto">
                    {{ __('messages.sections.signup_page.title') }}
                </h1>
            </div>
        </div>
    </main>

    <div class="container py-10 ">
        <div class="bg-white shadow-lg rounded-xl lg:w-[70%] mx-auto border-2 border-shark-950/40">
            <form accept="" class="p-4 sm:p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4 lg:gap-8">
                    {{-- First Column --}}
                    <aside class="flex flex-col gap-4">

                        {{-- First Name --}}
                        <div class="">
                            <label for=""
                                class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.label.name.first_name') }}</label>
                            <div class="relative group">
                                <input type="text" name="" id="" required
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.first_name') }}"
                                    class="border border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                <i
                                    class='bx bx-user absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                            </div>
                        </div>

                        {{-- Last Name --}}
                        <div class="">
                            <label for=""
                                class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.label.name.last_name') }}</label>
                            <div class="relative group">
                                <input type="text" name="" id="" required
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.last_name') }}"
                                    class="border border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                <i
                                    class='bx bx-user absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="">
                            <label for=""
                                class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.label.email') }}</label>
                            <div class="relative group">
                                <input type="email" name="" id="" required
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.email') }}"
                                    class="border border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                <i
                                    class='bx bx-envelope absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="">
                            <label for=""
                                class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.label.password') }}</label>
                            <div class="relative group">
                                <input type="password" name="" id="" required
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.password') }}"
                                    class="border border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                <i
                                    class='bx bx-lock-alt absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                            </div>
                        </div>

                        {{-- Confirm Password --}}
                        <div class="">
                            <label for=""
                                class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.label.confirm_password') }}</label>
                            <div class="relative group">
                                <input type="password" name="" id="" required
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.confirm_password') }}"
                                    class="border border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                <i
                                    class='bx bx-lock-alt absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                            </div>
                        </div>
                    </aside>

                    {{-- Second Column --}}
                    <aside class="flex flex-col gap-4 mt-4 sm:m-0">
                        {{-- Phone Number --}}
                        <div class="">
                            <label for=""
                                class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.label.phone_number') }}</label>
                            <div class="relative group">
                                <input type="number" name="" id="" required pattern="[0-9]+"
                                    minlength="10" maxlength="15"
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.phone_number') }}"
                                    class="border border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none [&-moz-appearance:textfield]">
                                <i
                                    class='bx bx-phone absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                            </div>
                        </div>

                        {{-- Resident Identity Card / KTP --}}
                        <div class="">
                            <label for=""
                                class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.label.card.resident_identity_card') }}</label>
                            <div class="relative group">
                                <input type="number" name="" id="" required
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.resident_identity_card') }}"
                                    class="border border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none [&-moz-appearance:textfield]">
                                <i
                                    class='bx bx-id-card absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                            </div>
                        </div>

                        {{-- Driver License / SIM --}}
                        <div class="">
                            <label for=""
                                class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.label.card.driver_license') }}</label>
                            <div class="relative group">
                                <input type="number" name="" id="" required
                                    placeholder="{{ __('messages.sections.signup_page.placeholder.driver_license') }}"
                                    class="border border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none [&-moz-appearance:textfield]">
                                <i
                                    class='bx bx-id-card absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                            </div>
                        </div>

                        {{-- Photo Of Resident Identity Card / foto KTP --}}
                        <div class="">
                            <label for=""
                                class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.label.card.photo_of_resident_identity_card') }}</label>
                            <div class="relative group">
                                <input type="file" name="" id="" required
                                    class="cursor-pointer border-dashed border border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                <i
                                    class='bx bx-cloud-upload absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                            </div>
                        </div>

                        {{-- Photo Of Driver License / foto SIM --}}
                        <div class="">
                            <label for=""
                                class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.label.card.photo_of_driver_license') }}</label>
                            <div class="relative group">
                                <input type="file" name="" id="" required
                                    class="cursor-pointer border-dashed border border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                <i
                                    class='bx bx-cloud-upload absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                            </div>
                        </div>
                    </aside>
                </div>

                {{-- Address --}}
                <div class="col-span-2 mt-4">
                    <label for=""
                        class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.label.address') }}</label>
                    <div class="relative group">
                        <textarea placeholder="{{ __('messages.sections.signup_page.placeholder.address') }}" name="" id=""
                            rows="5" required
                            class=" border border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none"></textarea>
                        <i
                            class='bx bx-map absolute right-2 top-2 text-2xl pointer-events-none text-shark-950/80 group-focus-within:text-orange-300'></i>
                    </div>
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                    class="btn-primary w-full sm:w-1/2 mx-auto lg:text-xl mt-4">{{ __('messages.button.signup') }}</button>
                <p class="text-center mt-4">{{ __('messages.sections.signup_page.already_have_account') }}
                    <a href="{{ route('login') }}"
                        class="text-purple-600 underline">{{ __('messages.button.login') }}?</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>

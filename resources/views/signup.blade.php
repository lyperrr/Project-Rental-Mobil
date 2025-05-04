<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <main class="py-10 pt-4 sm:pt-10">
        <div class="container">
            <div class="title text-white bg-cover flex justify-center items-center h-70 w-full bg-center rounded-xl"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/your-dream.jpg');">
                {{ __('messages.sections.signup_page.title') }}
            </div>

            <div class="bg-white shadow-lg rounded-xl lg:w-[70%] mx-auto mt-8 border-2 border-shark-950/40">
                <form accept="" class="p-4 sm:p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-8">
                        {{-- First Column --}}
                        <aside class="flex flex-col gap-4">

                            {{-- First Name --}}
                            <div class="">
                                <label for=""
                                    class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.name.first_name') }}</label>
                                <div class="relative group">
                                    <input type="text" name="" id="" required
                                        placeholder="{{ __('messages.sections.signup_page.placeholder.first_name') }}"
                                        class="border-2 border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                    <i
                                        class='bx bx-user absolute right-2 top-1/2 -translate-y-1/2 text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                                </div>
                            </div>

                            {{-- Last Name --}}
                            <div class="">
                                <label for=""
                                    class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.name.last_name') }}</label>
                                <div class="relative group">
                                    <input type="text" name="" id="" required
                                        placeholder="{{ __('messages.sections.signup_page.placeholder.last_name') }}"
                                        class="border-2 border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                    <i
                                        class='bx bx-user absolute right-2 top-1/2 -translate-y-1/2 text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="">
                                <label for=""
                                    class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.email') }}</label>
                                <div class="relative group">
                                    <input type="email" name="" id="" required
                                        placeholder="{{ __('messages.sections.signup_page.placeholder.email') }}"
                                        class="border-2 border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                    <i
                                        class='bx bx-envelope absolute right-2 top-1/2 -translate-y-1/2 text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="">
                                <label for=""
                                    class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.password') }}</label>
                                <div class="relative group">
                                    <input type="password" name="" id="" required
                                        placeholder="{{ __('messages.sections.signup_page.placeholder.password') }}"
                                        class="border-2 border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                    <i
                                        class='bx bx-lock-alt absolute right-2 top-1/2 -translate-y-1/2 text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                                </div>
                            </div>

                            {{-- Confirm Password --}}
                            <div class="">
                                <label for=""
                                    class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.confirm_password') }}</label>
                                <div class="relative group">
                                    <input type="password" name="" id="" required
                                        placeholder="{{ __('messages.sections.signup_page.placeholder.confirm_password') }}"
                                        class="border-2 border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                    <i
                                        class='bx bx-lock-alt absolute right-2 top-1/2 -translate-y-1/2 text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                                </div>
                            </div>
                        </aside>

                        {{-- Second Column --}}
                        <aside class="flex flex-col gap-4 mt-4 sm:m-0">
                            {{-- Phone Number --}}
                            <div class="">
                                <label for=""
                                    class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.phone_number') }}</label>
                                <div class="relative group">
                                    <input type="number" name="" id="" required pattern="[0-9]+" minlength="10" maxlength="15"
                                        placeholder="{{ __('messages.sections.signup_page.placeholder.phone_number') }}"
                                        class="border-2 border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none [&-moz-appearance:textfield]">
                                    <i
                                        class='bx bx-phone absolute right-2 top-1/2 -translate-y-1/2 text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                                </div>
                            </div>

                            {{-- Resident Identity Card / KTP --}}
                            <div class="">
                                <label for=""
                                    class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.card.resident_identity_card') }}</label>
                                <div class="relative group">
                                    <input type="number" name="" id="" required
                                        placeholder="{{ __('messages.sections.signup_page.placeholder.resident_identity_card') }}"
                                        class="border-2 border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none [&-moz-appearance:textfield]">
                                    <i
                                        class='bx bx-id-card absolute right-2 top-1/2 -translate-y-1/2 text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                                </div>
                            </div>

                            {{-- Driver License / SIM --}}
                            <div class="">
                                <label for=""
                                    class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.card.driver_license') }}</label>
                                <div class="relative group">
                                    <input type="number" name="" id="" required
                                        placeholder="{{ __('messages.sections.signup_page.placeholder.driver_license') }}"
                                        class="border-2 border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none [&-moz-appearance:textfield]">
                                    <i
                                        class='bx bx-id-card absolute right-2 top-1/2 -translate-y-1/2 text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                                </div>
                            </div>

                            {{-- Photo Of Resident Identity Card / foto KTP --}}
                            <div class="">
                                <label for=""
                                    class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.card.photo_of_resident_identity_card') }}</label>
                                <div class="relative group">
                                    <input type="file" name="" id="" required
                                        class="border-dashed border-2 border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                    <i
                                        class='bx bx-cloud-upload absolute right-2 top-1/2 -translate-y-1/2 text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                                </div>
                            </div>

                            {{-- Photo Of Driver License / foto SIM --}}
                            <div class="">
                                <label for=""
                                    class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.card.photo_of_driver_license') }}</label>
                                <div class="relative group">
                                    <input type="file" name="" id="" required
                                        class="border-dashed border-2 border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none">
                                    <i
                                        class='bx bx-cloud-upload absolute right-2 top-1/2 -translate-y-1/2 text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                                </div>
                            </div>
                        </aside>
                    </div>

                    {{-- Address --}}
                    <div class="col-span-2 mt-4">
                        <label for=""
                            class="font-medium text-base mb-1">{{ __('messages.sections.signup_page.address') }}</label>
                        <div class="relative group">
                            <textarea placeholder="{{ __('messages.sections.signup_page.address') }}" name="" id="" rows="5" required
                                class=" border-2 border-shark-950/80 p-2 px-4 rounded-lg focus:border-orange-300 w-full focus:outline-none"></textarea>
                            <i
                                class='bx bx-map absolute right-2 top-2 text-2xl text-shark-950/80 group-focus-within:text-orange-300'></i>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button
                        type="submit"
                        class="btn-primary w-full sm:w-1/2 mx-auto lg:text-xl mt-4">{{ __('messages.button.signup') }}</button>
                    <p class="text-center mt-4">{{ __('messages.sections.signup_page.already_have_account') }}
                        <a href="{{ route('login') }}" class="text-purple-600 underline">{{ __('messages.button.login') }}?</a>
                    </p>
                </form>
            </div>
        </div>
    </main>
</x-layout>

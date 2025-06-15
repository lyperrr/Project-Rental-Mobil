<x-layout>
    {{-- Title --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Navbar --}}
    <x-navbar />


    <div class="bg-hero bg-cover bg-center h-[50vh] flex items-center justify-center">
        <h1 class="text-4xl font-bold text-white">Profile</h1>
    </div>

    <main>
        <div class="container">
            <div class="grid lg:grid-cols-3 gap-6 relative py-10">
                <div class="rounded-lg bg-white shadow-md border border-white/10 -top-25 overflow-hidden w-full h-fit">
                    <div class="grid grid-cols-1 gap-6 p-6 relative">
                        {{-- Elements --}}
                        <div class="size-20 rounded-full absolute bg-orange-100/30 -right-3 -bottom-10"></div>
                        <div class="size-20 rounded-full absolute bg-orange-100/30 right-10 -bottom-6"></div>
                        <div class="size-20 rounded-full absolute bg-orange-100/30 right-20 -bottom-10"></div>
                        <div class="size-20 rounded-full absolute bg-orange-100/30 right-35 -bottom-16"></div>
                        <div class="size-20 rounded-full absolute bg-orange-100/30 -left-3 -top-3"></div>
                        <div class="size-20 rounded-full absolute bg-orange-100/30 left-5 top-2"></div>
                        <div class="size-20 rounded-full absolute bg-orange-100/30 -left-5 top-7"></div>
                        <div class="size-20 rounded-full absolute bg-orange-100/30 left-5 -top-6"></div>
                        <div class="size-20 rounded-full absolute bg-orange-100/30 left-20 -top-6"></div>
                        <div class="size-20 rounded-full absolute bg-orange-100/30 left-20 -top-6"></div>
                        <div class="">
                            {{-- Profile Picture --}}
                            <div class="relative mx-auto size-18 border-4 border-shark-200 rounded-full">
                                <button class="w-full h-full overflow-hidden rounded-full cursor-pointer">
                                    <img class="w-full h-full object-cover" src="{{ asset('img/profile.jpeg') }}"
                                        alt="Profile Picture">
                                </button>
                                <button
                                    class="absolute -bottom-2 -right-2 bg-orange-100 rounded-full size-8 flex items-center justify-center border border-shark-200 shadow-sm cursor-pointer">
                                    <i class='bx bx-camera text-white text-xl'></i>
                                </button>
                            </div>

                            <article class="space-y-2 relative">
                                {{-- Full Name --}}
                                <h1 class="text-2xl font-semibold text-center mx-auto">John Doe</h1>
                                {{-- Username --}}
                                <h3
                                    class="text-sm text-shark-400 text-center mx-auto bg-shark-100/60 px-2 py-1 rounded-full w-fit">
                                    @johndoe_
                                </h3>
                                {{-- Role --}}
                                <h3
                                    class="text-sm bg-green-200 border text-center mx-auto font-medium flex items-center justify-center gap-1 opacity-70 border-green-400 px-2 py-1 rounded-full w-fit capitalize">
                                    <i class='bx bx-check-circle text-lg'></i>
                                    User
                                </h3>
                            </article>
                        </div>

                        <div class="flex items-center gap-4 mt-4 relative mx-auto">
                            <div class="p-4 bg-shark-100/60 size-20 rounded-lg text-center">
                                <span class="text-2xl font-bold">15</span>
                                <p class="text-sm">Rentals</p>
                            </div>
                            <div class="p-4 bg-shark-100/60 size-20 rounded-lg text-center">
                                <span class="text-2xl font-bold">15</span>
                                <p class="text-sm">Reviews</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Personal Info -->
                <div class="lg:col-span-2 grid grid-cols-1 xl:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl p-6 shadow-md border border-white/10 h-fit">
                        <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
                            <i class='bx bx-user text-orange-200 text-2xl'></i> Personal Information
                        </h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="text-sm text-shark-600 font-medium">Full Name</label>
                                <input type="text" value="John Doe"
                                    class="w-full border rounded-md p-2 bg-shark-50 border-orange-100 focus:outline-orange-200"
                                    readonly>
                            </div>
                            <div class="col-span-2">
                                <label class="text-sm text-shark-600 font-medium">Email</label>
                                <input type="email" value="john.doe@example.com"
                                    class="w-full border rounded-md p-2 bg-shark-50 border-orange-100 focus:outline-orange-200"
                                    readonly>
                            </div>
                            <div>
                                <label class="text-sm text-shark-600 font-medium">Phone</label>
                                <input type="text" value="+62 812-3456-7890"
                                    class="w-full border rounded-md p-2 bg-shark-50 border-orange-100 focus:outline-orange-200"
                                    readonly>
                            </div>
                            <div>
                                <label class="text-sm text-shark-600 font-medium">Username</label>
                                <input type="text" value="johndoe"
                                    class="w-full border rounded-md p-2 bg-shark-50 border-orange-100 focus:outline-orange-200"
                                    readonly>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
                                <i class='bx bx-cog text-orange-200 text-2xl'></i> Account Settings
                            </h3>
                            <div class="grid md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="text-sm text-shark-600 font-medium">Account Role</label>
                                    <input type="text" value="User"
                                        class="w-full border rounded-md p-2 bg-shark-50 border-orange-100 focus:outline-orange-200"
                                        readonly>
                                </div>
                                <div>
                                    <label class="text-sm text-shark-600 font-medium">Member Since</label>
                                    <input type="text" value="January 15, 2024"
                                        class="w-full border rounded-md p-2 bg-shark-50 border-orange-100 focus:outline-orange-200"
                                        readonly>
                                </div>
                            </div>
                            <div class="grid grid-cols-6 font-medium gap-4">
                                <button
                                    class="bg-blue-600 col-span-4 hover:bg-blue-700 text-white py-2 rounded flex items-center justify-center gap-1 cursor-pointer">
                                    <i class='bx bx-lock-alt'></i> Change Password
                                </button>
                                <button
                                    class="bg-red-500 col-span-2 hover:bg-red-600 text-white py-2 rounded flex items-center justify-center gap-1 cursor-pointer">
                                    <i class='bx bx-log-out'></i> Logout
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Identity -->
                    <div class="bg-white rounded-xl p-6 shadow-md border border-white/10">
                        <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
                            <i class='bx bx-id-card text-orange-200 text-2xl'></i> Identity Documents
                        </h3>
                        <div class="grid gap-4">
                            <div>
                                <label class="text-sm text-shark-600 font-medium">KTP Number</label>
                                <input type="text" value="3201234567890001"
                                    class="w-full border rounded-md p-2 bg-shark-50 border-orange-100 focus:outline-orange-200"
                                    readonly>
                                <img src="images/ktp.png" alt="KTP"
                                    class="w-full h-40 mt-2 object-cover rounded-md bg-black">
                                <div
                                    class="bg-shark-50 w-full h-40 mt-2 flex items-center justify-center text-shark-300 rounded-md">
                                    <i class="bx bx-image-alt text-5xl"></i>
                                </div>
                            </div>
                            <div>
                                <label class="text-sm text-shark-600 font-medium">SIM Number</label>
                                <input type="text" value="1234567890123456"
                                    class="w-full border rounded-md p-2 bg-shark-50 border-orange-100 focus:outline-orange-200"
                                    readonly>
                                <img src="images/sim.png" alt="SIM"
                                    class="w-full h-40 mt-2 object-cover rounded-md bg-black">
                                <div
                                    class="bg-shark-50 w-full h-40 mt-2 flex items-center justify-center text-shark-300 rounded-md">
                                    <i class="bx bx-image-alt text-5xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <x-footer />
</x-layout>

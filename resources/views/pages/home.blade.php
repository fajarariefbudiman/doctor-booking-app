<x-layouts.main>
    {{-- Top Navigation Bar (Desktop Only) --}}
    <nav
        class="hidden md:flex justify-between items-center bg-white px-6 py-4 shadow-md font-poppins border-b border-gray-200">
        <a href="{{ route('home') }}" class="text-lg font-bold text-[#236EB3]">Selaras</a>
        <div class="flex gap-6 text-sm font-medium">
            <a href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'text-[#236EB3]' : 'text-gray-600 hover:text-[#236EB3]' }}">Home</a>
            <a href="{{ route('doctors.index') }}"
                class="{{ request()->routeIs('doctors.*') ? 'text-[#236EB3]' : 'text-gray-600 hover:text-[#236EB3]' }}">Doctors</a>
            <a href="{{ route('about') }}"
                class="{{ request()->routeIs('about') ? 'text-[#236EB3]' : 'text-gray-600 hover:text-[#236EB3]' }}">About</a>
            @auth
                <a href="{{ route('profile.edit') }}"
                    class="{{ request()->routeIs('profile.edit') ? 'text-[#236EB3]' : 'text-gray-600 hover:text-[#236EB3]' }}">Profile</a>
            @else
                <a href="{{ route('login') }}"
                    class="{{ request()->routeIs('login') ? 'text-[#236EB3]' : 'text-gray-600 hover:text-[#236EB3]' }}">Login</a>
            @endauth
        </div>
    </nav>

    {{-- Mobile Layout (unchanged) --}}
    <div
        class="md:hidden max-w-full mx-auto bg-white min-h-[calc(100vh-64px)] flex flex-col items-center justify-between py-14 px-4 pb-20">
        {{-- Logo & Brand Name --}}
        <div class="text-center py-1">
            <img src="{{ asset('images/Selaras-Rm-Bg.png') }}" alt="Logo Selaras"
                class="mx-auto w-40 sm:w-41 h-auto" />
        </div>

        {{-- Illustration of Mother & Child --}}
        <div class="mt-8 mb-4">
            <img src="{{ asset('images/Hero-Image.png') }}" alt="Hero Image" class="w-48 md:hidden">
        </div>

        {{-- Hospital Name --}}
        <div class="text-center px-4">
            <h2 class="text-selarasText font-normal text-xl sm:text-2xl font-sedan leading-tight">RUMAH SAKIT IBU</h2>
            <h2 class="text-selarasText font-normal text-xl sm:text-2xl font-sedan leading-tight">DAN ANAK</h2>
        </div>

        {{-- Description --}}
        <div class="text-center px-8 mt-6">
            <p class="text-gray-800 font-poppins font-bold text-base sm:text-lg leading-relaxed">
                Consult with Specialized Doctors<br />
                In a Multi-Speciality Hospital
            </p>
        </div>

        {{-- Conditional Buttons Mobile --}}
        @guest
            <div class="w-full sm:w-[75%] px-6 my-10">
                <a href="{{ route('login') }}">
                    <button
                        class="w-full bg-[#236EB3B2] text-white text-base font-semibold py-3 sm:py-4 rounded-2xl shadow hover:bg-blue-600 transition font-poppins mb-4 flex items-center justify-center space-x-2">
                        <i class="fas fa-sign-in-alt text-lg"></i>
                        <span>Login</span>
                    </button>
                </a>
                <a href="{{ route('register') }}">
                    <button
                        class="w-full bg-gray-300 text-gray-800 text-base font-semibold py-3 sm:py-4 rounded-2xl shadow hover:bg-gray-400 transition font-poppins flex items-center justify-center space-x-2">
                        <i class="fas fa-user-plus text-lg"></i>
                        <span>Register</span>
                    </button>
                </a>
            </div>
        @else
            <div class="w-full sm:w-[75%] px-6 mt-10">
                <p class="text-center text-gray-700 font-poppins text-md sm:text-lg mb-4">
                    Welcome back, <strong>{{ Auth::user()->full_name }}</strong>!
                </p>
                <a href="{{ route('doctors.index') }}">
                    <button
                        class="w-full bg-[#236EB3B2] text-white text-base font-semibold py-3 sm:py-4 rounded-2xl shadow hover:bg-blue-600 transition font-poppins flex items-center justify-center space-x-2">
                        <i class="fas fa-calendar-check text-lg"></i>
                        <span>Book an Appointment</span>
                    </button>
                </a>
                <div class="py-4">
                    <a href="{{ route('bookings.index') }}"
                        class="text-center text-blue-700 hover:underline font-poppins text-sm sm:text-base flex items-center justify-center space-x-2">
                        <i class="fas fa-clipboard-list text-md"></i>
                        <span>View My Appointments</span>
                    </a>
                </div>
            </div>
        @endguest
    </div>

    {{-- Desktop Layout (new optimized version) --}}
    <div class="hidden md:block bg-gradient-to-br from-blue-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                {{-- Left Column - Content --}}
                <div class="space-y-8">
                    {{-- Logo & Brand Name --}}
                    <div class="text-left">
                        <img src="{{ asset('images/Selaras-Rm-Bg.png') }}" alt="Logo Selaras"
                            class="w-32 h-auto mb-6" />

                        <div class="mb-6">
                            <h1 class="text-selarasText font-normal text-4xl lg:text-5xl font-sedan leading-tight mb-2">
                                RUMAH SAKIT IBU
                            </h1>
                            <h1 class="text-selarasText font-normal text-4xl lg:text-5xl font-sedan leading-tight">
                                DAN ANAK
                            </h1>
                        </div>

                        <p class="text-gray-700 font-poppins text-xl lg:text-2xl leading-relaxed mb-8">
                            Consult with Specialized Doctors<br />
                            In a Multi-Speciality Hospital
                        </p>
                    </div>

                    {{-- Features/Benefits --}}
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="flex items-start space-x-3">
                            <div class="bg-[#236EB3] p-2 rounded-lg">
                                <i class="fas fa-user-md text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-poppins font-semibold text-gray-800">Expert Doctors</h3>
                                <p class="text-gray-600 text-sm">Specialized healthcare professionals</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="bg-[#236EB3] p-2 rounded-lg">
                                <i class="fas fa-clock text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-poppins font-semibold text-gray-800">24/7 Service</h3>
                                <p class="text-gray-600 text-sm">Round the clock medical care</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="bg-[#236EB3] p-2 rounded-lg">
                                <i class="fas fa-heart text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-poppins font-semibold text-gray-800">Mother & Child Care</h3>
                                <p class="text-gray-600 text-sm">Specialized maternal healthcare</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="bg-[#236EB3] p-2 rounded-lg">
                                <i class="fas fa-shield-alt text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-poppins font-semibold text-gray-800">Safe & Secure</h3>
                                <p class="text-gray-600 text-sm">Advanced medical facilities</p>
                            </div>
                        </div>
                    </div>

                    {{-- Conditional Buttons Desktop --}}
                    @guest
                        <div class="flex gap-4 pt-6">
                            <a href="{{ route('login') }}" class="flex-1">
                                <button
                                    class="w-full bg-[#236EB3] text-white text-lg font-semibold py-4 px-8 rounded-2xl shadow-lg hover:bg-blue-700 hover:shadow-xl transition-all duration-300 font-poppins flex items-center justify-center space-x-3">
                                    <i class="fas fa-sign-in-alt text-xl"></i>
                                    <span>Login to Your Account</span>
                                </button>
                            </a>
                            <a href="{{ route('register') }}" class="flex-1">
                                <button
                                    class="w-full bg-white border-2 border-[#236EB3] text-[#236EB3] text-lg font-semibold py-4 px-8 rounded-2xl shadow-lg hover:bg-[#236EB3] hover:text-white hover:shadow-xl transition-all duration-300 font-poppins flex items-center justify-center space-x-3">
                                    <i class="fas fa-user-plus text-xl"></i>
                                    <span>Create New Account</span>
                                </button>
                            </a>
                        </div>
                    @else
                        <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                            <p class="text-gray-700 font-poppins text-lg mb-6">
                                Welcome back, <strong class="text-[#236EB3]">{{ Auth::user()->full_name }}</strong>!
                            </p>
                            <div class="flex gap-4">
                                <a href="{{ route('doctors.index') }}" class="flex-1">
                                    <button
                                        class="w-full bg-[#236EB3] text-white text-lg font-semibold py-4 px-6 rounded-xl shadow-lg hover:bg-blue-700 hover:shadow-xl transition-all duration-300 font-poppins flex items-center justify-center space-x-3">
                                        <i class="fas fa-calendar-check text-xl"></i>
                                        <span>Book Appointment</span>
                                    </button>
                                </a>
                                <a href="{{ route('bookings.index') }}" class="flex-1">
                                    <button
                                        class="w-full bg-gray-100 text-gray-700 text-lg font-semibold py-4 px-6 rounded-xl shadow hover:bg-gray-200 hover:shadow-lg transition-all duration-300 font-poppins flex items-center justify-center space-x-3">
                                        <i class="fas fa-clipboard-list text-xl"></i>
                                        <span>My Appointments</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endguest
                </div>

                {{-- Right Column - Illustration --}}
                <div class="text-center lg:text-right">
                    <img src="{{ asset('images/Hero-Image.png') }}" alt="Hero Image"
                        class="w-2/3 max-w-lg mx-auto lg:ml-auto lg:mr-0">
                </div>

            </div>
        </div>

    </div>

    {{-- Bottom Navigation Bar (Mobile Only) --}}
    <x-button-nav />

</x-layouts.main>

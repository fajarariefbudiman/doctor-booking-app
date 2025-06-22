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

    {{-- Main Content --}}
    <div
        class="max-w-full md:max-w-xl mx-auto bg-white min-h-[calc(100vh-64px)] md:min-h-0 flex flex-col items-center justify-between py-10 px-4 md:px-0">

        {{-- Logo & Brand Name --}}
        <div class="text-center py-1">
            <img src="{{ asset('images/Selaras-Rm-Bg.png') }}" alt="Logo Selaras"
                class="mx-auto w-40 sm:w-48 h-auto" />
        </div>

        {{-- Illustration of Mother & Child --}}
        <div class="mt-8 mb-4">
            <img src="{{ asset('images/Hero-Image.png') }}" alt="Hero Image" class="w-48 sm:w-64">
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

        {{-- Conditional Buttons --}}
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
                <a href="{{ route('bookings.index') }}"
                    class="text-center mt-4 text-blue-700 hover:underline font-poppins text-sm sm:text-base flex items-center justify-center space-x-2">
                    <i class="fas fa-clipboard-list text-md"></i>
                    <span>View My Appointments</span>
                </a>
            </div>
        @endguest

    </div>

    {{-- Bottom Navigation Bar (Mobile Only) --}}
    <x-button-nav />

</x-layouts.main>

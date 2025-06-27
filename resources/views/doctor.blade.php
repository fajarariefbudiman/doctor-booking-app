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

    <!-- Mobile Layout (unchanged) -->
    <div class="md:hidden max-w-xl mx-auto h-screen bg-white">
        <!-- CATEGORY SCROLL -->
        <div class="px-4 py-4 overflow-x-auto">
            <div class="flex gap-3 snap-x snap-mandatory w-max">
                @php
                    $categories = [
                        'Semua',
                        'Anak',
                        'Kandungan',
                        'Penyakit Dalam',
                        'Orthopedi',
                        'Kulit',
                        'Gigi',
                        'Umum',
                    ];
                @endphp

                @foreach ($categories as $cat)
                    <button
                        class="snap-start whitespace-nowrap px-4 py-2 text-sm rounded-full border border-[#166FC1] text-[#166FC1] hover:bg-[#166FC1] hover:text-white transition">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Search Bar -->
        <div class="flex items-center pb-4 my-5 px-4">
            <div class="flex flex-1 items-center px-4 rounded-full bg-[#EDEDED] shadow-sm">
                <!-- Search Icon -->
                <svg class="w-5 h-5 text-[#166FC1E5] mr-3 shrink-0" xmlns="http://www.w3.org/2000/svg" width="25"
                    height="25" viewBox="0 0 25 25">
                    <path
                        d="M14.8438 9.375V10.9375C14.8438 11.2598 14.5801 11.5234 14.2578 11.5234H11.5234V14.2578C11.5234 14.5801 11.2598 14.8438 10.9375 14.8438H9.375C9.05273 14.8438 8.78906 14.5801 8.78906 14.2578V11.5234H6.05469C5.73242 11.5234 5.46875 11.2598 5.46875 10.9375V9.375C5.46875 9.05273 5.73242 8.78906 6.05469 8.78906H8.78906V6.05469C8.78906 5.73242 9.05273 5.46875 9.375 5.46875H10.9375C11.2598 5.46875 11.5234 5.73242 11.5234 6.05469V8.78906H14.2578C14.5801 8.78906 14.8438 9.05273 14.8438 9.375ZM24.6582 23.2764L23.2764 24.6582C22.8174 25.1172 22.0752 25.1172 21.6211 24.6582L16.748 19.79C16.5283 19.5703 16.4062 19.2725 16.4062 18.96V18.1641C14.6826 19.5117 12.5146 20.3125 10.1562 20.3125C4.5459 20.3125 0 15.7666 0 10.1562C0 4.5459 4.5459 0 10.1562 0C15.7666 0 20.3125 4.5459 20.3125 10.1562C20.3125 12.5146 19.5117 14.6826 18.1641 16.4062H18.96C19.2725 16.4062 19.5703 16.5283 19.79 16.748L24.6582 21.6162C25.1123 22.0752 25.1123 22.8174 24.6582 23.2764ZM16.7969 10.1562C16.7969 6.48438 13.8281 3.51562 10.1562 3.51562C6.48438 3.51562 3.51562 6.48438 3.51562 10.1562C3.51562 13.8281 6.48438 16.7969 10.1562 16.7969C13.8281 16.7969 16.7969 13.8281 16.7969 10.1562Z"
                        fill="currentColor" fill-opacity="0.9" />
                </svg>

                <!-- Search Input -->
                <input type="text" placeholder="Search"
                    class="flex-1 bg-transparent border-0 text-center text-[#166FC1E5] text-lg placeholder-[#166FC1E5] focus:outline-none focus:ring-0" />

                <!-- Filter Button -->
                <button class="bg-[#EDEDED] p-3 rounded-full hover:bg-gray-300 transition-colors">
                    <svg class="w-5 h-5 text-[#166FC1E5]" xmlns="http://www.w3.org/2000/svg" width="25"
                        height="25" viewBox="0 0 25 25" fill="none">
                        <path
                            d="M23.827 0H1.17324C0.132319 0 -0.392925 1.26299 0.344624 2.00054L9.375 11.0323V1.0938C9.375 21.4761 9.56157 21.8345 9.87485 22.0538L13.7811 24.7872C14.5518 25.3267 15.625 24.7799 15.625 23.8271V11.0323L24.6556 2.00054C25.3916 1.26445 24.87 0 23.827 0Z"
                            fill="currentColor" fill-opacity="0.9" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Dokter Cards Mobile -->
        <div class="space-y-5 px-5 pb-28">
            @foreach ($doctors as $doctor)
                <a href="{{ route('schedules.show', ['doctor' => $doctor->id]) }}" class="block">
                    <div class="flex items-center gap-4 border-b border-blue-400 pb-4">
                        <!-- Avatar -->
                        <div class="diamond-shape flex items-center justify-center shrink-0">
                            <img src="{{ asset('images/dr-murphy.jpg') }}" alt="dokter" class="diamond-image">
                        </div>

                        <!-- Info -->
                        <div class="flex-1 space-y-1">
                            <h3 class="text-sm font-semibold text-gray-800">{{ $doctor->name }}</h3>
                            <p class="text-sm text-[#1F67A9]">{{ $doctor->specialty }}</p>
                        </div>

                        <!-- Arrow -->
                        <div class="text-[#1F67A9]">
                            <i class="fas fa-chevron-right text-base"></i>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- BOTTOM NAVBAR -->
        <x-button-nav />
    </div>

    <!-- Desktop Layout -->
    <div class="hidden md:block">


        <div class="bg-gradient-to-br from-blue-50 to-white min-h-screen">
            <div class="max-w-7xl mx-auto px-6 py-8">

                <!-- Search and Filter Section -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                    <div class="flex flex-col lg:flex-row gap-6 items-start lg:items-center">
                        <!-- Search Bar -->
                        <div class="flex-1">
                            <div
                                class="flex items-center px-6 py-4 rounded-2xl bg-gray-50 border border-gray-200 focus-within:border-[#166FC1] focus-within:ring-2 focus-within:ring-[#166FC1]/20 transition-all">
                                <svg class="w-6 h-6 text-[#166FC1] mr-4 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <input type="text" placeholder="Search doctors by name or specialty..."
                                    class="flex-1 bg-transparent border-0 text-gray-700 text-lg placeholder-gray-500 focus:outline-none focus:ring-0" />
                            </div>
                        </div>

                        <!-- Filter Button -->
                        <button
                            class="bg-[#166FC1] text-white px-6 py-4 rounded-2xl hover:bg-blue-700 transition-all duration-300 flex items-center space-x-2 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                            </svg>
                            <span class="font-semibold">Filters</span>
                        </button>
                    </div>
                </div>

                <!-- Category Filters -->
                <div class="mb-8">
                    <h3 class="text-xl font-poppins font-semibold text-gray-800 mb-4">Specialties</h3>
                    <div class="flex flex-wrap gap-3">
                        @php
                            $categories = [
                                'Semua',
                                'Anak',
                                'Kandungan',
                                'Penyakit Dalam',
                                'Orthopedi',
                                'Kulit',
                                'Gigi',
                                'Umum',
                            ];
                        @endphp

                        @foreach ($categories as $cat)
                            <button
                                class="px-6 py-3 text-sm font-medium rounded-full border-2 border-[#166FC1] text-[#166FC1] hover:bg-[#166FC1] hover:text-white transition-all duration-300 {{ $cat === 'Semua' ? 'bg-[#166FC1] text-white' : '' }}">
                                {{ $cat }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Doctors Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($doctors as $doctor)
                        <a href="{{ route('schedules.show', ['doctor' => $doctor->id]) }}" class="group block">
                            <div
                                class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 border border-gray-100 group-hover:border-[#166FC1]/30 group-hover:-translate-y-1">
                                <!-- Doctor Image -->
                                <div class="text-center mb-6">
                                    <div class="relative inline-block">
                                        <img src="{{ asset('images/dr-murphy.jpg') }}" alt="{{ $doctor->name }}"
                                            class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-[#166FC1]/20 group-hover:border-[#166FC1]/50 transition-all duration-300">
                                        <div class="absolute -bottom-2 -right-2 bg-[#166FC1] rounded-full p-2">
                                            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Doctor Info -->
                                <div class="text-center space-y-3">
                                    <h3
                                        class="text-lg font-semibold text-gray-800 font-poppins group-hover:text-[#166FC1] transition-colors">
                                        {{ $doctor->name }}
                                    </h3>
                                    <p
                                        class="text-[#166FC1] font-medium text-sm bg-blue-50 px-3 py-1 rounded-full inline-block">
                                        {{ $doctor->specialty }}
                                    </p>
                                </div>

                                <!-- Action Button -->
                                <div class="mt-6">
                                    <div
                                        class="bg-[#166FC1] text-white text-center py-3 rounded-xl font-semibold group-hover:bg-blue-700 transition-all duration-300 flex items-center justify-center space-x-2">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>Book Appointment</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</x-layouts.main>

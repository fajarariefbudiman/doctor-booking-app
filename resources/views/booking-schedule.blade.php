<x-layouts.main>
    {{-- Mobile Layout (unchanged) --}}
    <div class="md:hidden max-w-xl mx-auto min-h-screen bg-white font-[Poppins] px-4 pt-6 pb-28">
        <!-- Header -->
        <div class="text-2xl py-4 font-bold text-[#166FC1]">Bookings</div>

        <!-- Tabs -->
        <div class="flex mb-6">
            <button class="flex-1 py-2 rounded-l-xl bg-white shadow text-[#2F72B2] font-semibold border border-gray-300">
                Upcoming
            </button>
            <button class="flex-1 py-2 rounded-r-xl bg-gray-200 text-gray-600 font-semibold border border-gray-300">
                Past
            </button>
        </div>

        @foreach ($upcomingBookings as $booking)
            @php
                $scheduleDate = \Carbon\Carbon::parse($booking->schedule->schedule_date);
                $scheduleTime = \Carbon\Carbon::parse($booking->schedule->schedule_time);
                $diffText = $scheduleDate->diffForHumans();
            @endphp

            <div class="bg-[#89BBE3] text-white p-4 rounded-md shadow space-y-2 mb-4">
                <p class="text-sm text-white/80">
                    {{ $diffText }}
                </p>
                <p class="text-lg font-semibold">
                    Consultation with<br>{{ $booking->doctor->name }}
                </p>

                <div class="flex items-center gap-2 mt-3">
                    <i class="bi bi-calendar-event text-white"></i>
                    <span class="text-sm">{{ $scheduleDate->format('F j, Y') }}</span>
                </div>

                <div class="flex items-center gap-2">
                    <i class="bi bi-clock text-white"></i>
                    <span class="text-sm">{{ $scheduleTime->format('H:i') }}</span>
                </div>

                <button
                    class="mt-3 px-4 py-2 rounded border border-white text-white hover:bg-white hover:text-[#2F72B2] transition">
                    RESCHEDULE
                </button>
            </div>
        @endforeach
    </div>

    {{-- Desktop Layout --}}
    <div class="hidden md:block bg-gradient-to-br from-blue-50 to-white min-h-screen">
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
        <div class="max-w-5xl mx-auto px-6 py-8">

            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-[#236EB3] font-sedan mb-2">My Appointments</h1>
                <p class="text-gray-600 font-poppins">Manage your upcoming and past appointments</p>
            </div>

            {{-- Tabs --}}
            <div class="flex mb-8 bg-white rounded-xl shadow-sm p-1 w-fit">
                <button class="px-6 py-3 rounded-lg bg-[#236EB3] text-white font-semibold font-poppins transition-all">
                    Upcoming
                </button>
                <button
                    class="px-6 py-3 rounded-lg text-gray-600 font-semibold font-poppins hover:text-[#236EB3] transition-all">
                    Past
                </button>
            </div>

            {{-- Bookings Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($upcomingBookings as $booking)
                    @php
                        $scheduleDate = \Carbon\Carbon::parse($booking->schedule->schedule_date);
                        $scheduleTime = \Carbon\Carbon::parse($booking->schedule->schedule_time);
                        $diffText = $scheduleDate->diffForHumans();
                    @endphp

                    <div
                        class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow">
                        {{-- Status Badge --}}
                        <div class="flex justify-between items-start mb-4">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $diffText }}
                            </span>
                            <i class="bi bi-calendar-check text-[#236EB3] text-xl"></i>
                        </div>

                        {{-- Doctor Info --}}
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1 font-poppins">
                                {{ $booking->doctor->name }}
                            </h3>
                            <p class="text-gray-600 text-sm">Consultation Appointment</p>
                        </div>

                        {{-- Date & Time --}}
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-[#236EB3] rounded-lg flex items-center justify-center">
                                    <i class="bi bi-calendar-event text-white text-sm"></i>
                                </div>
                                <span class="text-gray-700 font-medium">{{ $scheduleDate->format('F j, Y') }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-[#236EB3] rounded-lg flex items-center justify-center">
                                    <i class="bi bi-clock text-white text-sm"></i>
                                </div>
                                <span class="text-gray-700 font-medium">{{ $scheduleTime->format('H:i') }}</span>
                            </div>
                        </div>

                        {{-- Action Button --}}
                        <button
                            class="w-full bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold hover:bg-[#236EB3] hover:text-white transition-all duration-300 font-poppins">
                            RESCHEDULE
                        </button>
                    </div>
                @endforeach
            </div>

            {{-- Empty State (if no bookings) --}}
            @if ($upcomingBookings->isEmpty())
                <div class="text-center py-16">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="bi bi-calendar-x text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 font-poppins">No Upcoming Appointments</h3>
                    <p class="text-gray-600 mb-6">You don't have any scheduled appointments at the moment.</p>
                    <a href="{{ route('doctors.index') }}">
                        <button
                            class="bg-[#236EB3] text-white px-8 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all font-poppins">
                            Book New Appointment
                        </button>
                    </a>
                </div>
            @endif

        </div>
    </div>

    <x-button-nav />
</x-layouts.main>

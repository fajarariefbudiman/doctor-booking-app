<x-layouts.main>
    {{-- Mobile Layout (unchanged) --}}
    <div class="md:hidden max-w-xl mx-auto min-h-screen bg-white overflow-hidden">

        <!-- DETAIL DOKTER DAN SLOT WAKTU -->
        <div class="space-y-6 px-4 py-6 font-poppins">
            <!-- Dokter Info -->
            <div class="flex items-center gap-4 pb-4 border-b border-blue-400">
                <div class="diamond-shape bg-red-200 flex items-center justify-center shrink-0">
                    <img src="{{ asset('images/dr-murphy.jpg') }}" alt="dokter" class="diamond-image">
                </div>
                <div class="flex-1 space-y-1">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $doctor->name }}</h3>
                    <p class="text-[#1F67A9] text-sm">{{ $doctor->specialty }}</p>
                </div>
            </div>

            <!-- Error Messages -->
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @foreach ($dates as $date)
                <div>
                    <p class="font-medium text-base text-gray-700 mb-2">{{ $date }}</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($allowedTimes as $time)
                            @php

                                $available = isset($scheduleAvailability[$date][$time])
                                    ? $scheduleAvailability[$date][$time]
                                    : true;

                                $timeFormatted = \Carbon\Carbon::parse($time)->format('H:i');

                                $buttonClass = $available
                                    ? 'bg-[#E5E5E5] text-black hover:bg-[#166FC1] hover:text-white cursor-pointer'
                                    : 'bg-gray-400 text-gray-600 cursor-not-allowed opacity-50';
                            @endphp
                            <button
                                class="min-w-[65px] text-center px-3 py-2 rounded-xl text-sm font-medium transition {{ $buttonClass }}"
                                {{ $available ? '' : 'disabled' }}
                                @if ($available) onclick="bookSchedule('{{ $date }}', '{{ $time }}')" @endif>
                                {{ $timeFormatted }}
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <!-- Informasi Booking Terpilih -->
            <div id="booking-info" class="pt-6 hidden">
                <div class="text-sm text-gray-700 mb-2">
                    <p><span class="font-semibold">Tanggal:</span> <span id="selected-date"></span></p>
                    <p><span class="font-semibold">Waktu:</span> <span id="selected-time"></span></p>
                </div>

                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <input type="hidden" name="schedule_date" id="form-date">
                    <input type="hidden" name="schedule_time" id="form-time">

                    <button type="submit"
                        class="mt-2 w-full bg-[#166FC1] hover:bg-[#14589c] text-white py-2 px-4 rounded-xl font-semibold text-sm shadow transition">
                        Booking Sekarang
                    </button>
                </form>
            </div>

            <!-- Show Calendar -->
            <div class="pt-2">
                <a href="#" class="text-[#166FC1] text-sm hover:underline font-medium">Tampilkan Kalender
                    Lengkap</a>
            </div>
        </div>

        <!-- BOTTOM NAVBAR -->
        <x-button-nav />
    </div>

    {{-- Desktop Layout --}}
    <div class="hidden md:block bg-gradient-to-br from-blue-50 to-white min-h-screen">
        <!-- TOP NAVBAR DESKTOP -->
        <nav class="flex justify-between items-center bg-white px-6 py-4 shadow-md font-poppins border-b border-gray-200">
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

        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid lg:grid-cols-2 gap-12 items-start">

                {{-- Left Column - Doctor Info & Features --}}
                <div class="space-y-8">
                    {{-- Back Navigation --}}
                    <div class="flex items-center space-x-3 text-[#236EB3] hover:text-blue-700 cursor-pointer">
                        <i class="fas fa-arrow-left text-lg"></i>
                        <a href="{{ route('doctors.index') }}" class="font-poppins font-medium">Back to Doctors</a>
                    </div>

                    {{-- Doctor Profile Card --}}
                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                        <div class="flex items-center gap-6 mb-6">
                            <div class="diamond-shape bg-red-200 flex items-center justify-center shrink-0 w-20 h-20">
                                <img src="{{ asset('images/dr-murphy.jpg') }}" alt="dokter" class="diamond-image">
                            </div>
                            <div class="flex-1 space-y-2">
                                <h1 class="text-3xl font-bold text-gray-800 font-sedan">{{ $doctor->name }}</h1>
                                <p class="text-[#236EB3] text-lg font-poppins font-medium">{{ $doctor->specialty }}</p>
                            </div>
                        </div>

                        {{-- Doctor Features/Benefits --}}
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="flex items-start space-x-3">
                                <div class="bg-[#236EB3] p-2 rounded-lg">
                                    <i class="fas fa-graduation-cap text-white text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="font-poppins font-semibold text-gray-800 text-sm">Certified Specialist</h3>
                                    <p class="text-gray-600 text-xs">Board certified physician</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="bg-[#236EB3] p-2 rounded-lg">
                                    <i class="fas fa-star text-white text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="font-poppins font-semibold text-gray-800 text-sm">Experienced</h3>
                                    <p class="text-gray-600 text-xs">Years of medical practice</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="bg-[#236EB3] p-2 rounded-lg">
                                    <i class="fas fa-calendar-check text-white text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="font-poppins font-semibold text-gray-800 text-sm">Flexible Scheduling</h3>
                                    <p class="text-gray-600 text-xs">Multiple time slots available</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="bg-[#236EB3] p-2 rounded-lg">
                                    <i class="fas fa-heart text-white text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="font-poppins font-semibold text-gray-800 text-sm">Patient Care</h3>
                                    <p class="text-gray-600 text-xs">Dedicated to your health</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Booking Confirmation Card (initially hidden) --}}
                    <div id="booking-info-desktop" class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hidden">
                        <h3 class="text-xl font-bold text-gray-800 font-poppins mb-4">Confirm Your Appointment</h3>
                        <div class="space-y-3 text-gray-700 font-poppins mb-6">
                            <div class="flex justify-between">
                                <span class="font-semibold">Doctor:</span>
                                <span>{{ $doctor->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Specialty:</span>
                                <span>{{ $doctor->specialty }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Date:</span>
                                <span id="selected-date-desktop"></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Time:</span>
                                <span id="selected-time-desktop"></span>
                            </div>
                        </div>

                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                            <input type="hidden" name="schedule_date" id="form-date-desktop">
                            <input type="hidden" name="schedule_time" id="form-time-desktop">

                            <button type="submit"
                                class="w-full bg-[#236EB3] text-white text-lg font-semibold py-4 px-6 rounded-xl shadow-lg hover:bg-blue-700 hover:shadow-xl transition-all duration-300 font-poppins flex items-center justify-center space-x-3">
                                <i class="fas fa-calendar-check text-xl"></i>
                                <span>Confirm Booking</span>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Right Column - Schedule Selection --}}
                <div class="space-y-6">
                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-800 font-sedan mb-6">Select Appointment Time</h2>

                        <!-- Error Messages -->
                        @if (session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="space-y-6">
                            @foreach ($dates as $date)
                                <div>
                                    <h3 class="font-semibold text-lg text-gray-800 mb-4 font-poppins">{{ $date }}</h3>
                                    <div class="grid grid-cols-4 gap-3">
                                        @foreach ($allowedTimes as $time)
                                            @php
                                                $available = isset($scheduleAvailability[$date][$time])
                                                    ? $scheduleAvailability[$date][$time]
                                                    : true;

                                                $timeFormatted = \Carbon\Carbon::parse($time)->format('H:i');

                                                $buttonClass = $available
                                                    ? 'bg-gray-100 text-gray-800 hover:bg-[#236EB3] hover:text-white cursor-pointer border-2 border-gray-200 hover:border-[#236EB3] time-slot-btn'
                                                    : 'bg-gray-300 text-gray-500 cursor-not-allowed opacity-50 border-2 border-gray-300';
                                            @endphp
                                            <button
                                                class="px-4 py-3 rounded-xl text-sm font-medium transition-all duration-300 font-poppins {{ $buttonClass }}"
                                                {{ $available ? '' : 'disabled' }}
                                                data-date="{{ $date }}"
                                                data-time="{{ $time }}"
                                                @if ($available) onclick="bookScheduleDesktop('{{ $date }}', '{{ $time }}', this)" @endif>
                                                {{ $timeFormatted }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Show Calendar -->
                        <div class="pt-6 border-t border-gray-200 mt-8">
                            <a href="#" class="text-[#236EB3] hover:text-blue-700 font-poppins font-medium flex items-center space-x-2 hover:underline">
                                <i class="fas fa-calendar-alt"></i>
                                <span>View Full Calendar</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Script untuk interaksi -->
    <script>
        function bookSchedule(date, time) {
            console.log('Original date:', date);
            console.log('Original time:', time);

            try {
                const isoDate = parseToISODate(date);

                if (!isoDate) {
                    alert('Format tanggal tidak valid: ' + date);
                    return;
                }

                console.log('Formatted date:', isoDate);
                console.log('Time:', time);

                document.getElementById('selected-date').textContent = date;
                document.getElementById('selected-time').textContent = time;

                document.getElementById('form-date').value = isoDate;
                document.getElementById('form-time').value = time;

                document.getElementById('booking-info').classList.remove('hidden');

                window.scrollTo({
                    top: document.body.scrollHeight,
                    behavior: 'smooth'
                });

            } catch (error) {
                console.error('Error parsing date:', error);
                alert('Terjadi kesalahan dalam memproses tanggal');
            }
        }

        function bookScheduleDesktop(date, time, clickedButton) {
            console.log('Original date:', date);
            console.log('Original time:', time);

            try {
                const isoDate = parseToISODate(date);

                if (!isoDate) {
                    alert('Format tanggal tidak valid: ' + date);
                    return;
                }

                console.log('Formatted date:', isoDate);
                console.log('Time:', time);

                // Reset all time slot buttons to default state
                document.querySelectorAll('.time-slot-btn').forEach(btn => {
                    btn.classList.remove('bg-[#236EB3]', 'text-white', 'border-[#236EB3]');
                    btn.classList.add('bg-gray-100', 'text-gray-800', 'border-gray-200');
                });

                // Set clicked button to selected state
                clickedButton.classList.remove('bg-gray-100', 'text-gray-800', 'border-gray-200');
                clickedButton.classList.add('bg-[#236EB3]', 'text-white', 'border-[#236EB3]');

                document.getElementById('selected-date-desktop').textContent = date;
                document.getElementById('selected-time-desktop').textContent = time;

                document.getElementById('form-date-desktop').value = isoDate;
                document.getElementById('form-time-desktop').value = time;

                document.getElementById('booking-info-desktop').classList.remove('hidden');

                // Smooth scroll to booking confirmation
                document.getElementById('booking-info-desktop').scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

            } catch (error) {
                console.error('Error parsing date:', error);
                alert('Terjadi kesalahan dalam memproses tanggal');
            }
        }

        function parseToISODate(dateString) {
            const currentYear = new Date().getFullYear();

            if (/^\d{4}-\d{2}-\d{2}$/.test(dateString)) {
                return dateString;
            }

            const months = {
                'Jan': 0,
                'January': 0,
                'Feb': 1,
                'February': 1,
                'Mar': 2,
                'March': 2,
                'Apr': 3,
                'April': 3,
                'May': 4,
                'May': 4,
                'Jun': 5,
                'June': 5,
                'Jul': 6,
                'July': 6,
                'Aug': 7,
                'August': 7,
                'Sep': 8,
                'September': 8,
                'Oct': 9,
                'October': 9,
                'Nov': 10,
                'November': 10,
                'Dec': 11,
                'December': 11
            };

            let dateObj = null;

            // Pattern 1: "Mon, Jan 22" atau "Monday, January 22"
            const pattern1 = /^(\w+),\s*(\w+)\s+(\d{1,2})$/;
            const match1 = dateString.match(pattern1);
            if (match1) {
                const [, , monthName, day] = match1;
                const monthIndex = months[monthName];
                if (monthIndex !== undefined) {
                    dateObj = new Date(currentYear, monthIndex, parseInt(day));
                }
            }

            // Pattern 2: "Jan 22" atau "January 22"
            if (!dateObj) {
                const pattern2 = /^(\w+)\s+(\d{1,2})$/;
                const match2 = dateString.match(pattern2);
                if (match2) {
                    const [, monthName, day] = match2;
                    const monthIndex = months[monthName];
                    if (monthIndex !== undefined) {
                        dateObj = new Date(currentYear, monthIndex, parseInt(day));
                    }
                }
            }

            // Pattern 3: "22 Jan" atau "22 January"
            if (!dateObj) {
                const pattern3 = /^(\d{1,2})\s+(\w+)$/;
                const match3 = dateString.match(pattern3);
                if (match3) {
                    const [, day, monthName] = match3;
                    const monthIndex = months[monthName];
                    if (monthIndex !== undefined) {
                        dateObj = new Date(currentYear, monthIndex, parseInt(day));
                    }
                }
            }

            // Fallback: coba parsing dengan Date constructor (hati-hati dengan trailing data)
            if (!dateObj) {
                try {
                    // Bersihkan string dari karakter yang tidak perlu
                    const cleanDateString = dateString.trim().replace(/,\s*$/, '');

                    // Coba tambahkan tahun jika belum ada
                    let testDateString = cleanDateString;
                    if (!testDateString.includes(currentYear.toString())) {
                        testDateString = cleanDateString + ' ' + currentYear;
                    }

                    dateObj = new Date(testDateString);

                    // Validasi hasil parsing
                    if (isNaN(dateObj.getTime())) {
                        dateObj = null;
                    }
                } catch (e) {
                    console.warn('Fallback date parsing failed:', e);
                    dateObj = null;
                }
            }

            // Jika semua cara gagal, return null
            if (!dateObj || isNaN(dateObj.getTime())) {
                return null;
            }

            // Format ke ISO date (YYYY-MM-DD)
            const year = dateObj.getFullYear();
            const month = String(dateObj.getMonth() + 1).padStart(2, '0');
            const day = String(dateObj.getDate()).padStart(2, '0');

            return `${year}-${month}-${day}`;
        }
    </script>
</x-layouts.main>

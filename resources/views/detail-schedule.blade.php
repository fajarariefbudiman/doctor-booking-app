<x-layouts.main>
    <div class="max-w-xl mx-auto min-h-screen bg-white overflow-hidden">

        <!-- TOP NAVBAR DESKTOP ONLY -->
        <nav class="hidden md:flex justify-between items-center px-6 py-4 bg-white shadow font-poppins">
            <div class="text-lg font-bold text-[#166FC1]">RSIA Selaras</div>
            <div class="flex space-x-6 text-sm">
                <a href="{{ route('home') }}" class="text-[#166FC1] hover:underline">Home</a>
                <a href="{{ route('doctors.index') }}" class="text-[#166FC1] hover:underline">Doctors</a>
                <a href="{{ route('bookings.index') }}" class="text-[#166FC1] hover:underline">Riwayat</a>
                @guest
                    <a href="{{ route('login') }}" class="text-[#166FC1] hover:underline">Login</a>
                @else
                    <a href="{{ route('profile.edit') }}" class="text-[#166FC1] hover:underline">Profil</a>
                @endguest
            </div>
        </nav>

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

                // Update tampilan
                document.getElementById('selected-date').textContent = date;
                document.getElementById('selected-time').textContent = time;

                // Set nilai form dengan format yang benar
                document.getElementById('form-date').value = isoDate;
                document.getElementById('form-time').value = time;

                // Tampilkan form booking
                document.getElementById('booking-info').classList.remove('hidden');

                // Scroll ke bawah
                window.scrollTo({
                    top: document.body.scrollHeight,
                    behavior: 'smooth'
                });

            } catch (error) {
                console.error('Error parsing date:', error);
                alert('Terjadi kesalahan dalam memproses tanggal');
            }
        }

        function parseToISODate(dateString) {
            const currentYear = new Date().getFullYear();

            // Jika sudah dalam format ISO (YYYY-MM-DD), return langsung
            if (/^\d{4}-\d{2}-\d{2}$/.test(dateString)) {
                return dateString;
            }

            // Mapping bulan untuk parsing manual
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

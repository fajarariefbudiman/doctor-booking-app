<x-layouts.main>
    <div class="max-w-xl mx-auto h-screen bg-white overflow-hidden">

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
        <div class="flex items-center gap-2 px-4 pb-4 my-5">
            <div class="flex flex-1 items-center px-4 rounded-full bg-[#EDEDED] shadow-sm">
                <!-- Search Icon (Updated) -->
                <svg class="w-5 h-5 text-[#166FC1E5] mr-3 shrink-0" xmlns="http://www.w3.org/2000/svg" width="25"
                    height="25" viewBox="0 0 25 25">
                    <path
                        d="M14.8438 9.375V10.9375C14.8438 11.2598 14.5801 11.5234 14.2578 11.5234H11.5234V14.2578C11.5234 14.5801 11.2598 14.8438 10.9375 14.8438H9.375C9.05273 14.8438 8.78906 14.5801 8.78906 14.2578V11.5234H6.05469C5.73242 11.5234 5.46875 11.2598 5.46875 10.9375V9.375C5.46875 9.05273 5.73242 8.78906 6.05469 8.78906H8.78906V6.05469C8.78906 5.73242 9.05273 5.46875 9.375 5.46875H10.9375C11.2598 5.46875 11.5234 5.73242 11.5234 6.05469V8.78906H14.2578C14.5801 8.78906 14.8438 9.05273 14.8438 9.375ZM24.6582 23.2764L23.2764 24.6582C22.8174 25.1172 22.0752 25.1172 21.6211 24.6582L16.748 19.79C16.5283 19.5703 16.4062 19.2725 16.4062 18.96V18.1641C14.6826 19.5117 12.5146 20.3125 10.1562 20.3125C4.5459 20.3125 0 15.7666 0 10.1562C0 4.5459 4.5459 0 10.1562 0C15.7666 0 20.3125 4.5459 20.3125 10.1562C20.3125 12.5146 19.5117 14.6826 18.1641 16.4062H18.96C19.2725 16.4062 19.5703 16.5283 19.79 16.748L24.6582 21.6162C25.1123 22.0752 25.1123 22.8174 24.6582 23.2764ZM16.7969 10.1562C16.7969 6.48438 13.8281 3.51562 10.1562 3.51562C6.48438 3.51562 3.51562 6.48438 3.51562 10.1562C3.51562 13.8281 6.48438 16.7969 10.1562 16.7969C13.8281 16.7969 16.7969 13.8281 16.7969 10.1562Z"
                        fill="currentColor" fill-opacity="0.9" />
                </svg>

                <!-- Search Input -->
                <input type="text" placeholder="Search"
                    class="flex-1 bg-transparent border-0 text-center text-[#166FC1E5] text-lg placeholder-[#166FC1E5] focus:outline-none focus:ring-0" />

                <!-- Filter Button (Updated) -->
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


        <!-- Dokter Cards -->
        <div class="space-y-5 px-5 pb-6">
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

</x-layouts.main>

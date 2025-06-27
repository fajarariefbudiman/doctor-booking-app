<x-layouts.main>
    {{-- Mobile Layout (unchanged) --}}
    <div class="md:hidden max-w-xl mx-auto min-h-screen px-6 bg-white font-[Poppins] relative overflow-hidden flex flex-col">
        <div class="flex flex-col items-center text-center pt-24 px-4 z-10">
            <div class="w-10 h-10 bg-[#E3EDF7] rotate-45 flex items-center justify-center rounded-md mb-6">
                <i class="bi bi-check-lg text-black -rotate-45 text-2xl"></i>
            </div>
            <h1 class="text-2xl font-normal text-black mb-2">Thanks For Booking!</h1>
            <p class="text-sm text-center text-black px-2">
                You booked an appointment with <strong>{{ $doctorName }}</strong><br>
                on {{ $bookingDate }} at {{ $bookingTime }}
            </p>
        </div>

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-10">
            <a href="{{ route('bookings.index') }}">
                <button
                    class="w-80 bg-[#166FC180] text-white py-3 rounded-xl shadow-md text-lg font-medium hover:bg-[#76a5cc] transition">
                    Go To My Bookings
                </button>
            </a>
        </div>

        <div class="absolute bottom-0 left-0 w-full h-52 z-0 overflow-hidden">
            <div class="absolute left-[-40px] bottom-[10px] w-48 h-48 bg-[#288CE866] rounded-full opacity-90"></div>
            <div class="absolute left-[20px] bottom-[-100px] w-52 h-52 bg-[#288CE8B2] rounded-full opacity-90"></div>
        </div>
    </div>

    {{-- Desktop Layout --}}
    <div class="hidden md:block bg-gradient-to-br from-blue-50 py-10 to-white min-h-screen">
        <div class="max-w-4xl mx-auto px-6 py-20">
            <div class="text-center">
                {{-- Success Icon --}}
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-8">
                    <i class="bi bi-check-lg text-green-600 text-3xl"></i>
                </div>

                {{-- Success Message --}}
                <h1 class="text-4xl font-bold text-gray-800 mb-4 font-sedan">
                    Thanks For Booking!
                </h1>
                <p class="text-lg text-gray-600 mb-8 font-poppins">
                    You booked an appointment with <strong>{{ $doctorName }}</strong><br>
                    on {{ $bookingDate }} at {{ $bookingTime }}
                </p>

                {{-- Action Button --}}
                <a href="{{ route('bookings.index') }}">
                    <button
                    class="w-80 bg-[#166FC180] text-white py-3 rounded-xl shadow-md text-lg font-medium hover:bg-[#76a5cc] transition">
                    Go To My Bookings
                </button>
                </a>
            </div>
        </div>
    </div>
</x-layouts.main>

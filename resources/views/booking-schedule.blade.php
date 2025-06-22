<x-layouts.main>
    <div class="max-w-xl mx-auto min-h-screen bg-white font-[Poppins] px-4 pt-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <i class="bi bi-list text-2xl text-[#2F72B2]"></i>
            <h1 class="text-xl font-bold tracking-tight">BOOKINGS</h1>
            <img src="{{ asset('images/dr-murphy.jpg') }}" alt="User" class="w-10 h-10 rounded-full object-cover">
        </div>

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
            <div class="bg-[#89BBE3] text-white p-4 rounded-md shadow space-y-2 mb-4">
                <p class="text-sm text-white/80">
                    {{ \Carbon\Carbon::parse($booking->booking_time)->diffForHumans() }}
                </p>
                <p class="text-lg font-semibold">
                    Consultation with<br>{{ $booking->doctor->name }}
                </p>
                <div class="flex items-center gap-2 mt-3">
                    <i class="bi bi-calendar-event text-white"></i>
                    <span class="text-sm">{{ \Carbon\Carbon::parse($booking->booking_time)->format('F j') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="bi bi-clock text-white"></i>
                    <span class="text-sm">{{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}</span>
                </div>
                <button
                    class="mt-3 px-4 py-2 rounded border border-white text-white hover:bg-white hover:text-[#2F72B2] transition">
                    RESCHEDULE
                </button>
            </div>
        @endforeach

    </div>

</x-layouts.main>

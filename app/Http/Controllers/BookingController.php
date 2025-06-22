<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Doctor;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('doctor')
            ->where('user_id', Auth::id())
            ->orderBy('booking_time', 'asc')
            ->get()
            ->groupBy(function ($booking) {
                return \Carbon\Carbon::parse($booking->booking_time)->isFuture() ? 'upcoming' : 'past';
            });

        return view('booking-schedule', [
            'upcomingBookings' => $bookings->get('upcoming', collect()),
            'pastBookings' => $bookings->get('past', collect()),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'schedule_date' => 'required|date',
            'schedule_time' => 'required|date_format:H:i:s',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        try {
            $scheduleDate = $request->schedule_date;
            $scheduleTime = $request->schedule_time;
            $userId = Auth::id();
            $doctorId = $request->doctor_id;
            $doctor = Doctor::find($request->doctor_id);

            if (!$doctor) {
                return back()->with('error', 'Dokter tidak ditemukan.');
            }

            DB::transaction(function () use ($scheduleDate, $scheduleTime, $userId, $doctorId, $request) {

                // Cek existing booking user
                $existingUserBooking = Booking::join('schedules', 'bookings.schedule_id', '=', 'schedules.id')
                    ->where('bookings.user_id', $userId)
                    ->where('schedules.doctor_id', $doctorId)
                    ->where('schedules.schedule_date', $scheduleDate)
                    ->where('schedules.schedule_time', $scheduleTime)
                    ->exists();

                if ($existingUserBooking) {
                    throw new \Exception('Anda sudah membooking jadwal ini sebelumnya.');
                }

                // Lock dan cari schedule
                $schedule = Schedule::lockForUpdate()
                    ->where('doctor_id', $doctorId)
                    ->where('schedule_date', $scheduleDate)
                    ->where('schedule_time', $scheduleTime)
                    ->first();

                if (!$schedule) {
                    // Buat schedule baru
                    $schedule = Schedule::create([
                        'doctor_id' => $doctorId,
                        'schedule_date' => $scheduleDate,
                        'schedule_time' => $scheduleTime,
                        'is_available' => false,
                    ]);
                } else {
                    if (!$schedule->is_available) {
                        throw new \Exception('Jadwal sudah dibooking oleh pasien lain.');
                    }
                    $schedule->update(['is_available' => false]);
                }

                // Buat booking
                Booking::create([
                    'user_id' => $userId,
                    'doctor_id' => $doctorId,
                    'schedule_id' => $schedule->id,
                    'booking_time' => now(),
                ]);
            });

            $doctorName = $doctor->name; // Asumsi kolom nama dokter adalah 'name'
            $bookingDate = Carbon::parse($request->schedule_date)->format('F d'); // Contoh: September 10
            $bookingTime = Carbon::parse($request->schedule_time)->format('h A'); // Contoh: 11 AM

            // Simpan data ke sesi flash untuk digunakan setelah redirect
            session()->flash('booking_success_data', [
                'doctorName' => $doctorName,
                'bookingDate' => $bookingDate,
                'bookingTime' => $bookingTime,
            ]);

            return redirect()->route('booking.success')->with('success', 'Booking berhasil dibuat!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database constraint violations
            if (str_contains($e->getMessage(), 'unique_doctor_schedule')) {
                Log::warning('Duplicate schedule creation attempted', [
                    'user_id' => Auth::id(),
                    'doctor_id' => $request->doctor_id,
                    'schedule_date' => $request->schedule_date,
                    'schedule_time' => $request->schedule_time,
                ]);
                return redirect()->back()->with('error', 'Jadwal sudah ada, silakan refresh halaman dan coba lagi.');
            }

            if (str_contains($e->getMessage(), 'unique_user_booking')) {
                return redirect()->back()->with('error', 'Anda sudah membooking jadwal ini sebelumnya.');
            }

            Log::error('Database error during booking: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan database, silakan coba lagi.');
        } catch (\Exception $e) {
            Log::error('Booking error: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'doctor_id' => $request->doctor_id,
                'schedule_date' => $request->schedule_date,
                'schedule_time' => $request->schedule_time,
            ]);

            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function success()
    {
        // Ambil data dari sesi flash
        $bookingData = session()->get('booking_success_data');
        return view('message-success', [
            'doctorName' => $bookingData['doctorName'],
            'bookingDate' => $bookingData['bookingDate'],
            'bookingTime' => $bookingData['bookingTime'],
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}

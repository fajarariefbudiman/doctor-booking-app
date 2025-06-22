<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Doctor;
use Illuminate\Support\Facades\Log;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreScheduleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        $allowedTimes = ['11:00:00', '13:00:00', '15:00:00', '17:00:00'];

        // Log::info('Viewing schedule for Doctor ID: ' . $doctor->id);
        // Log::info('Current date (now()): ' . now()->toDateString());
        // Log::info('Date range for query: ' . now()->toDateString() . ' to ' . now()->addDays(3)->toDateString());

        $dbSchedules = $doctor->schedules()
            ->whereIn('schedule_time', $allowedTimes)
            ->whereDate('schedule_date', '>=', now()->toDateString())
            ->whereDate('schedule_date', '<=', now()->addDays(3)->toDateString())
            ->get();

        // Log::info('dbSchedules fetched: ' . $dbSchedules->toJson());

        $scheduleAvailability = [];

        foreach ($dbSchedules as $schedule) {
            if (!$schedule->schedule_date || !$schedule->schedule_time) {
                continue;
            }

            try {
                $dateObj = \Carbon\Carbon::parse($schedule->schedule_date);
                $dateKey = $dateObj->format('D, M d');
                $timeKey = \Carbon\Carbon::parse($schedule->schedule_time)->format('H:i:s');

                if (empty($dateKey) || empty($timeKey)) {
                    Log::warning('Empty date or time key', [
                        'date' => $dateKey,
                        'time' => $timeKey,
                        'schedule_id' => $schedule->id
                    ]);
                    continue;
                }

                if (!isset($scheduleAvailability[$dateKey])) {
                    $scheduleAvailability[$dateKey] = [];
                }

                $scheduleAvailability[$dateKey][$timeKey] = (bool) $schedule->is_available;

                // Log::info("Processing schedule ID: {$schedule->id}, DateKey: {$dateKey}, TimeKey: {$timeKey}, is_available: {$schedule->is_available} -> mapped to boolean: " . ($scheduleAvailability[$dateKey][$timeKey] ? 'true' : 'false'));
            } catch (\Exception $e) {
                Log::warning('Failed to parse schedule date/time', [
                    'schedule_id' => $schedule->id,
                    'schedule_date' => $schedule->schedule_date,
                    'schedule_time' => $schedule->schedule_time,
                    'error' => $e->getMessage()
                ]);
                continue;
            }
        }

        $dates = [];
        for ($i = 0; $i < 4; $i++) {
            $date = now()->addDays($i);
            $dates[] = $date->format('D, M d');
        }

        // Log::info('Final scheduleAvailability array: ' . json_encode($scheduleAvailability, JSON_PRETTY_PRINT));

        return view('detail-schedule', compact('doctor', 'scheduleAvailability', 'allowedTimes', 'dates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'schedule_date',
        'schedule_time',
        'is_available',
    ];

    protected $casts = [
        'schedule_date' => 'date',
        'schedule_time' => 'datetime:H:i:s',
        'is_available' => 'boolean',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Helper method untuk cek apakah sudah dibooking
    public function isBooked()
    {
        return !$this->is_available;
    }
}

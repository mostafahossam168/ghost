<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScooterGPSData extends Model
{
    use HasFactory;
    protected $fillabale = [
        'scooter_id', 'scroll_serial_number', 'latitude', 'number_of_satellites',
        'longitude', 'altitude', 'gps_validity', 'signal_strength',
        'trip_time_seconds', 'trip_time_seconds', 'trip_distance_km', 'current_speed_kmh',
        'iot_fault_code', 'cot_fault_code', 'iot_temperature', 'cot_temperature', 'motor_temperature',
        'battery_temperature', 'battery_level', 'front_light_status', 'tail_light_status',
        'cable_lock_status', 'battery_lock_status', 'iot_alarm_information'
    ];
    public function scooter()
    {
        return $this->belongsTo(Scooter::class);
    }
}
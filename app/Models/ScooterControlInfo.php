<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScooterControlInfo extends Model
{
    use HasFactory;
    protected $fillabale = [
        'scooter_id', 'electronic_lock', 'front_lights_control',
        'tail_light_control', 'cable_lock_control', 'battery_lock_control',
        'tail_light_control', 'electronic_fence', 'find_car_response_time',
        'unlocked_state_upload_interval', 'locked_state_upload_interval', 'speed_mode',
        'speed_limit_mode_1', 'speed_limit_mode_2', 'speed_limit_mode_3', 'cruise_control',
        'starting_mode', 'speed_button_switch', 'led_button'
    ];
    public function scooter()
    {
        return $this->belongsTo(Scooter::class);
    }
}
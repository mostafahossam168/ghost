<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScooterBatteryStatus extends Model
{
    use HasFactory;
    protected $fillabale = [
        'scooter_id', 'battery_status_1', 'battery_status_2',
        'battery_temperature', 'battery_voltage', 'battery_current',
        'full_charged_capacity', 'battery_soc', 'battery_cycle_times', 'battery_data_updated'
    ];
    public function scooter()
    {
        return $this->belongsTo(Scooter::class);
    }
}
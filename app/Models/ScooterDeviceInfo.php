<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScooterDeviceInfo extends Model
{
    use HasFactory;
    protected $fillabale = [
        'scooter_id', 'iccid', 'iot_hw',
        'iot_sw', 'ecu_hw', 'ecu_sw',
        'ota', 'soc', 'iot_battery',
        'iot_voltage', 'config_count',
    ];
    public function scooter()
    {
        return $this->belongsTo(Scooter::class);
    }
}
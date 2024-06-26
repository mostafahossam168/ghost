<?php

namespace App\Models;

use App\Http\Controllers\Api\ScooterController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scooter extends Model
{
    use HasFactory;
    protected $fillabale = ['imei'];
    public function scooterDeviceInfo()
    {
        return $this->hasOne(ScooterDeviceInfo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function batteryStatus()
    {
        return $this->hasOne(ScooterBatteryStatus::class);
    }
    public function controlInfo()
    {
        return $this->hasOne(ScooterControlInfo::class);
    }
    public function gpsData()
    {
        return $this->hasOne(ScooterGPSData::class);
    }
}
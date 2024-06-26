<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scooter_g_p_s_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scooter_id')->constrained('scooters')->cascadeOnDelete()->cascadeOnUpdate();
            // GPSData
            $table->integer('scroll_serial_number')->nullable();
            $table->float('latitude', 8, 2)->nullable();
            $table->float('longitude', 8, 2)->nullable();
            $table->integer('altitude')->nullable();
            $table->integer('number_of_satellites')->nullable();
            $table->enum('gps_validity', ['GPS_VALIDITY_BAD', ' GPS_VALIDITY_POSITION_2D', ' GPS_VALIDITY_POSITION_3D'])->default('GPS_VALIDITY_BAD');
            $table->integer('signal_strength')->nullable();
            $table->integer('trip_time_seconds')->nullable();
            $table->float('trip_distance_km', 8, 2)->nullable();
            $table->float('current_speed_kmh', 8, 2)->nullable();
            $table->integer('iot_fault_code')->nullable();
            $table->integer('cot_fault_code')->nullable();
            $table->integer('iot_temperature')->nullable();
            $table->integer('cot_temperature')->nullable();
            $table->integer('motor_temperature')->nullable();
            $table->integer('battery_temperature')->nullable();
            $table->integer('battery_level')->nullable();
            $table->boolean('front_light_status')->default(false);
            $table->boolean('tail_light_status')->default(false);
            $table->enum('cable_lock_status', ['CABLE_LOCK_STATUS_OFF', ' CABLE_LOCK_STATUS_ON', ' CABLE_LOCK_STATUS_OFFLINE'])->default('CABLE_LOCK_STATUS_OFF');
            $table->enum('battery_lock_status', ['BATTERY_LOCK_STATUS_OFF', ' BATTERY_LOCK_STATUS_ON', ' BATTERY_LOCK_STATUS_OFFLINE'])->default('BATTERY_LOCK_STATUS_OFF');
            $table->enum('iot_alarm_information', ['IOT_ALARM_INFORMATION_UNSPECIFIED', ' IOT_ALARM_INFORMATION_IOT_REMOVED', ' IOT_ALARM_INFORMATION_LOW_POWER'])->default('IOT_ALARM_INFORMATION_UNSPECIFIED');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scooter_g_p_s_data');
    }
};

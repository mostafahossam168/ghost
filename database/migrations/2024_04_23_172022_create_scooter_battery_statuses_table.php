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
        Schema::create('scooter_battery_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scooter_id')->constrained('scooters')->cascadeOnDelete()->cascadeOnUpdate();
            // BatteryStatus
            $table->integer('battery_status_1')->nullable();
            $table->integer('battery_status_2')->nullable();
            $table->integer('battery_temperature')->nullable();
            $table->integer('battery_voltage')->nullable();
            $table->integer('battery_current')->nullable();
            $table->integer('full_charged_capacity')->nullable();
            $table->integer('battery_soc')->nullable();
            $table->integer('battery_cycle_times')->nullable();
            $table->boolean('battery_data_updated')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scooter_battery_statuses');
    }
};

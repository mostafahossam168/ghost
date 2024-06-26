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
        Schema::create('scooter_device_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scooter_id')->constrained('scooters')->cascadeOnDelete()->cascadeOnUpdate();
            // DeviceInfo
            $table->string('iccid')->nullable();
            $table->integer('iot_hw')->nullable();
            $table->integer('iot_sw')->nullable();
            $table->integer('ecu_hw')->nullable();
            $table->integer('ecu_sw')->nullable();
            $table->integer('ota')->nullable();
            $table->integer('soc')->nullable();
            $table->integer('iot_battery')->nullable();
            $table->integer('iot_voltage')->nullable();
            $table->integer('config_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scooter_device_infos');
    }
};

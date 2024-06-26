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
        Schema::create('scooter_control_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scooter_id')->constrained('scooters')->cascadeOnDelete()->cascadeOnUpdate();
            // ScooterControlInfo
            $table->enum('electronic_lock', ['LOCK_STATUS_LOCK', 'LOCK_STATUS_UNLOCK', 'LOCK_STATUS_CHECKING'])->default('LOCK_STATUS_LOCK');
            $table->boolean('front_lights_control')->default(false);
            // $table->boolean('tail_light_control')->default(false);
            $table->enum('cable_lock_control', ['LOCK_STATUS_LOCK', 'LOCK_STATUS_UNLOCK', 'LOCK_STATUS_CHECKING'])->default('LOCK_STATUS_LOCK');
            $table->enum('battery_lock_control', ['LOCK_STATUS_LOCK', 'LOCK_STATUS_UNLOCK', 'LOCK_STATUS_CHECKING'])->default('LOCK_STATUS_LOCK');
            $table->boolean('tail_light_control')->default(false);
            $table->boolean('electronic_fence')->default(false);
            $table->integer('find_car_response_time')->nullable();
            $table->integer('unlocked_state_upload_interval')->nullable();
            $table->integer('locked_state_upload_interval')->nullable();
            $table->enum('speed_mode', ['SPEED_MODE_1', 'SPEED_MODE_2', 'SPEED_MODE_3'])->nullable('SPEED_MODE_1');
            $table->integer('speed_limit_mode_1')->nullable();
            $table->integer('speed_limit_mode_2')->nullable();
            $table->integer('speed_limit_mode_3')->nullable();
            $table->boolean('cruise_control')->default(false);
            $table->boolean('starting_mode')->default(false);
            $table->boolean('speed_button_switch')->default(false);
            $table->boolean('led_button')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scooter_control_infos');
    }
};

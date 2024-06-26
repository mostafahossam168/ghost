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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('email')->unique()->nullable();
            // $table->string('country_code', 60);
            $table->string('phone')->unique(); // Add phone number field
            $table->string('otp')->nullable(); // Add OTP field
            $table->boolean('status')->default(1);
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password')->nullable();
            // $table->json('notifications')->default('{
            //         "email": true,
            //         "sms": false
            //     }');
            // $table->json('privacy')->default('{
            //         "profile_visibility": "Friends",
            //         "last_seen": "Nobody"
            //     }');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('coupon_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coupon_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('coupon_id')->references('id')->on('coupons')
                  ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade');

            // To prevent duplicate coupon usage by the same user
            $table->unique(['coupon_id', 'user_id']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_users');
    }
};

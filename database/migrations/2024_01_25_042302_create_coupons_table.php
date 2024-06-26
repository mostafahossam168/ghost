<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->decimal('discount_amount', 8, 2); // For fixed amount, use decimal
            $table->unsignedTinyInteger('discount_percentage')->nullable(); // For percentage based discounts
            $table->timestamp('expires_at')->nullable();
            $table->unsignedInteger('usage_limit')->nullable(); // Limit number of times a coupon can be used
            $table->unsignedInteger('used')->default(0); // Number of times the coupon has been used
            $table->boolean('is_active')->default(true); // Whether the coupon is active or not
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};

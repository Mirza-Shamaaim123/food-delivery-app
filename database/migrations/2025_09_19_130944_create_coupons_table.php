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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Coupon Code
            $table->text('description')->nullable(); // Coupon Description
            $table->decimal('discount', 8, 2); // Discount Amount or Percentage
            $table->enum('discount_type', ['percentage', 'fixed']); // Discount Type (Percentage or Fixed Amount)
            $table->timestamp('expires_at')->nullable(); // Expiry Date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};

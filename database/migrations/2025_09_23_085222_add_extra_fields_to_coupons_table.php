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
        Schema::table('coupons', function (Blueprint $table) {
            //
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('usage_limit')->nullable();
            $table->integer('used_count')->default(0);
            $table->integer('per_user_limit')->nullable();
            $table->decimal('minimum_cart_amount', 10, 2)->nullable();
            $table->json('applies_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupons', function (Blueprint $table) {
            //
             $table->dropColumn([
            'is_active',
            'usage_limit',
            'used_count',
            'per_user_limit',
            'minimum_cart_amount',
            'applies_to',
        ]);
        });
    }
};

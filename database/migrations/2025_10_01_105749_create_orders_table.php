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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->constrained('users')->onDelete('cascade');

            // Billing Details
            $table->string('billing_first_name');
            $table->string('billing_last_name');
            $table->string('billing_company_name')->nullable();
            $table->string('billing_street_address');
            $table->string('billing_apartment_suite_unit')->nullable();
            $table->string('billing_city');
            $table->string('billing_country');
            $table->string('billing_postcode_zip');
            $table->string('billing_email_address');
            $table->string('billing_phone_number');

            // Shipping Details
            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_company_name')->nullable();
            $table->string('shipping_street_address');
            $table->string('shipping_apartment_suite_unit')->nullable();
            $table->string('shipping_city');
            $table->string('shipping_country');
            $table->string('shipping_postcode_zip');
            $table->string('shipping_email_address');
            $table->string('shipping_phone_number');

            // Order / Payment Details
            $table->string('payment_method')->nullable();
            $table->string('status')->default('pending'); // New status column

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

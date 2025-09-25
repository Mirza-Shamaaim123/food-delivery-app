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
        Schema::create('billing_details', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');  // First Name
            $table->string('last_name');   // Last Name
            $table->string('company_name')->nullable();  // Company Name (Optional)
            $table->string('street_address');  // Street Address
            $table->string('apartment_suite_unit')->nullable();  // Apartment, Suite, Unit (Optional)
            $table->string('city');  // City/Town
            $table->string('country');  // Country
            $table->string('postcode_zip');  // Postcode/Zip
            $table->string('email_address');  // Email Address
            $table->string('phone_number');  // Phone Number

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_details');
    }
};

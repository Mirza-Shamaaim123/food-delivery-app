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
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->string('shipping_first_name')->nullable()->change();
            $table->string('shipping_last_name')->nullable()->change();
            $table->string('shipping_company_name')->nullable()->change();
            $table->string('shipping_street_address')->nullable()->change();
            $table->string('shipping_apartment_suite_unit')->nullable()->change();
            $table->string('shipping_city')->nullable()->change();
            $table->string('shipping_country')->nullable()->change();
            $table->string('shipping_postcode_zip')->nullable()->change();
            $table->string('shipping_email_address')->nullable()->change();
            $table->string('shipping_phone_number')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->string('shipping_first_name')->nullable(false)->change();
            $table->string('shipping_last_name')->nullable(false)->change();
            $table->string('shipping_company_name')->nullable(false)->change();
            $table->string('shipping_street_address')->nullable(false)->change();
            $table->string('shipping_apartment_suite_unit')->nullable(false)->change();
            $table->string('shipping_city')->nullable(false)->change();
            $table->string('shipping_country')->nullable(false)->change();
            $table->string('shipping_postcode_zip')->nullable(false)->change();
            $table->string('shipping_email_address')->nullable(false)->change();
            $table->string('shipping_phone_number')->nullable(false)->change();
        });
    }
};

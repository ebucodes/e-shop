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
        Schema::create('seller_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('userID');
            $table->string('companyName');
            $table->string('companyEmail')->unique();
            $table->string('companyWebsite')->nullable();
            $table->string('companyFacebook')->nullable();
            $table->string('companyTwitter')->nullable();
            $table->string('companyInstagram')->nullable();
            $table->string('regNumber')->unique();
            $table->text('companyAddress');
            $table->string('companyPhone');
            $table->string('companyLocation');
            $table->text('companyLogo')->nullable();
            $table->string('bankName');
            $table->string('accountName');
            $table->string('accountNumber');
            $table->string('payStackID')->nullable();
            $table->string('payPalID')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_profiles');
    }
};

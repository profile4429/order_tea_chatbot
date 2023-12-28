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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 100);
            $table->string('address', 250);
            $table->string('phone', 50);
            $table->string('email', 250);
            $table->string('facebook', 100);
            $table->string('zalo', 50);
            $table->string('bank_name', 100);
            $table->string('bank_number', 100);
            $table->string('bank_address', 250);
            $table->longText('desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

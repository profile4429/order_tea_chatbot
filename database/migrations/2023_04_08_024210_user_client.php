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
        Schema::create('user_client', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 50);
            $table->string('email', 150);
            $table->string('phone_number', 20);
            $table->string('address', 200);
            $table->timestamps();
            $table->integer('deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_client');
    }
};


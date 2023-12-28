



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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('fullname', 50);
            $table->string('email', 150);
            $table->string('phone_number', 20);
            $table->string('address', 200);
            $table->longText('desc');
            $table->datetime('order_date');
            $table->integer('status');
            $table->integer('total_money');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('user_client');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
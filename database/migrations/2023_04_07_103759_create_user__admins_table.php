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
        Schema::create('User_Admin', function (Blueprint $table) {
            $table->id();
        $table->foreign('role_id')->references('id')->on('Role');
        $table->string('username', 50);
        $table->string('password', 32);
        $table->timestamps();
        $table->softDeletes();
        $table->unsignedBigInteger('role_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user__admins');
    }
};

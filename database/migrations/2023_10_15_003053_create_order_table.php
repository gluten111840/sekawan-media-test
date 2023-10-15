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
            $table->string('name');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_status_id');
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');

            $table->foreign('driver_id')->references('id')->on('driver');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('order_status_id')->references('id')->on('order_status');
            $table->timestamps();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('user_id');
            $table->unSignedBigInteger('route_id');
            $table->unSignedBigInteger('car_id');
            $table->string('seat_no');
            $table->boolean('payed');
            $table->boolean('approved');
            $table->integer('nbr_people');
            $table->integer('nbr_luggage');
            $table->string('pickup_date');
            $table->string('pickup_time');
            $table->string('pickup_full_add');
            $table->string('dropoff_full_add');
            $table->string('custom_message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

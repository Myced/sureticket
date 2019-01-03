<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_counts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('cookie')->nullable();
            $table->string('user')->nullable();
            $table->string('date');
            $table->string('mysql_date');
            $table->string('seat_count');
            $table->string('total');
            $table->string('booking_amount');
            $table->string('payment_method')->nullable();
            $table->boolean('booking_fee_paid')->default(false);
            $table->boolean('travel_fee_paid')->default(false);
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
        Schema::dropIfExists('booking_counts');
    }
}

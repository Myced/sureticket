<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('cookie_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('date');
            $table->string('mysql_date');
            $table->string('assigned_route_id');
            $table->string('route_id');
            $table->string('agency_id');
            $table->string('bus_id');
            $table->string('bus_number');
            $table->string('seat_id');
            $table->string('seat_no');
            $table->string('price');
            $table->string('status');
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

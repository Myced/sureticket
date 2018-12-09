<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->string('mysql_date');
            $table->string('agency_id');
            $table->string('route_id');
            $table->string('bus_id');
            $table->string('from_id');
            $table->string('to_id');
            $table->string('from_name');
            $table->string('to_name');
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
        Schema::dropIfExists('assigned_routes');
    }
}

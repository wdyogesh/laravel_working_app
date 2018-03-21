<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(0);
            $table->string('driver_name');
            $table->date('arrival_date');
            $table->time('arrival_time');
            $table->string('arrival_flight_number');
            $table->string('arrival_airline_company');
            $table->string('arrival_airport');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->string('departure_flight_number');
            $table->string('departure_airline_company');
            $table->string('departure_airport');
            $table->tinyInteger('return_trip')->default(0);
            $table->float('price',10,2)->default(0.0);
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
        Schema::dropIfExists('pickups');
    }
}

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
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('users');
            $table->integer('vacancy_id')->unsigned();
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id')->references('id')->on('users');
            $table->integer('status')->default(0);
            $table->string('host_type');
            $table->string('room_type');
            $table->string('city');
            $table->string('country');
            $table->string('school_name');
            $table->string('school_address');
            $table->date('checkin');
            $table->integer('length_stay');
            $table->date('checkout');
            $table->float('price',10,2)->default(0.0);
            
            $table->string('arrival_date')->nullable();
            $table->string('departure_date')->nullable();
            $table->string('arrival_time')->nullable();
            $table->string('flight_number')->nullable();
            $table->string('airport')->nullable();
            $table->string('airline_company')->nullable();

            $table->tinyInteger('pickup')->default(0);
            $table->tinyInteger('return_trip')->default(0);
            $table->tinyInteger('same_address')->default(1);
            $table->string('return_trip_address')->nullable();

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

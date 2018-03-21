<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('house_id')->unsigned();
            $table->foreign('house_id')->references('id')->on('houses');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('bed_type');
            $table->string('bathroom_type');
            $table->tinyInteger('is_available')->default(0);
            $table->date('availability_from')->nullable();
            $table->date('availability_to')->nullable();
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
        Schema::dropIfExists('vacancies');
    }
}

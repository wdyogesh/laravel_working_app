<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_vacancy', function (Blueprint $table){
            $table->integer('feature_id')->unsigned();
            $table->integer('vacancy_id')->unsigned();

            $table->foreign('feature_id')->references('id')->on('features');
            $table->foreign('vacancy_id')->references('id')->on('vacancies');

            $table->primary(['feature_id', 'vacancy_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_vacancy');
    }
}

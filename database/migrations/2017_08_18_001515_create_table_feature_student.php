<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFeatureStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_student', function (Blueprint $table){
            $table->integer('feature_id')->unsigned();
            $table->integer('student_id')->unsigned();

            $table->foreign('feature_id')->references('id')->on('features');
            $table->foreign('student_id')->references('id')->on('students');

            $table->primary(['feature_id', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_student');
    }
}

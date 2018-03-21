<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('gender');
            $table->string('passport_number');
            $table->date('date_birth');
            $table->string('phone_number');
            $table->string('mobile_number');
            $table->string('country');
            $table->string('address');
            $table->string('english_level');
            $table->string('about_student');
            
            $table->string('emergency_first_name');
            $table->string('emergency_last_name');
            $table->string('emergency_email');
            $table->string('emergency_phone_number');
            $table->string('emergency_country');
            $table->string('emergency_relationship');
            $table->string('emergency_mobile_number');

            $table->tinyInteger('objec_pets')->default(1);
            $table->tinyInteger('objec_kids')->default(1);
            $table->tinyInteger('medical_issue')->default(0);
            $table->string('medical_issue_desc')->nullable();
            $table->tinyInteger('allergy')->default(0);
            $table->string('allergy_desc')->nullable();
            $table->tinyInteger('dietary_request')->default(0);
            $table->tinyInteger('special_needs')->default(0);
            $table->string('special_needs_desc')->nullable();
            $table->tinyInteger('smoke')->default(0);

            $table->string('partner_code');

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
        Schema::dropIfExists('students');
    }
}

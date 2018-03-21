<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('host_type')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('occupation')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('hear_about_us')->nullable();
            $table->tinyInteger('hosted_students_before')->default(0);
            $table->string('since_when')->nullable();
            $table->tinyInteger('can_students_smoke')->default(0);
            $table->tinyInteger('have_pets')->default(0);
            $table->tinyInteger('have_kids')->default(0);
            $table->tinyInteger('special_dietarian')->default(0);
            $table->tinyInteger('profile_completed')->default(0);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('hosts');
    }
}

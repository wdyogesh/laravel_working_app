<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_host', function (Blueprint $table){
            $table->integer('feature_id')->unsigned();
            $table->integer('host_id')->unsigned();

            $table->foreign('feature_id')->references('id')->on('features');
            $table->foreign('host_id')->references('id')->on('hosts');

            $table->primary(['feature_id', 'host_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_host');
    }
}

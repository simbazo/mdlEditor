<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmersFarmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_farms', function (Blueprint $table) {
            $table->integer('farmer_id')->unsigned();
            $table->integer('farm_id')->unsigned();

            $table->foreign('farmer_id')->references('uuid')->on('farmers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('farm_id')->references('uuid')->on('farms')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('farmer_farms', function (Blueprint $table) {
            //
        });
    }
}

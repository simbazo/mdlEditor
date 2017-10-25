<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcgActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icg_activations', function (Blueprint $table) {
            $table->increments('uuid');
            $table->integer('user_uuid')->index()->unsigned();
            $table->string('token');
            $table->integer('pin');
            $table->timestamps();
            $table->foreign('user_uuid')->references('uuid')->on('icg_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icg_activations');
    }
}

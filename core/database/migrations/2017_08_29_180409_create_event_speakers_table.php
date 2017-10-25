<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_speakers', function (Blueprint $table) {
            $table->integer('event_uuid')->unsigned();
            $table->integer('speaker_uuid')->unsigned();


            $table->foreign('event_uuid')->references('uuid')->on('events')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('speaker_uuid')->references('uuid')->on('speakers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_speakers', function (Blueprint $table) {
            //
        });
    }
}

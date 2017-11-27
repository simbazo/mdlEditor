<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContentlookup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contentlookup', function (Blueprint $table) {
            $table->increments('uuid')->unsigned()->nullable(false);
            $table->integer('nodeID')->nullable(false);
            $table->integer('key_uuid')->unsigned()->nullable(false);
            $table->string('value')->nullable(false);
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();
            $table->integer('user_deleted')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('nodeID')->references('ID')->on('Content')->onUpdated('cascade')->onDelete('restrict');
            $table->foreign('key_uuid')->references('uuid')->on('lookupkey')->onUpdated('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contentlookup');
    }
}

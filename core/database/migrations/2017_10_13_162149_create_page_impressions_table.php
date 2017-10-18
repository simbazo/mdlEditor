<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageImpressionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_impressions', function (Blueprint $table) {
            $table->increments('uuid');
            $table->date('date')->nullable(false);
            $table->integer('user_uuid')->unsigned()->nullable(false);
            $table->integer('application_uuid')->unsigned()->nullable(false);
            $table->string('device_uuid')->nullable(false);
            $table->integer('node_uuid')->unsigned()->nullable(false);
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();
            $table->integer('user_deleted')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_uuid')->references('uuid')->on('users')->onDelete('cascade');
            $table->foreign('application_uuid')->references('uuid')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_impressions');
    }
}

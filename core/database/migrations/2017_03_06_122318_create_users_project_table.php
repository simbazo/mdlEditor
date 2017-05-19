<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_projects',function(Blueprint $table){
            $table->integer('project_id');
            $table->integer('user_id');
            /*
            $table->foreign('project_id')->references('uuid')->on('Project')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('user_id')->references('uuid')->on('users')->onUpdate('cascade')->onDelete('restrict');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_projects');
    }
}

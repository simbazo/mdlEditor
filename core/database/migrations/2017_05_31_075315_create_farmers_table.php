<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->increments('uuid');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('id_number')->nullable();
            $table->date('dob')->nullable();
            $table->integer('gender_id')->nullable();
            $table->integer('race_id')->nullanle();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->integer('country_id');
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('postal_code');
            $table->string('user_created')->nullable();
            $table->string('user_updated')->nullable();
            $table->string('user_deleted')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('farmers');
    }
}

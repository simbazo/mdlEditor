<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('uuid');
            $table->string('short_name')->unique();
            $table->string('long_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->integer('country_id');
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('postal_code');
            $table->string('contact_person_fname')->nullable();
            $table->string('contact_person_lname')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('contact_person_cell')->nullable();
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();
            $table->integer('user_deleted')->nullable();
            $table->softDeletes();
            $table->timestamps();

            /*
            $table->foreign('user_created')->references('uuid')->on('users')->onUpdated('cascade')->onDelete('restrict');
            $table->foreign('user_updated')->references('uuid')->on('users')->onUpdated('cascade')->onDelete('restrict');
            $table->foreign('user_deleted')->references('uuid')->on('users')->onUpdated('cascade')->onDelete('restrict');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('uuid');
            $table->string('contact_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('cell')->nullable();
            $table->string('email')->nullable();
            $table->string('skype')->nullable();
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();
            $table->integer('user_deleted')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}

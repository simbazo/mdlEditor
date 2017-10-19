<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateIcgUsersAddAdditionalFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('icg_users', function (Blueprint $table) {
            $table->string('level')->nullable();
            $table->string('country')->nullable();
            $table->string('province')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('icg_users', function (Blueprint $table) {
            $table->dropColumn(['level', 'country', 'province']);
        });
    }
}

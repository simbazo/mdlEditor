<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableIcgUsersAddAgeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('icg_users', function (Blueprint $table) {
            $table->string('age')->nullable(true);
            $table->string('level')->nullable(true)->change();
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
            $table->dropColumn('age');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_address', function (Blueprint $table) {
            $table->unsignedBigInteger('province_id')->after('province')->nullable();
            $table->unsignedBigInteger('city_id')->after('city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_address', function (Blueprint $table) {
            $table->dropColumn(['province_id', 'city_id']);
        });
    }
}

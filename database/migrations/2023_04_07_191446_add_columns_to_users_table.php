<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->after('email')->nullable();
            $table->string('whatsapp')->after('phone')->nullable();
            $table->unsignedBigInteger('address_id')->after('whatsapp')->nullable();
            $table->string('role')->after('avatar')->default('admin');

            // Add foreign key constraint to users_address table
            $table->foreign('address_id')->references('id')->on('users_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
            $table->dropColumn(['phone', 'whatsapp', 'address_id']);
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('payment_number')->nullable();
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('receiver_province');
            $table->string('receiver_city');
            $table->string('receiver_address');
            $table->string('receiver_zip_code');
            $table->integer('subtotal');
            $table->integer('shipping');
            $table->integer('total_amount');
            $table->string('shipping_receipt')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

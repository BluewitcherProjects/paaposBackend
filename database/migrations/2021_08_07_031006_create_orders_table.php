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
            $table->integer('product_id');
            $table->string('user_id');
            $table->string('product_name');
            $table->string('UserName');
            $table->string('Mobile');
            $table->string('Delivery_charge');
            $table->string('Pickup_location');
            $table->string('Drop_location');
            $table->integer('Cod')->nullable();
            $table->integer('Wallet');
            $table->string('Admin_commision')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
}

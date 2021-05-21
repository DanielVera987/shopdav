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
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
            $table->foreignId('order_statu_id')
                ->references('id')
                ->on('order_status');
            $table->foreignId('coupon_id')
                ->nullable()
                ->references('id')
                ->on('coupons');
            $table->string('shipping_type'); // Entrega a Domicilio o Tienda
            $table->float('shipping_cost'); // Costo de Envio
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

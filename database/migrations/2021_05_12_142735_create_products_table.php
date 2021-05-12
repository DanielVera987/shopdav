<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('code');
            $table->float('price', 10, 2);
            $table->string('quantity');
            $table->foreignId('subcategory_id')
                ->references('id')
                ->on('subcategories');
            $table->foreignId('brand_id')
                ->references('id')
                ->on('brands');
            $table->foreignId('discount_id')
                ->references('id')
                ->on('discounts');
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
        Schema::dropIfExists('products');
    }
}

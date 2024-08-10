<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Adding type field as a string
            $table->timestamps();
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->integer('amount');
            $table->primary(['order_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
    }
};

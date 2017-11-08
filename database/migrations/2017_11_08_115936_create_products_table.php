<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_type_id')->unsigned();
            $table->foreign('product_type_id')->
            references('id')->
            on('product_types')->
            onDelete('cascade');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->
            references('id')->
            on('categories')->
            onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('image');

        });
    }
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

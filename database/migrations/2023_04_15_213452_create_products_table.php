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

            Schema::create('product', function (Blueprint $table) {
                $table->increments('id');
                $table->string('image')->default('default.png');
                $table->integer('category_id')->unsigned();
                $table->double('price');
                $table->boolean('have_offfer')->default('0');
                // $table->integer('discount');
                $table->double('finally_price');
                $table->timestamps();
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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

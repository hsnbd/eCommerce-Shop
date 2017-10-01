<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->tinyInteger('customersid')->unsigned();
            $table->tinyInteger('productsid')->unsigned();
            $table->string('rating',10);
            $table->string('messege',100);
            $table->date('date');
            $table->foreign('customersid')->references('id')->on('customers');
            $table->foreign('productsid')->references('id')->on('products');
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
        Schema::dropIfExists('reviews');
    }
}

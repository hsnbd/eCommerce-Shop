<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesdetail', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->tinyInteger('salesid')->unsigned();
            $table->tinyInteger('productsid')->unsigned();
            $table->integer('quantity');
            $table->float('vat',4,2);
            $table->float('discount',5,2);
            $table->foreign('salesid')->references('id')->on('sales');
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
        Schema::dropIfExists('salesdetail');
    }
}

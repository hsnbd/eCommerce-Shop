<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('title', 100)->unique();
            $table->text('description');
            $table->float('price', 8, 2);
            $table->float('vat', 4, 2);
            $table->float('discount', 6, 2);
            $table->tinyInteger('unitsid')->unsigned();
            $table->tinyInteger('subcategoriesid')->unsigned();
            $table->float('weight', 8, 2);
            $table->smallInteger('size')->nullable();
            $table->float('stock', 10, 2);
            $table->string('picture1', 50)->nullable();
            $table->string('picture2', 50)->nullable();
            $table->string('picture3', 50)->nullable();
            $table->smallInteger('default_picture')->nullable();
            $table->foreign('unitsid')->references('id')->on('units');
            $table->foreign('subcategoriesid')->references('id')->on('subcategories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }

}

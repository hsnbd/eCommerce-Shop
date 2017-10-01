<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDislikesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dislikes', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('reviewsid')->unsigned();
            $table->tinyInteger('customersid')->unsigned();
            $table->foreign('reviewsid')->references('id')->on('reviews');
            $table->foreign('customersid')->references('id')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('dislikes');
    }

}

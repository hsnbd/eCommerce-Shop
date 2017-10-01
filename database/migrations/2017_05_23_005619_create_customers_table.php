<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name',60);
            $table->string('email',60)->unique();
            $table->string('password',60);
            $table->string('contact',14);
            $table->string('address',100);
            $table->tinyInteger('citiesid')->unsigned();
            $table->string('gender',6);
            $table->string('picture',100);
            $table->foreign('citiesid')->references('id')->on('cities');
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
        Schema::dropIfExists('customers');
    }
}

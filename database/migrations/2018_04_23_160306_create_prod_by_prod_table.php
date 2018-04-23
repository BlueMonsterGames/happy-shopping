<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdByProdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('prod_by_prod', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_main')->unsigned();
            $table->foreign('id_main')->references('id')->on('all_products');
            $table->integer('id_1')->unsigned();
            $table->foreign('id_1')->references('id')->on('all_products');
            $table->integer('id_2')->unsigned();
            $table->foreign('id_2')->references('id')->on('all_products');
            $table->integer('id_3')->unsigned();
            $table->foreign('id_3')->references('id')->on('all_products');
            $table->integer('id_4')->unsigned();
            $table->foreign('id_4')->references('id')->on('all_products');
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
        Schema::dropIfExists('prod_by_prod');
    }
}

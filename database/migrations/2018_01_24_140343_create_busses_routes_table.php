<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBussesRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busses_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('routes_id')->unsigned()->index()->nullable();
            $table->foreign('routes_id')->references('id')->on('routes');
            $table->integer('busses_id')->unsigned()->index()->nullable();         
            $table->foreign('busses_id')->references('id')->on('busses');
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
        Schema::dropIfExists('busses_routes');
    }
}

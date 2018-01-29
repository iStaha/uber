<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('from');
            $table->string('to');
            $table->date('depart');
            $table->date('arrive')->nullable();
            $table->date('timein');
            $table->date('timereturn')->nullable();
            $table->boolean('return');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            
          /*  $table->integer('busses_id')->unsigned()->index()->nullable();
            $table->integer('routes_id')->unsigned()->index()->nullable();          
            $table->foreign('busses_id')->references('id')->on('busses');
            $table->foreign('routes_id')->references('id')->on('routes');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

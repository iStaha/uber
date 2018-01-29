<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from');
            $table->string('to'); 
            $table->date('Depart');
            $table->string('bus')->nullable();;
            $table->time('timein');
            $table->time('timereturn')->nullable();
            $table->date('Arrive');
            $table->boolean('Ret');
            $table->string('Duration');
            $table->integer('fare')->default(25); 
            $table->integer('capaciy')->nullable(); 
            $table->integer('seats_booked')->default(0);
            $table->integer('profit')->default(0);      
         /* $table->integer('busses_id')->unsigned()->index()->nullable();         
            $table->foreign('busses_id')->references('id')->on('routes');*/
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
        Schema::dropIfExists('routes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDrawResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draw_result', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('draw_id')->unsigned();
            $table->integer('first_person_id')->unsigned();
            $table->integer('second_person_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('draw_id')->references('id')->on('draw')->onDelete('cascade');
            $table->foreign('first_person_id')->references('id')->on('draw_person')->onDelete('cascade');
            $table->foreign('second_person_id')->references('id')->on('draw_person')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('draw_result');
    }
}

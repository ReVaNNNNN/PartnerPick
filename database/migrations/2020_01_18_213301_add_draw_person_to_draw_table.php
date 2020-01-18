<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDrawPersonToDrawTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draw_person_to_draw', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('draw_id')->unsigned();
            $table->integer('draw_person_id')->unsigned();
            $table->timestamps();

            $table->foreign('draw_id')->references('id')->on('draw')->onDelete('cascade');
            $table->foreign('draw_person_id')->references('id')->on('draw_person')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('draw_person_to_draw');
    }
}

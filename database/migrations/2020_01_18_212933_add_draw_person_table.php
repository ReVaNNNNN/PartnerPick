<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDrawPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draw_person', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('id')->references('draw_person_id')->on('draw_person_to_draw')->onDelete('cascade');
            $table->foreign('id')->references('first_person_id')->on('draw_result')->onDelete('cascade');
            $table->foreign('id')->references('second_person_id')->on('draw_result')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('draw_person');
    }
}

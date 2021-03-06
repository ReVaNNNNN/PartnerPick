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
            $table->integer('draw_id')->unsigned();;
            $table->string('name');
            $table->timestamps();

            $table->foreign('draw_id')->references('id')->on('draw')->onDelete('cascade');
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

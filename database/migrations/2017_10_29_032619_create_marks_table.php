<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projectid')->unsigned();
            $table->integer('userid')->unsigned();
            $table->integer('markerid')->unsigned();
            $table->integer('score');
            $table->string('comment');
            $table->timestamps();

            $table->foreign('projectid')->references('id')->on('projects');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('markerid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}

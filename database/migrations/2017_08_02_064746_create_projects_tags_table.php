<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_tags', function (Blueprint $table) {
            $table->integer('projectid')->unsigned();
            $table->integer('tagid')->unsigned();
            $table->timestamps();

            // constraints
            $table->primary(['projectid', 'tagid']);
            $table->foreign('projectid')->references('id')->on('projects');
            $table->foreign('tagid')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_tags');
    }
}

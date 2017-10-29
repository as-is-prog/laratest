<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Tag;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->timestamps();
        });

        Tag::create(['name' => 'tag1']);
        Tag::create(['name' => 'tag2']);
        Tag::create(['name' => 'tag3']);
        Tag::create(['name' => 'tag4']);
        Tag::create(['name' => 'tag5']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}

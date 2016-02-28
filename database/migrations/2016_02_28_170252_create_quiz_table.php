<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizes', function(Blueprint $t){
            $t->increments('id');
            $t->string('title');
            $t->string('title_quiz');
            $t->string('ogtitle');
            $t->string('title_view');
            $t->string('text');
            $t->string('color');
            $t->text('description');
            $t->text('photo_coords');
            $t->text('text_coords');
            $t->text('controller_path');
            $t->text('view_path');
            $t->text('sample_path');
            $t->text('upload_path');
            $t->text('photos_path');
            $t->tinyInteger('option');
            $t->string('lang');

            $t->timestamps();
            $t->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quizes');
    }
}

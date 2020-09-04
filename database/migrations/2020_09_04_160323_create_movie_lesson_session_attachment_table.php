<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;


class CreateMovieLessonSessionAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_less_sess_attachment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('less_sess_attachment_id')->constrained('less_sess_attachment')->onDelete('cascade');
            $table->timestamps();
            $table->json('duration')->default(new Expression('(JSON_ARRAY())'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_less_sess_attachment');
    }
}

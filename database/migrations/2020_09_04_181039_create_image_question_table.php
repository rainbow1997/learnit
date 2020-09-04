<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_question', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
         $table->foreignId('question_id')->constrained('question')->onDelete('cascade');
         $table->foreignId('question_attachment_id')->constrained('question_attachment')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_question');
    }
}

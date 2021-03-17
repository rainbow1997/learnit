<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnerAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learner_answer', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('learner_id');
            $table->foreignId('exam_id');
            $table->foreignId('question_id');
            $table->foreignId('quesopt_id');
            $table->boolean('is_true');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learner_answer');
    }
}

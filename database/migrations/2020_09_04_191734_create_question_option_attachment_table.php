<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionOptionAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quest_opt_attach', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attachment_id')->constrained('attachment')->onDelete('cascade');
            $table->foreignId('question_option_id')->constrained('question_option')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quest_opt_attach');
    }
}

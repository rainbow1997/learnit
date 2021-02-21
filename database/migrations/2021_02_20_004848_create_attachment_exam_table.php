<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment_exam', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('attachment_id')->constrained('attachments')->onDelete('cascade');
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachment_exam');
    }
}

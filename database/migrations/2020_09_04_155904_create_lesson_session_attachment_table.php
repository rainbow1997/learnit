<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonSessionAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('less_sess_attachment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attachment_id')->constrained('attachment')->onDelete('cascade');
            $table->timestamps();
            $table->foreignId('lesson_session_id')->constrained('lesson_session')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('less_sess_attachment');
    }
}

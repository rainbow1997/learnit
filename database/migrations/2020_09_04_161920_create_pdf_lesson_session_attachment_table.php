<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfLessonSessionAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_less_sess_attachment', function (Blueprint $table) {
            $table->id();
           // $table->foreignId('less_sess_attachment_id')->constrained('less_sess_attachment')->onDelete('cascade');
            $table->timestamps();
            $table->integer('pages_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pdf_less_sess_attachment');
    }
}

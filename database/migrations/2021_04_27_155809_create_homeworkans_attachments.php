<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkansAttachments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworkans_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('homeworkanswers_id')->constrained('homeworkanswers');
            $table->foreignId('attachment_id')->constrained('attachments');

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
        Schema::dropIfExists('homeworkans_attachments');
    }
}

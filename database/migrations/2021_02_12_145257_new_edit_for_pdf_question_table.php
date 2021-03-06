<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewEditForPdfQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            if(Schema::hasTable('attachment'))
                Schema::rename('attachment', 'attachments');
        Schema::table('pdf_question', function (Blueprint $table) {
            //
            $table->dropForeign(['question_attachment_id']); //inkar nmikonehao
            $table->dropColumn('question_attachment_id');
            if(!Schema::hasColumn('attachments','attachment_id'))
                $table->foreignId('attachment_id')->constrained('attachments')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pdf_question', function (Blueprint $table) {
            //
        });
    }
}

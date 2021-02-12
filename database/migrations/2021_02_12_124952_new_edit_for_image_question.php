<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewEditForImageQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('image_question', function (Blueprint $table) {
            //
            $table->dropForeign(['question_attachment_id']); //inkar nmikonehao
            $table->dropColumn('question_attachment_id');
            $table->foreignId('attachment_id')->constrained('attachment')->onDelete('cascade')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_question', function (Blueprint $table) {
            //
        });
    }
}

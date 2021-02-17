<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class New2theditTablePdfSessAtt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('pdf_less_sess_attachment'))
            Schema::drop('pdf_less_sess_attachment');
        Schema::table('pdf_attachment', function (Blueprint $table) {
            //
            if(Schema::hasColumn('pdf_attachment','session_attachment_id')) {
                $table->dropForeign(['session_attachment_id']); //inkar nmikonehao
                $table->dropColumn('session_attachment_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pdf_attachment', function (Blueprint $table) {
            //
        });
    }
}

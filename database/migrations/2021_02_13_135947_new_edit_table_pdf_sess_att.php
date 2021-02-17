<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewEditTablePdfSessAtt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('pdf_session_att'))
            Schema::rename('pdf_session_att', 'pdf_attachment');
        Schema::table('pdf_attachment', function (Blueprint $table) {
            //
            if(!Schema::hasColumn('pdf_attachment','session_attachment_id')) {
              //  $table->dropForeign(['session_attachment_id']); //inkar nmikonehao
              //  $table->dropColumn('session_attachment_id');
            }
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
        Schema::table('pdf_attachment', function (Blueprint $table) {
            //
        });
    }
}

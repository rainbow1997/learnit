<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewArchiveSessAtt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('archive_session_att'))
            Schema::rename('archive_session_att', 'archive_attachment');
        Schema::table('archive_attachment', function (Blueprint $table) {
            //
            $table->foreignId('attachment_id')->constrained('attachments')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('archive_session_att'))
            Schema::rename('archive_session_att', 'archive_attachment');
        Schema::table('archive_attachment', function (Blueprint $table) {
            //
        });
    }
}

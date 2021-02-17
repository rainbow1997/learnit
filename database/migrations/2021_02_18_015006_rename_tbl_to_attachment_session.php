<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTblToAttachmentSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('session_attachment', function (Blueprint $table) {
            //
            Schema::rename('session_attachment','attachment_session');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('attachment_session','session_attachment');

        Schema::table('session_attachment', function (Blueprint $table) {
            //

        });
    }
}

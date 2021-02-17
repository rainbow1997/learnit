<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewEditForArchiveSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('pdf_less_sess_attachment','pdf_session_att');


        Schema::table('archive_less_sess_attachment', function (Blueprint $table) {
            //
          //  $table->renameColumn('less_sess_attachment_id','session_attachment_id');
            $table->mediumText('format');

        });
        Schema::rename('archive_less_sess_attachment','archive_session_att');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('archive_less_sess_attachment', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewEditForPdfSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('pdf_less_sess_attachment', function (Blueprint $table) {
            //less_sess_attachment_id
            $table->renameColumn('less_sess_attachment_id','session_attachment_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pdf_less_sess_attachment', function (Blueprint $table) {
            //
        });
    }
}

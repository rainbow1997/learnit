<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimpleExamsTblRename extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('simple_exams_tbl', function (Blueprint $table) {
            //
        });
        Schema::rename('simple_exams_tbl','simple_exams');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('simple_exams_tbl', function (Blueprint $table) {
            //
        });
    }
}

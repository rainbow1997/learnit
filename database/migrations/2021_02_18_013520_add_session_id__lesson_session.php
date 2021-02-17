<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSessionIdLessonSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lesson_session', function (Blueprint $table) {
            //
            $table->foreignId('session_id')->constrained('sessions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lesson_session', function (Blueprint $table) {
            //
            $table->dropForeign(['session_id']);
            $table->dropColumn('session_id');
        });
    }
}

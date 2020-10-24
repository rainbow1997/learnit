<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::dropIfExists('official_users');
        //  Schema::dropIfExists('employee_o_u');
        // Schema::dropIfExists('student_users');
        Schema::dropIfExists('teachers');
        Schema::create('teachers', function (Blueprint $table) {
            //
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}

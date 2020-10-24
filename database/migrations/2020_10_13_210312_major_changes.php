<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MajorChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {

                $table->integer('userable_id');
                $table->string('userable_type');
            });
            Schema::create('officials', function (Blueprint $table)
                {
                    $table->id();
                    $table->integer('officialable_id');
                    $table->string('officialable_type');
                    $table->timestamps();
                });
        Schema::rename('teacher_o_u','teachers');


        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('officials');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class AddPresonOrUserToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->string('fname');
            $table->string('lname');
            $table->bigInteger('nationalcode')->unique();
            $table->date('birthdate');
            $table->bigInteger('mobile')->unique();
            $table->bigInteger('second_mobile');
            $table->bigInteger('telephone');
            $table->string('webpage');
            $table->string('education_place');
            $table->lineString('study_field');
            $table->lineString('study_orention');
            $table->json('avatar')->default(new Expression('(JSON_ARRAY())'));
            $table->boolean('status')->default(TRUE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

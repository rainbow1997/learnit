<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditRoleUserTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_users', function (Blueprint $table) {
            //
            $table->renameColumn('users_id','user_id');
            $table->renameColumn('roles_id','role_id');

        });
        Schema::rename('role_users','role_user');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_user', function (Blueprint $table) {
            //
            Schema::rename('role_user','role_users');
            $table->renameColumn('user_id','users_id');
            $table->renameColumn('role_id','roles_id');
        });
    }
}

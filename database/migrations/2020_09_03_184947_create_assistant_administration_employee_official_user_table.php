<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistantAdministrationEmployeeOfficialUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assist_admin_employee_o_u', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_employee_o_u_id')->constrained('admin_employee_o_u')->onDelete('cascade');

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
        Schema::dropIfExists('assist_admin_employee_o_u');
    }
}

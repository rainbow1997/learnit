<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQbankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qbank', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained('lesson')->onDelete('cascade');
            $table->boolean('status')->default(TRUE);
            $table->mediumText('describe');
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
        Schema::dropIfExists('qbank');
    }
}

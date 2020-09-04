<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained('lesson')->onDelete('cascade');
            $table->float('total_score');
            $table->float('approval_score');
            $table->foreignId('qbank_id')->constrained('qbank')->onDelete('cascade');
            $table->timestamps();
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
        Schema::dropIfExists('exam');
    }
}

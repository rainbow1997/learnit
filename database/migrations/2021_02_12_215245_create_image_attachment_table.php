<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_attachment', function (Blueprint $table) {
            //
            if(!Schema::hasColumn('image_attachment','created_at'))
                $table->timestamps();
            if(!Schema::hasColumn('image_attachment','attachment_id'))
              $table->foreignId('attachment_id')->constrained('attachments')->onDelete('cascade')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_attachment', function (Blueprint $table) {
            //
        });
    }
}

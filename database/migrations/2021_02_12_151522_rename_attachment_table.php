<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * //user_id baraye ineke dars ha asatid mokhtalef drn
     */
    public function up()
    {
        if(Schema::hasTable('attachment'))
            Schema::rename('attachment', 'attachments');
        Schema::table('attachments', function (Blueprint $table) {
            //
            if(Schema::hasColumn('attachments','user_id'))
                $table->renameColumn('user_id','teacher_id');
            if(Schema::hasColumn('attachments','ip_address'))
                $table->dropColumn('ip_address');
            if(Schema::hasColumn('attachments','user_agent'))
                $table->dropColumn('user_agent');
            if(Schema::hasColumn('attachments','last_activity'))
                $table->dropColumn('last_activity');
            if(!Schema::hasColumn('attachments','created_at'))
                $table->timestamps();

            $table->morphs('attachmentable');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attachment', function (Blueprint $table) {
            //
        });
    }
}

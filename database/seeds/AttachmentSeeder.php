<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Attachment\Attachment as Attachment;
class AttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//      Attachment::factory()->create();
////        $this->call([
//                AttachmentSeeder::class
//        ]);
        //'App\Attachment\Attachment'::factory()->count(10)->
        //
        DB::table('attachments')->insert([
            'describe' => Str::random(30),
            'size'=>rand(1000,30000),
            'attachmentable_type' => 'App\Attachment\ArchiveAttachment',
            'attachmentable_id'=>rand(0,10)

        ]);
    }
}

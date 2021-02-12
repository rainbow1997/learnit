<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;
class ImageQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('image_question')->insert([
            'question_id' => rand(1, 12),
            'attachment_id' => rand(1, 12),

        ]);
    }
}

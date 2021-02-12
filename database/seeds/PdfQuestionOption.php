<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PdfQuestionOption extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //
        DB::table('pdf_ques_opt')->insert([
            'question_option_id' => rand(1, 12),
            'attachment_id' => rand(1, 12),

        ]);
    }
}

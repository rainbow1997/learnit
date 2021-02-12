<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PdfQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pdf_question')->insert([
            'question_id' => rand(1, 12),
            'attachment_id' => rand(1, 12),

        ]);
    }
}

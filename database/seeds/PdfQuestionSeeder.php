<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
            'question_id' => rand(0, 12),
            'attachment_id' => rand(0, 12),

        ]);
    }
}

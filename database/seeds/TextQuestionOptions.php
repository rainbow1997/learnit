<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TextQuestionOptions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('text_ques_opt')->insert([
            'option_Text' => Str::random(10),
            'question_option_id' => rand(0,3),


        ]);
    }
}

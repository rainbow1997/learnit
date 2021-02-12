<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class QuestionOptions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('question_options')->insert([
            'question_id'=>rand(2,12),
            'isAnswer' => rand(0,1),
            'quesoptable_type'=>'',
            'quesoptable_id'=>rand(2,12)




        ]);
    }
}

<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        DB::table('questions')->insert([
            'qbank_id'=>rand(1,5),
           // 'describe' => Str::random(30),
            'questionable_type' => 'App\QBank\PdfQuestion',
            'questionable_id' => rand(0,9),




        ]);
    }
}

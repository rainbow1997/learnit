<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('lessons')->insert([
            'term_id'=>rand(1,7),
            'name' => Str::random(10),
            'registration_capacity'=>rand(0,100),
            'units'=>rand(1,5),
            'pay_per_unit'=>rand(100000,300000),

        ]);
    }
}

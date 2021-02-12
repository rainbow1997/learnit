<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('terms')->insert([
            'status'=>rand(0,1),
           'term_start_date'=>date('c',time()),
           'term_end_date'=>date('c',time()+10000),
           // 'describe' => Str::random(30),


        ]);
    }
}

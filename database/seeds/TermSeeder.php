<?php

namespace Database\Seeders;
use Carbon\Carbon;

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
           'term_start_date'=>Carbon::now(),
           'term_end_date'=>Carbon::now()->add(100,'day'),
           // 'describe' => Str::random(30),


        ]);
    }
}

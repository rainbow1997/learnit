<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('attachment')->insert([
            'describe' => Str::random(30),
            'size'=>rand(1000,30000),
            //'' => 'App\QBank\TextQuestion',

        ]);
    }
}

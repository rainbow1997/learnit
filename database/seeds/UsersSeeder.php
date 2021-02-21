<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
                'fname'=>Str::random(10),
                'lname'=>Str::random(10),
                'password'=>\Hash::make(Str::random(20)),

                'email'=>Str::random(10).'@gmail.com',
                'nationalcode'=>rand(1111,999),
                'birthdate'=>date('y-m-d'),
                'mobile'=>rand(1111,9999),
                'second_mobile'=>rand(1111,9999),
                'telephone'=>rand(1111,9999),
                'education_place'=>Str::random(20),
                'study_field'=>Str::random(20),
                'study_orention'=>Str::random(20),
                'webpage'=>Str::random(20),
                'userable_id'=>1,
                'userable_type'=>'App\Users\Learner'



        ]);

    }
}

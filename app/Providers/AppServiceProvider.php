<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        Relation::morphMap([
//
//            'learner'=>'App\Users\Learner',
//            'official'=>'App\Users\Official',
//            'student'=>'App\Users\Student',
//            'teacher'=>'App\Users\Teacher'
//
//
//
//        ]);
    }
}

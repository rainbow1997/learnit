<?php

use Illuminate\Support\Facades\Route;
use App\Http\MiddleWare\CheckIp;
use App\Http\MiddleWare\CheckLanguage;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',function()
{
      return redirect(config('app.locale').'/welcome');
});
Route::middleware([CheckLanguage::class])->group(function()
{
  
    Route::prefix('/{locale}')->group(function()
    {
        Route::get('/',function()
{
      return redirect(config('app.locale').'/welcome');
});
       
        Route::get('welcome',function()
        {
              return view('welcome');
        });
        Route::get('hello-world',function()
        {
              return view('hello-world');
        });

    });
   
});
/*
Route::get('/{locale}',function($locale){
    if (! in_array($locale, ['en', 'fa-IR', 'fr'])) {
        abort(400);
    }
    App::setLocale($locale);
    Route::get('hello-world', function () {
        die('et');
        return view('hello-world');
    })->name('hello-world');
    Route::get('welcome', function () {
        return view('welcome');
    });
});

  
    
//});

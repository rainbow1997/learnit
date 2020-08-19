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
})->middleware(CheckLanguage::class);
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

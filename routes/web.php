<?php

use Illuminate\Support\Facades\Route;
use App\Http\MiddleWare\CheckIp;
use Illuminate\Foundation\Application as App;

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
Route::middleware([CheckLanguage::class])->group(function()
{
      Route::get('/',function()
      {

            return redirect(config('app.locale').'/welcome');
      });
      Route::get('/{locale}',function()
      {

            return redirect(config('app.locale').'/welcome');
      });
      Route::get('/{locale}/welcome',function($locale)
      {
            return view('welcome');
      });
});
   
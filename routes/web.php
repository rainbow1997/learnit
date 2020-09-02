<?php

use App\Http\Middleware\CheckLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


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
//cookie set cookie()-queue()
//cookie get request()->cookie()
 Route::get('/', function () 
{
 
     return redirect(App::getLocale().'/welcome');
  
})->middleware(CheckLanguage::class);

Route::prefix('{locale}')->group(function(){
  Route::get('/', function ($locale) {
        return redirect($locale.'/welcome');
      });
  Route::get('/welcome', function () {
    return view('welcome');
  });
  Auth::routes();
  Route::get('/home','HomeController@index');
});

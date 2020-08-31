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
   // echo "befpreRpikte".$request->cookie('language').'<br/>';
 //   return ('CookieInRoute\'/\''.request()->cookie('language'));
     return redirect(App::getLocale().'/welcome');
  
})->middleware(CheckLanguage::class);

Route::get('/{locale}',function($locale)
{
    return redirect($locale.'/welcome');

});

Route::get('{locale}/welcome',function($locale)
{
    //echo('CookieInRoute\'/\''.request()->cookie('language'));
    return view('welcome');

})->middleware(CheckLanguage::class);

Route::group(['prefix' =>App::getLocale()], function () {

    Auth::routes();
  //  Route::get('{locale}/login','HomeController@login');
//Route::get('{locale}/home','HomeController@index');

});




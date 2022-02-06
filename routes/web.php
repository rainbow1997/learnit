<?php

use App\Http\Middleware\CheckLanguage;
use App\Term;
use App\Lesson;
use App\Session\Session;
use App\Users\User as UserClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Panel\TermController;
use Panel\LessonController;
use Panel\SessionController as SessionController;
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

//Route::prefix('{locale}')->group(function(){
foreach(config('app.all_locales') as $RouteLocale) {
    Route::group(['prefix' => $RouteLocale], function () use ($RouteLocale) { //prefix be ezaye har zaban ejra she baraye hamin bayad ba foreach moteghayyersh koni

        Route::get('/',function() {
            return redirect(app()->getLocale().'/welcome');
        });
        Route::get('/welcome', function () {

            return view('welcome');
        });
        Route::group(['middleware' => ['auth']], function() {
            Route::resource('roles', RoleController::class);

        });
        Auth::routes();
        Route::get('/logout', 'Auth\LoginController@logout');
        Route::get('/home', 'HomeController@index');
        Route::post('ajaxShowUserTypeRegForm/', 'Auth\RegisterController@ajaxShowUserTypeRegForm');
        // use Route-Model binding
        Route::model('Terms_Management',Term::class);
        Route::resource('Terms_Management', TermController::class);
        // use Route-Model binding
        Route::model('Lessons_Management',Lesson::class);
        Route::resource('Lessons_Management',LessonController::class);
        // use Route-Model binding
        Route::model('Sessions_Management',Session::class);
        Route::resource('Sessions_Management',SessionController::class);
        Route::post('Sessions_Management/lessonsOfTerm','Panel\SessionController@lessonsOfTerm');
        Route::get('Sessions_Management/sessionTypes','Panel\SessionController@sessionTypes');
        
        Route::get('/testEmail', function () {
            $user = UserClass::find(1);
            // die(var_dump($user));
            return (new \App\Notifications\welcomeNotification($user))
                ->toMail($user->email);
        });

    });
}

<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Foundation\Application as App;
class CheckLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       // echo($md);
     //  echo var_dump($request->segment(1));//echo locale variable from route /
     $available_locales=config('app.locales');
     $locale=$request->segment(1);
     if(!in_array($locale,$available_locales))
        abort(400,"Language Error");   
        app()->setLocale($locale);//app facade for use setLocale (new shape)
        return $next($request);
    }
}

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
        if(!empty($request->cookie('lang')))
            return $next($request);
       // echo($md);
     //  echo var_dump($request->segment(1));//echo locale variable from route /
     $available_locales=config('app.locales');
     $userLocale=\Location::get(request()->ip());
     $locale=$request->segment(1);
     echo $userLocale->countryCode;
     if($locale!="fa-IR" || $userLocale->countryCode!="IR")
     {
         echo'IRnits';
        app()->setLocale('en');//app facade for use setLocale (new shape)
        $cookie=cookie('lang','en',1440);
     }
     else
     $cookie=cookie('lang','fa-IR',1440);

        return $next($request);
    }
}

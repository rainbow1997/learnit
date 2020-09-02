<?php
namespace App\Http\Middleware;
use Closure;
use Exception;
use Illuminate\Support\Facades\App;

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
      
            cookie()->queue('language',$this->checkUserIsoCode($request->path()),60);
             App::setLocale($this->checkUserIsoCode($request->path()));
     return $next($request);
    }
    private function checkUserIsoCode($path)
    {

     $available_locales=config('app.all_locales');
    
     if($path==null || $path=="/")// => "/" in addressbar
        {
            try
            {
                $userLocale=\Location::get(request()->ip())->countryCode;
            }
            catch(Exception $e)
            {

            $userLocale="fa_IR";
            }
        }
         else
         $userLocale=$path[0];//locale  =>/locale/address

     foreach($available_locales as $locale)
     {
        if(strpos($locale,$userLocale)!==false)//if $locale contain userlocale
         {
             $userLocale=$locale;
             break;
         }
     }
     if(!in_array($userLocale,$available_locales,TRUE))
        $userLocale=config('app.fallback_locale');
     return $userLocale;

    }

}

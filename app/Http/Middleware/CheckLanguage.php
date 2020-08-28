<?php
namespace App\Http\Middleware;
use Closure;
use Exception;
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
     app()->setLocale($this->checkUserIsoCode(request()->segments(1)));//segments=address/address2 from route
     return $next($request);
    }
    private function checkUserIsoCode($path)
    {
     $available_locales=config('app.locales');
     if($path==null)// => "/" in addressbar
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

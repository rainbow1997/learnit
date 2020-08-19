<?php

namespace App\Http\Middleware;

use Closure;

class CheckIp
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
        if($request->is('admin/*'))
        {
            return redirect ('/');
        }

        return $next($request);
    }
}

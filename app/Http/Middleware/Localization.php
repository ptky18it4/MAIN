<?php

namespace App\Http\Middleware;

use Closure;

class Localization
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
 
            \App::setLocale($request->language);

            /**
             * You know default Language in locale is English
             * So for middleware will change language by Session 
             */

        
        return $next($request);
    }
}

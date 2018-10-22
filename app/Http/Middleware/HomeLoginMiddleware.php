<?php

namespace App\Http\Middleware;

use Closure;

class HomeLoginMiddleware
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
        if (empty(session('homeuser'))){

            session(['back'=>$_SERVER['REQUEST_URI']]);

            session(['unique'=>'1']);
            
            return redirect('/') -> with('error', '您还没有登录,前往登录...');
        }

        return $next($request);
    }
}

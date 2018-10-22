<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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
        if (empty(session('adminusers'))){
            
            return redirect('/admin/login') -> with('error', '您还没有登录,前往登录...');
        }

        return $next($request);
    }
}

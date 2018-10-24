<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Admin\AdminActivity;

class ActivityMiddleware
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
        $now = time();
        $begining = AdminActivity::where('status',0)->first();
        if(empty($begining)){
            return redirect('/home/noactivity');
        }
        if(!empty($begining)){
            $begining->stoptime = $now+1000;
        }
        if($now >= $begining->stoptime){
            return redirect('/home/noactivity');
        }else{
            return $next($request);
        }
    }
}

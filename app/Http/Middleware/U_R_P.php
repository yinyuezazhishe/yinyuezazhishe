<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Admin\AdminUsers;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;

class U_R_P
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
        //用户登录  获取用户信息
        $user = AdminUsers::find(session('adminusers') -> id);

        //知道我有哪些角色 1 2 3 4
        $role = $user->roles;

        //有了角色之后我就知道我有哪些权限
        $arr = [];
        foreach($role as $rl){
            
            $per = $rl->permissions;

            foreach($per as $url){

               $arr[] = $url->urls;
            }

        }

        //获取权限
        $arrs = array_unique($arr);

        //获取当前控制器方法的路径(url);

        // $urs = \Route::current()->getActionName();

        $uls = \Request::getRequestUri();

        // dd($uls);

        $uls = preg_replace('/\/\d\//','/$id/',$uls);

        $uls = preg_replace('/\/\d{1,}/','/$id',$uls);

        $uls = preg_replace('/\?\S{0,}/','',$uls);

        // echo $uls;

        // dump($arrs);

        //判断
        if(in_array($uls,$arrs)){

            return $next($request);
            
        } else {

            return redirect('/admin')->with('error','您权限不够, 请联系管理员');
        }
    }
}

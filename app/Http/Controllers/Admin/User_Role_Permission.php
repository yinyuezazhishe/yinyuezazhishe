<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\AdminUsers;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;
use DB;

class User_Role_Permission extends Controller
{
	/**
	 *  用户添加角色页.
	 *
	 *  @return \Illuminate\Http\Response.
	 */
    public function u_r_edit($id)
    {
		// echo $id;die;

        //通过id 获取用户信息
        $user = AdminUsers::find($id);

        //获取角色信息
        $role = Role::orderBy('id', 'asc') -> get();

        //获取当前用户的角色id
        //第一种方式
        // $res = DB::table('user_role')->where('user_id', $id)->pluck('role_id')->toArray();

        // dd($user);

        //第二种方式
        $user_role = $user->roles;

        // dd($res);

    	$user_arr = [];
        foreach($user_role as $k => $v){

            $user_arr[] = $v->id;
        }

        // dd($res);

        return view('Admin.User_Role_Permission.user_role_edit',[
            'title'=>'用户添加角色页',
            'user'=>$user,
            'role'=>$role,
            'res'=>$user_arr
        ]);
    }

    /**
     *  处理用户添加角色的方法
     *
     *  @return \Illuminate\Http\Response
     */
    public function u_r_update(Request $request)
    {
        $user_id = $request->input('id');

        $role_id = $request->input('role_id');

        //判断
        if(!$role_id){

            return redirect('/admin/user')->with('errors','请选择角色');
        }

        //添加数据 $role_id  [1,2,3];
        DB::table('user_role')->where('user_id', $user_id)->delete();

        $arr = [];
        foreach($role_id as $k => $v){
            $res = [];
            $res['user_id'] = $user_id;
            $res['role_id'] = $v;
            $arr[] = $res;
        }

        $data = DB::table('user_role')->insert($arr);

        if($data){

            return redirect('/admin/user')->with('succes','添加用户角色成功');

        } else {

            return back()->with('errors','添加用户角色失败');
        }
    }

    /**
     *  添加角色权限页.
     *
     *  @return \Illuminate\Http\Response.
     */
    public function r_p_edit($id)
    {
        $role = Role::find($id);

        $per = Permission::all();

        //获取角色的权限
        $permis = $role->permissions;

        // dump($permis);

        $arr = [];
        foreach($permis as $k => $v){

            $arr[] = $v->id;
        }

        return view('Admin.User_Role_Permission.role_permission_edit',[
            'title'=>'添加角色权限页',
            'role'=>$role,
            'per'=>$per,
            'arr'=>$arr
        ]);
    }

    /**
     *  处理角色权限的方法.
     *
     *  @return \Illuminate\Http\Response
     */
    public function r_p_update(Request $request)
    {
        $role_id = $request->input('id');

        $per_id = $request->input('per_id');

        if(!$per_id){

            return redirect('/admin/role')->with('errors','请选择您的权限!!');
        }

        DB::table('role_permission')->where('role_id',$role_id)->delete();

        $res = [];
        foreach($per_id as $k => $v){
            $rs = [];
            $rs['role_id'] = $role_id;
            $rs['per_id'] = $v;

            $res[] = $rs;
        }

        $data = DB::table('role_permission')->insert($res);

        if($data){

            return redirect('/admin/role')->with('succes','添加角色权限成功');
        } else {

            return back()->with('errors','添加角色权限失败');
        }
    }
}

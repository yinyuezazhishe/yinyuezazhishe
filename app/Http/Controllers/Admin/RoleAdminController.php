<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;

class RoleAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$role = Role::where('role_name','like','%'.$request->role_name.'%')->orderBy('id', 'desc')->paginate($request->input('num',5)) ;

        return view('Admin.Role.init',[
            'title'=>'浏览角色',
            'request'=>$request,
            'role'=>$role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// 显示角色添加页面
        return view('Admin.Role.add',['title'=>'角色添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	// 表单验证
        $this->validate($request, [
            	'role_name' => 'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_\-]{2,}$/u',

	        ],[
	            'role_name.required'=>'角色名称不能为空!',
	            'role_name.regex'=>'角色名称含有字母、数字、下划线、中文以外的非法字符且必须最少2位!'
	        ]
        );  

        $rs = $request->except('_token');

        // dd($rs);

        try{
           
            $data = Role::create($rs);


            if($data){

                return redirect('/admin/role')->with('success','添加角色成功');
            }

        }catch(\Exception $e){

            return back()->with('error','添加角色失败');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$rs = Role::find($id);

        // 显示角色修改页面
        return view('Admin.Role.edit',['title'=>'角色修改', 'rs'=>$rs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 表单验证
        $this->validate($request, [
            	'role_name' => 'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_\-]{2,}$/u',

	        ],[
	            'role_name.required'=>'角色名称不能为空!',
	            'role_name.regex'=>'角色名称含有字母、数字、下划线、中文以外的非法字符且必须最少2位!'
	        ]
        );  

        $rs = $request->only('role_name');

        $role = Role::find($id);

        if ($rs['role_name'] == $role -> role_name) {

        	return redirect('/admin/role')->with('success','修改角色成功');
        }

        // dd($role -> role_name, $rs);

        try{
           
            $data = Role::where('id', $id)->update($rs);

            if($data){

                return redirect('/admin/role')->with('success','修改角色成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改角色失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data= Role::where('id',$id)->delete();

            if($data){

                return back()->with('success','删除角色成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除角色失败');
        }
    }
}

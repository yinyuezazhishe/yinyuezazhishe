<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Permission;

class PermissionAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permission = Permission::where('per_name','like','%'.$request->per_name.'%')->orderBy('id', $request->input('sort', 'asc'))->paginate($request->input('num',5));

        // 显示权限页
        return view('Admin.Permission.init', [
            'title'=>'浏览权限',
            'permission'=>$permission,
            'request'=>$request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示权限添加页
        return view('Admin.Permission.add', ['title'=>'添加权限']);
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
                'per_name' => 'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_\-]{2,}$/u',
                'urls' => 'required',

            ],[
                'per_name.required'=>'权限名称不能为空!',
                'per_name.regex'=>'权限名称含有字母、数字、下划线、中文以外的非法字符且必须最少2位!',
                'urls' => 'url地址不能为空'
            ]
        ) -> withInput();;

        $rs = $request->except('_token');

        // dd($rs);

        try{
           
            $data = Permission::create($rs);

            if($data){

                return redirect('/admin/permission')->with('succes','添加权限成功');
            }

        }catch(\Exception $e){

            return back()->with('errors','添加权限失败') -> withInput();;

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
        $rs = Permission::find($id);

        // dd($rs);

        return view('admin.permission.edit',[ 'title'=>'权限修改', 'rs'=>$rs]);
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
                'per_name' => 'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_\-]{2,}$/u',
                'urls' => 'required',

            ],[
                'per_name.required'=>'权限名称不能为空!',
                'per_name.regex'=>'权限名称含有字母、数字、下划线、中文以外的非法字符且必须最少2位!',
                'urls' => 'url地址不能为空'
            ]
        );

        $rs = $request->except('_token','_method');

        $role = Permission::find($id);

        if ($rs['per_name'] == $role -> per_name && $rs['urls'] == $role -> urls ) {

            return redirect('/admin/permission')->with('succes','修改权限成功');
        }
       
        try{
           
            $data = Permission::where('id', $id)->update($rs);

            if($data){

                return redirect('/admin/permission')->with('succes','修改权限成功');
            }

        }catch(\Exception $e){

            return back()->with('errors','修改权限失败');
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
        // 删除权限
        try{
           
            $data = Permission::where('id',$id)->delete();

            if($data){

                return redirect('/admin/permission')->with('succes','删除权限成功');
            }
        }catch(\Exception $e){

            return back()->with('errors','删除权限失败');

        }
    }
}

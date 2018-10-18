<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\AdminActivity;

class AdminActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //查看活动
        $activityAll = AdminActivity::orderBy('status','asc')->orderBy('stoptime','desc')
        ->where(function($query) use($request){
            //检测状态
            if(is_numeric($request->input('status'))){
                $query->where('status',$request->input('status'));
            }
            //检测关键字
            if(!empty($request->input('title'))){
                $query->where('title','like','%'.$request->input('title').'%');
            }
        })->paginate(5);
        foreach ($activityAll as $k => $v) {
            $now = time();
            if($v['stoptime'] <= $now && $v['status']!=2){
                AdminActivity::where('id',$v['id'])->update(['status'=>2]);
            }
            $activityAll[$k]['begintime'] = date('Y-m-d',$v['begintime']);
            $activityAll[$k]['stoptime'] = date('Y-m-d',$v['stoptime']);
            $activityAll[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
        }
        return view('Admin.Activity.index',['activity'=>$activityAll,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //创建活动
        return view('Admin.Activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //保存活动设置
        $data = $request->except('_token');
        try{
            $preg_begin = preg_match("/^\d{4}-\d{2}-\d{2}$/", $request->input('begintime'));
            $preg_stop = preg_match("/^\d{4}-\d{2}-\d{2}$/", $request->input('stoptime'));
            if($preg_begin){
                $begin = explode('-',$request->input('begintime'));
                $data['begintime'] = mktime(0,0,0,$begin[1],$begin[2],$begin[0]);
            }
            if($preg_stop){
                $stop = explode('-', $request->input('stoptime'));
                $data['stoptime'] = mktime(0,0,0,$stop[1],$stop[2],$stop[0]);
            }
            $data['addtime'] = time();
            $data['status'] = 1;
            $rs = AdminActivity::create($data);
            if($rs){
                return redirect('/admin/activity')->with("success","添加成功");
            }else{
                return back()->with("error","添加失败");
            }
        }catch(\Exception $e){
            return back()->with("error","添加失败");
        }
    }

    /**
     * Display the specified resour  ce.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try{
            $rs = AdminActivity::where('id',$id)->first();
            //结束活动
            if($rs && $rs->status == 0){
                $status = AdminActivity::where('id',$id)->update(['status'=>2]);
                if($status){
                    return redirect('/admin/activity')->with("success","关闭成功");
                }else{
                    return back()->with("error","关闭失败");
                }
            }
            //开启活动
            $all = AdminActivity::get()->pluck('status')->toArray();
            if(in_array('0', $all)){
                 return back()->with("activity","当前已有开启活动,请关闭后再开");
            }
            if($rs && $rs->status==1){
                $status = AdminActivity::where('id',$id)->update(['status'=>0]);
                if($status){
                    return redirect('/admin/activity')->with("success","开启成功");
                }else{
                    return back()->with("error","开启失败");
                }
            }else{
                abort(404);
            }
        }catch(\Exception $e){
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //修改活动
        try{
            $oneActivity = AdminActivity::where('id',$id)->first();
            if($oneActivity && $oneActivity->status != 0){ 
                $oneActivity['begintime'] = date('Y-m-d',$oneActivity['begintime']);
                $oneActivity['stoptime'] = date('Y-m-d',$oneActivity['stoptime']);
                return view('Admin.Activity.edit',['oneActivity'=>$oneActivity]);
            }else{
                abort(404);
            }
        }catch(\Exception $e){
            abort(404);
        }
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
        //
        $activity = $request->except(['_token','_method']);
        try{
            $preg_begin = preg_match("/^\d{4}-\d{2}-\d{2}$/", $request->input('begintime'));
            $preg_stop = preg_match("/^\d{4}-\d{2}-\d{2}$/", $request->input('stoptime'));
            if($preg_begin){
                $begin = explode('-',$request->input('begintime'));
                $activity['begintime'] = mktime(0,0,0,$begin[1],$begin[2],$begin[0]);
            }
            if($preg_stop){
                $stop = explode('-', $request->input('stoptime'));
                $activity['stoptime'] = mktime(0,0,0,$stop[1],$stop[2],$stop[0]);
            }
            $rs = AdminActivity::where('id',$id)->update($activity);
            if($rs){
                return redirect('/admin/activity')->with("success","修改成功");
            }else{
                 return back()->with("error","修改失败");
            }
        }catch(\Exception $e){
                return back()->with("error","修改失败");
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
        //
    }
}

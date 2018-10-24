<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\AdminSentence;

class AdminSentenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //查看一语
        $rs = AdminSentence::where(function($query) use($request){
                //检测关键字
                $title = $request->input('title');
                //如果链接名称不为空
                if(!empty($title)) {
                    $query->where('heart_sentence','like','%'.$title.'%');
                }
            })->paginate($request->input('num', 5)); 
        session(['uri'=>\Request::getRequestUri()]);           
        return view('Admin.Sentence.index',['sentence'=>$rs,'request'=>$request]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //创建每日一语
        return view('Admin.Sentence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //保存每日一语
        $sentence = $request->only('heart_sentence');
        try{
            $reg_sentence = preg_match_all("/^[\x{4e00}-\x{9fa5}A-Za-z,\.。，]{3,50}$/u",$sentence['heart_sentence']);
            if($sentence){
                if(AdminSentence::create($sentence)){
                    return redirect('/admin/sentence')->with('success','每日一语添加成功');
                }else{
                    return back()->with('error','每日一语添加失败');
                }
            }else{
                return back()->with('error','每日一语添加失败');
            }
        }catch(\Exception $e){
            return back()->with('error','每日一语添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        try{
            $status = $request->only('status');
            if($status['status'] == 0){
                $status['status'] = 1;
            }else{
                $status['status'] = 0;
            }
            if(!empty($id)){
                $rs = AdminSentence::where('id',$id)->update($status);
                if($rs){
                    if($status['status'] == 0){
                        $info = "启用成功";
                    }else{
                        $info = "禁用成功";
                    }
                    return redirect($request->input('uri'))->with('success',$info);
                }else{
                    return back()->with('error','状态更改失败');
                }
            }
        }catch(\Exception $e){
            return back()->with('error','状态更改失败');
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
        //查看修改的id
        $rs = AdminSentence::where('id',$id)->first();
       
        return view('Admin.Sentence.edit',['sentence'=>$rs]);
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
        //修改每日一语
        try{
            if(!empty($request->input('heart_sentence'))){
                $rs = AdminSentence::where('id',$id)->update($request->only('heart_sentence'));
                if($rs){
                    return redirect('/admin/sentence')->with('success','每日一语修改成功');
                }else{
                    return back()->with('error','每日一语修改失败');
                }
            }else{
                return back()->with('error','每日一语修改失败');
            }
        }catch(\Exception $e){
             return back()->with('error','每日一语修改失败');
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
        if(!empty($id)){
            $rs = AdminSentence::where('id',$id)->delete();
            if($rs){
                session(['success'=>'每日一语删除成功']);
                return 1;
            }else{
                session(['error'=>'每日一语删除失败']);
                return 0;
            }
        }else{
            session(['error'=>'每日一语删除失败']);
            return 0;
        }
    }
}

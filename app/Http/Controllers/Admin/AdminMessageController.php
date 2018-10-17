<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Message;
use DB;

class AdminMessageController extends Controller
{
    	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rs = Message::select(DB::raw('*,concat(hid,id) as hid'))->
        where('content','like','%'.$request->input('content').'%')->
        orderBy('hid');
        dd($rs);
      
        return view('Admin.message.index',[
            'title'=>'留言浏览',
            'rs'=>$rs
        ]);
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
             $rs =  Message::where('id',$id) -> delete();
             if ($rs){
                return redirect('/Admin/message') -> with('success','删除成功');
             }
        }catch(\Exception $e){
            
                 return back() -> with('error','删除失败');
            }
    }

}

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

         $message = Message::with('homeuser','reply')->orderBy('addtime','desc')->paginate(5);
        
      
        return view('Admin.message.index',[
            'title'=>'留言浏览',
            'message'=>$message,
            'request'=>$request
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
                return redirect('/admin/message') -> with('success','删除成功');
             }
        }catch(\Exception $e){
            return back() -> with('error','删除失败');
        }
        
    }
}

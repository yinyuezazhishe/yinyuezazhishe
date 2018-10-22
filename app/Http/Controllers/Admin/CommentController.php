<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Comment;

class CommentController extends Controller
{
     /**
     * 显示评论
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
     	$res = Comment::with('users')-> where(function($query) use($request){
                //检测关键字
                $id = $request->input('id');
                //如果用户名不为空
                if(!empty($id)) {
                    $query->where('hid',$id);
                }
            }) -> paginate($request->input('num', 5));
     	
     	return view('Admin/Comment/index',['res'=>$res,'request'=>$request]);

     }


          /**
     * 显示评论
     *
     * @return \Illuminate\Http\Response
     */
     public function distory($id)
     {
        try{

            $rs = Comment::where('id',$id)->delete();

            if ($rs) {
               
                session(['success'=>'删除成功']);
                return 1;

            } else {

                session(['error'=>'删除失败']);
                return 0;
            }

        }catch(\Exception $e){

            session(['error'=>'删除失败']);
            return 0;

        }

     }

}

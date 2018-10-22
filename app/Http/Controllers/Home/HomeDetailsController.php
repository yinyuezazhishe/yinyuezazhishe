<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\DetailsContent;
use App\Model\Admin\Details;
use App\Model\Home\Comment;
use App\Model\Home\HomeUser;
use App\Model\Home\Reply;

class HomeDetailsController extends Controller
{
	/**
	 *  显示详情页
	 *
	 *  @return \Illuminate\Http\Response.
	 */
    public function index(Request $request, $id)
    {   
        $user = Comment::where('did',$id) -> with('users') -> orderBy('addtime','desc') -> get();

        $reply = Reply::with('users') -> get();

        $num = $user -> count() + $reply -> count();

    	$d_content = DetailsContent::where('id', $id)->first();

    	$details = Details::with('details_content', 'lists') ->  orderBy('id', 'asc') -> paginate(10);
    	// dd($d_content->id);

    	return view('Home.Details.index', ['d_content'=>$d_content, 'details' => $details, 'title' => '音乐杂志社','user'=>$user,'num'=>$num,'reply'=>$reply]);

    }

    /**
     *  添加评论
     *
     *  @return \Illuminate\Http\Response.
     */
    public function comment(Request $request)
    {

        $res = $request -> except('_token');

        $res['addtime'] = time();

        $id = $request -> input('hid');

        $info = HomeUser::where('id',$id)->first();

        // return json_encode($info);

        $rs = Comment::create($res); 

        $res['id'] = $rs -> id;

        if ($rs) {

            $res['face'] = $info -> face;

            $res['username'] = $info -> username;

            $res['addtime'] = date('Y-m-d H:i:s A',$res['addtime']);

            return json_encode($res); 

        } else {

            return 0;

        }
    }


     /**
     *  添加回复
     *
     *  @return \Illuminate\Http\Response.
     */

     public function reply(Request $request)
     {
        $res = $request->except('_token');

        $res['addtime'] = time();

        $id = $request -> input('hid');

        $info = HomeUser::where('id',$id)->first();

        $rs = Reply::create($res); 

        $res['id'] = $rs -> id;

        if ($rs) {

            $res['face'] = $info -> face;

            $res['username'] = $info -> username;

            $res['addtime'] = date('Y-m-d H:i:s A',$res['addtime']);

            return json_encode($res); 

        } else {

            return 0;

        }
        
     }


}

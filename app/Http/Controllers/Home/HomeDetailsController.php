<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\DetailsContent;
use App\Model\Admin\Details;
use App\Model\Admin\Lists;
use App\Model\Home\CateGory;
use Illuminate\Support\Facades\DB;
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

        $d_content = DetailsContent::where('did', $id)->first();

        $details = Details::with('details_content')->where('id', $id)->first();

        // dd($details);

        $praise = DB::table('praise')->where('d_c_id', $id) -> get();

        $pr = '';
        if (!empty(session('homeuser'))) {
            $pr = DB::table('praise')->where([['d_c_id', $id], ['u_id', session('homeuser')->id]]) -> first();
        }

        // 猜你喜欢
        $lists = Lists::with('category')->where('id', $id)->first();

        // echo $lists->category->path;
        $cid = trim(strstr($lists->category->path, ','), ',');

        // dd($id);

        $category = CateGory::with('lists')->where('pid', $cid)->get();
        // dd($category);
        foreach ($category as $k => $v) {
            foreach ($v -> lists as $k => $v) {
                if ($id != $v -> id) {
                    $lid[] = $v -> id;
                }
            }
            // $v -> lists;
        }

        // dd($lid);

        $detail = DetailsContent::whereIn('did', $lid)->limit(3)->get();

        // dd($detail);


        return view('Home.Details.init', ['d_content'=>$d_content,'pr'=>$pr, 'praise' => $praise, 'details' => $details, 'detail' => $detail, 'title' => '音乐杂志社','user'=>$user,'num'=>$num,'reply'=>$reply]);
    }

    /**
     *  点赞
     *
     *  @return \Illuminate\Http\Response.
     */
    public function praise(Request $request)
    {
        if (empty(session('homeuser'))) {
            return 4;
        }

        $res = $request -> all();
        $pr['u_id'] = session('homeuser')->id;
        $pr['d_c_id'] = $res['id'];

        $praise = DB::table('praise')->where([['u_id', $pr['u_id']], ['d_c_id', $pr['d_c_id']]]) -> first();

        // var_dump($pr);die;

        if (!empty($praise)) {

            try{

                $data = DB::table('praise')->where([['u_id', $pr['u_id']], ['d_c_id', $pr['d_c_id']]]) -> delete();

                if($data){

                    return 2;
                }

            }catch(\Exception $e){

                return 3;
            }

        } else{

            try{

                $data = DB::table('praise')->insert($pr);

                if($data){

                    return 0;
                }

            }catch(\Exception $e){

                return 1;
            }
        }  

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

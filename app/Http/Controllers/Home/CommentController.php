<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Comment;
use App\Model\Home\HomeUser;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD

=======
>>>>>>> ljh
        $user = Comment::where('did',1) -> with('users') -> orderBy('id','desc') -> get();
        $num = $user -> count();
        // dd($num);
        return view('Home/Comment/index',['user'=>$user,'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD

        return json_encode($request->content);

=======
>>>>>>> ljh
        $user = [];

        $res = $request -> except('_token');

        $res['addtime'] = time();

        $id = $request -> input('hid');

        $info = HomeUser::find($id)->first();

        $user['face'] = $info -> face;

        $user['username'] = $info -> username;

        $user['addtime'] = date('Y-m-d H:i:s A',$res['addtime']);



        $rs = Comment::create($res); 

        if ($rs) {

            return json_encode($user); 

        } else {

            return 0;

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
        //
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

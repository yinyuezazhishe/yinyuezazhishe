<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Message; #获取留言
use App\Mail\NewMessage; #留言提醒
use App\Model\Home\HomeUser;
use Illuminate\Support\Facades\Mail;
use DB;
class MessageController extends Controller
{
	/**
	 *  留言板
	 *
	 *  @return \Illuminate\Http\Response.
	 */
    public function index(Request $request)
    {
    	//获取全部留言
        $messages = Message::with('homeuser','remessages')->orderBy('addtime','desc')->paginate(5);

        // dd($messages);

        return view('Home.message.index',[
            'messages' => $messages,
            'title'=>'音乐杂志社--留言板',
            'request'=>$request
        ]);
    }

    // public function 

     public function store(Request $request)
    {
        $message = $request->except('_token');
        $message['addtime'] = time();
        if (!empty(session('homeuser'))) {
            $message['user_id'] = session('homeuser')->id; 
        } else {
            return 2;
        }
        if (empty($request -> content)) {
            return 3;
        } else if(!preg_match_all("/^[\x{4e00}-\x{9fa5}\S\-]{3,120}$/u",$request -> content)) {
            return 4;
        }
        // $message['user_id'] = session('homeusers')->id;
        // var_dump($message);die;

        try{
            $info = Message::create($message);

            if($info){
                return 0;
            }
        }catch(\Exception $e){

            return 1;

        }
    }
}

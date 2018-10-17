<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Message;
use Auth;
use App\Mail\NewMessage;
use App\Model\Home\HomeUser;
use Illuminate\Support\Facades\Mail;
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
        $message = Message::orderBy('hid','desc')->paginate(20);

        return view('Home.message.index',[
            'message'=>$message
        ]);
    }

     public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:120',
        ]);

        //获取 id 未登录用户为 0
        if (Auth::check()) {
            $user_id = Auth::id();
        }else{
            $user_id = 0;
        }

        $message = Message::create([
            'user_id' => $user_id,
            'content' => $request->content,
        ]);

        Mail::to(HomeUser::findOrFail(1))->send(new NewMessage());

        session()->lash('success', '留言成功');
        return redirect()->route('messages.index');
    }
}

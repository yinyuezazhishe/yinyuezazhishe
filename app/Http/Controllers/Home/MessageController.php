<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Message;
use DB;
use Illuminate\Support\Facades\Mail;
class MessageController extends Controller
{
	/**
	 *  留意板
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

    }
}

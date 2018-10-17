<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeUser;
use App\Model\Home\Remessage;
use App\Model\Home\Message;
use Auth;

class RemessageController extends Controller
{
    //存储回复
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $remessage = Remessage::create([
            'user_id' => Auth::id(),
            'message_id' => $request->message_id,
            'content' => $request->content,
        ]);

        //session()->flash('success', '回复成功');
        //return back();
    }
}

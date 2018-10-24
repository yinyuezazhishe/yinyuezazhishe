<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Reply;
use App\Model\Home\Comment;
use App\Model\Admin\Blogroll;
use App\Model\Admin\DetailsContent;
use App\Model\Admin\AdminUsers;
use App\Model\Admin\Message;

class IndexController extends Controller
{
    //
    public function init()
    {
    	$uid = session('adminusers')->id;


    	$user = AdminUsers::where('id',$uid)->first();


    	$prev_ip = $user -> prev_ip;


    	$logins = $user -> logins;


    	$article = DetailsContent::count();


    	$comment = Comment::count() + Reply::count();


    	$blogroll = Blogroll::count();


    	$message = Message::count();


    	return view('Admin.Index.index', ['title' => '后台首页','article'=>$article,'comment'=>$comment,'blogroll'=>$blogroll,'prev_ip'=>$prev_ip,'logins'=>$logins,'message'=>$message]);
    }
}

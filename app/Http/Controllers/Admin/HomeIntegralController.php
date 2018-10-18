<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\HomeUsers;
use App\Model\Admin\Integral;
use DB;

class HomeIntegralController extends Controller
{
    //查看积分
    public function index(Request $request){
    	$integral = HomeUsers::paginate(5);
    	return view('Admin.Integral.index',['integral'=>$integral,'request'=>$request]);
    } 
    //查看积分详情
    public function show($id){
    	//当前用户
    	$nowuser = HomeUsers::where('id',$id)->first();
    	//获取活动里面的积分
    	$integral = DB::table('homeuser_activity')->where('uid',$id)->get();
    	//获取当天积分
    	$nowday = Integral::where('hid',$id)->first();
    	return view('Admin.Integral.show',['nowuser'=>$nowuser,'integral'=>$integral,'nowday'=>$nowday,]);
    }
}

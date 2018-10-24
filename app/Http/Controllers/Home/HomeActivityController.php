<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\AdminActivity;
use App\Model\Admin\HomeUsers;
use DB;

class HomeActivityController extends Controller
{
    //活动主页设置
    public function index(){
    	$proceeding = AdminActivity::where('status',0)->first();
        $begintime = date("Y-m-d",$proceeding->begintime);
    	$flag = 0;
    	if(!empty(session('homeuser'))){
            $isHave = DB::table('homeuser_activity')->where('aid',$proceeding->id)->where('uid',
            session('homeuser')->id)->first();
            if($isHave){
                $flag = 1;
            }
    	}
    	if($proceeding){
    		return view('Home.Activity.index',['activityid'=>$proceeding->id,'begintime'=>$begintime,'flag'=>$flag,'wishes'=>$proceeding->wishes]);
    	}else{
    		return redirect('/home/noactivity');
    	}
    }
    //获取积分
    public function getActivity(Request $request)
    {
        if ($request -> method() == 'GET') {
            abort('404');
        }
    	//返回值
    	$data = [];
    	$activity = $request->except('_token');
    	//查询当前用户是否有值
    	$isHave = DB::table("homeuser_activity")->where('uid',$request->input('uid'))->where('aid',$request->input('aid'))->first();
    	if(!empty($isHave)){
    		$data = ["flag"=>"1"];
    		return $data;
    	}
    	if($request->input('aid') && $request->input('uid')){
    		$activity['activity_num'] = mt_rand(1,20);
    		$rs = DB::table("homeuser_activity")->insert($activity);
            $integral = HomeUsers::where('id',$request->input('uid'))->pluck('integral')[0];
            HomeUsers::where('id',$request->input('uid'))->update(['integral'=>$integral+$activity['activity_num']]);
    		if($rs){
    			$data = ["flag"=>"0","myactivity"=>$activity['activity_num']];
    			return $data;
    		}else{
    			$data = ["flag"=>"2"];
    			return $data;
    		}
    	}else{
    		return redirect('home/activity');
    	}
    }
    // 活动结束或未开始
    public function noactivity()
    {
    	$isHave = AdminActivity::where('status',0)->first();
    	if($isHave){
            $time = time();
            if($time >= $isHave->stoptime){
                AdminActivity::where('id',$isHave->id)->where('status',0)->update(['status'=>2]);
            }	
    	}
    	return view('Home.Public.noactivity');
    }
}

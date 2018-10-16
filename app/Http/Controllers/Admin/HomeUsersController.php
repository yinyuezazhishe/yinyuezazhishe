<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeUser;

class HomeUsersController extends Controller
{
    //    
    public function index(Request $request)
    {
       	//多条件查询
         $rs = HomeUser::where(function($query) use($request){
                //获取关键字
                $username = $request->input('username');
                //获取状态
                $status = $request->input('status');
                //获取性别
                $sex = $request->input('sex');
                
                //如果状态不为空
                if(!empty($status)){
                    $query->where('status',$status);
                }
                //如果性别不为空
                if(is_numeric($sex)){
                    $query->where('sex',$sex);
                }
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('username','like','%'.$username.'%');
                }
            })->paginate(5);
        // dd($rs);
    	return view('Admin.Homeusers.index',[
    		'rs'=>$rs,
    		'request'=>$request
    	]);
    }
    public function status(Request $request)
    {
    	$status = $request->only('status');
    	$myresp = array();
    	if($status['status'] == "0"){
    		$myresp['status'] = 1;
    	}else{
    		$myresp['status'] = 0;
    	}
    	$id = $request->input('id');
    	try{
    		$rs = HomeUser::where('id',$id)->update($myresp);
    		if($rs){
    			return $myresp;
    		}else{
    			return 0;
    		}
    	}catch(\Exception $e){
    		return 0;
    	}
    }
    public function distory($id){
    	try{
    		$rs = HomeUser::where('id',$id)->delete();
    		if($rs){
    			session(['success'=>'删除成功']);
    			return 1;
    		}else{
    			session(['error'=>'删除失败']);
    			return 0;
    		}
    	}catch(\Exception $e){
    		session(['error'=>'删除失败']);
    		return 0;
    	}
    }
}

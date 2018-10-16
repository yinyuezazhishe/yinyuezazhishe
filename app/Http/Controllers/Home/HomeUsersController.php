<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeUser;
use App\Model\Home\HomeUserMusic;

class HomeUsersController extends Controller
{
    //会员中心
    public function index()
    {
    	return view('Home.Homeuser.index');
    }
    //会员个性签名
    public function sdasd(Request $request){
    	$id = $request->input('id');
    	$sdasd = $request->only('sdasd');
    	if(!empty($id) && !empty($sdasd)){
    		$rs = HomeUser::where('id',$id)->update($sdasd);
    		if($rs){
    			session(['sdasd'=>$request->input('sdasd')]);
    			return 1;
    		}else{
    			return 0;
    		}
    	}
    }
    //会员用户设置
    public function setting(){
    	return view('Home.HomeUser.setting');
    }
    //保存个人中心设置
    public function saveinfo(Request $request){
    	$userinfo = $request->except('_token');
    	// dd($userinfo);
    	try{
    		$rs = HomeUser::where('id',$request->input('id'))->update($userinfo);
    		$user = HomeUser::where('id',$request->input('id'))->first();
    		if($rs){
    			session(['homeuser'=>$user]);
    			session(['sdasd'=>$user->sdasd]);
    			return $user;
    		}else{
    			return 0;
    		}
    	}catch(\Exception $e){
    		return 0;
    	}
    }
    //保存头像
    public function uploadface(Request $request){
    	//设置文件保存名称
    	$name = time().rand(1000,9999);
		if(!empty($request->input('image'))){
			//如果旧图片不为空
			if(!empty($request->input('oldface'))){
				unlink('.'.$request->input('oldface'));	
			}
			//调用函数拿到路径
			$path = base64_image_content($request->input('image'),$name);
			//拼接路径存数据库
			if(!empty($path)){
				$path = '/'.ltrim($path,'/.');
				session(['homeface'=>$path]);
				$rs = HomeUser::where('id',$request->input('id'))->update(["face"=>$path]);
				if($rs){
					return $data = ['face'=>$path];
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
    }
    //音乐设置
   	public function music(Request $request)
   	{
   		$uid = $request->input('uid');
   		$music = $request->except(['_token','music','thumb_music']);
   		if($request->hasFile('music') && $request->hasFile('thumb_music')){
            $name = time().rand(1000,9999).str_random(6);
            //定义路径
	   		$userpath = './homes/user/';
	   		//检查路径是否存在
	   		if(!is_dir($userpath)){
	   			mkdir($userpath,"0700");
	   		}
            //获取后缀
            $suffixMusic = $request->file('music')->getClientOriginalExtension();
            $suffixThumb = $request->file('thumb_music')->getClientOriginalExtension();
            //移动
            $request->file('music')->move(ltrim($userpath,'./'),$name.'.'.$suffixMusic);     
            $request->file('thumb_music')->move(ltrim($userpath,'./'),$name.'.'.$suffixThumb);
            //拼接地址
            $music['music'] = ltrim($userpath,'.').$name.'.'.$suffixMusic;      
            $music['thumb_music'] = ltrim($userpath,'.').$name.'.'.$suffixThumb;      
        }  
   		//查找音乐设置表中是否有记录
   		$user = HomeUserMusic::where('uid',$uid)->first();
   		if(empty($user)){
   			$rs = HomeUserMusic::create($music);
   			if($rs){
   				return redirect('/home/user/center')->with('success','上传成功,下次登录即可聆听');
   			}else{
   				return back()->with('error','上传失败,请稍后再试');
   			}
   		}else{
   			$rs = HomeUserMusic::where('uid',$uid)->update($music);
   			if($rs){
   				return redirect('/home/user/center')->with('success','修改成功,下次登录即可聆听');
   			}else{
   				return back()->with('error','上传失败,请稍后再试');
   			}
   		}
   	}
}

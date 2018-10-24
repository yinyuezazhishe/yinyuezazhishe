<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeUser;
use App\Model\Home\HomeUserMusic;
use App\Model\Admin\AdminSentence;
use App\Model\Admin\Message;
use App\Model\Admin\DetailsContent;
use App\Model\Home\Comment;
use DB;


class HomeUsersController extends Controller
{
    //会员中心
    public function index()
    {
        //我的一语(获取最新七条每日记录)
        $sentence = DB::table('homeuser_sentence')->where('uid',session('homeuser')->id)->orderBy('addtime','desc')->skip(0)->limit(7)->get();
        // dd($sentence);判断是否为空,进行相应的操作
        if(!empty($sentence)){
            foreach($sentence as $k=>$v){
                $isHave = AdminSentence::where('id',$v->sentence_id)->get()->toArray();
                if(empty($isHave)){
                    $sentence[$k]->heart_sentence = '该一语不存在或已被删除';
                    $sentence[$k]->status = 0;
                }else{
                    $sentence[$k]->heart_sentence = AdminSentence::where('id',$v->sentence_id)->pluck('heart_sentence')->toArray()[0];
                     $sentence[$k]->status =  AdminSentence::where('id',$v->sentence_id)->pluck('status')->toArray()[0];
                }
            }
        }
        //我的喜欢
        $likes = DB::table('praise')->where('u_id',session('homeuser')->id)->orderBy('addtime','desc')->skip(0)->limit(4)->get()->toArray();
        // dd($likes);
        if(!empty($likes)){
            $infolike = [];
            //我的主页
            foreach ($likes as $k => $v) {
                $infolike[] = DetailsContent::where('id',$v->d_c_id)->orderBy('addtime','desc')->first()->toArray();
            }
            if(empty($infolike)){
                $infolike = [];
            }
        }else{
            $likes = [];
            $infolike = []; 
        } 
        // dd($infolike);
        //我的留言
        $message = Message::where('user_id',session('homeuser')->id)->orderBy('addtime','desc')->get()->toArray();
        //我的评论
        $discuss = Comment::where('hid',session('homeuser')->id)->orderBy('addtime','desc')->get()->toArray(); 
    	return view('Home.Homeuser.index',['sentence'=>$sentence,'message'=>$message,'like'=>count($likes),'infolike'=>$infolike,'discuss'=>$discuss]);
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
        if ($request -> method() == 'GET') {
            abort('404');
        }

    	$userinfo = $request->except('_token');
    	$username = $request->input('username');
        if($username == $request->input('check_name')){
            unset($userinfo['username']);
            unset($userinfo['check_name']);
        }else{
            $isHaveUserName = HomeUser::where('username',$username)->first();
            if($isHaveUserName->username  == $username){
                return 2;
            }
        }
    	try{
    		$rs = HomeUser::where('id',$request->input('id'))->update($userinfo);
    		$user = HomeUser::where('id',$request->input('id'))->first();
            $user->right = 1;
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
    public function uploadface(Request $request)
    {
        if ($request -> method() == 'GET') {
            abort('404');
        }
    	//设置文件保存名称
    	$name = time().rand(1000,9999);
		if(!empty($request->input('image'))){
			//如果旧图片不为空
			if(!empty($request->input('oldface')) && file_exists('.'.$request->input('oldface')) && $request->input('oldface') != '/homes/Public_face/01.jpg'){
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
        if ($request -> method() == 'GET') {
            abort('404');
        }

   		$uid = $request->input('uid');
   		$music = $request->except(['_token','music','thumb_music','oldmusic','oldthumb_music']);
        try{
     		if($request->hasFile('music') && $request->hasFile('thumb_music')){
                $name = time().rand(1000,9999).str_random(6);
                  //定义路径
      	   		$userpath = './homes/user/'.$uid.'/';
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
                    if($request->input('oldmusic') != '/homes/user/Public/nice.mp3' && $request->input('oldthumb_music') !="/homes/user/Public/nice.jpg"){
                        unlink('.'.$request->input('oldmusic'));
                        unlink('.'.$request->input('oldthumb_music'));
                    }
     				return redirect('/home/user/center')->with('success','修改成功,下次登录即可聆听');
     			}else{
     				return back()->with('error','修改失败,请稍后再试');
     			}
     		}
        }catch(\Exception $e){
          return back()->with('error','上传失败,请稍后再试');
        }
    }
    //每日一语设置
    public function sentence(Request $request)
    {
        if ($request -> method() == 'GET') {
            abort('404');
        }
        
        //设置返回数组
        $returnSentence = [];
        //获取数据
        $sentence = $request->except('_token');
        //当前时间
        $now = time();
        try{
            //代表当天次数
            $rs = DB::table('homeuser_sentence')->where('sentence_time','>=',$now)->where('uid',$request->input('uid'))->get()->toArray();
            if(count($rs) >= 6){
              return 101;//代表当天时间已经有6次了
            }else{
                $get_sentence_num = count($rs);
            }
            //查询已有一语id
            $rs = DB::table('homeuser_sentence')->where('uid',$request->input('uid'))->get()->toArray();
            if(!empty($rs)){
                $in = [];
                foreach($rs as $k=>$v){
                    if($v->status == 0){
                        $in[] =  $v->sentence_id;
                    }
                }
            }else{
                $in =  ['0'=>0];
            }    
            //查询用户没有的 每日一语id
            $senId  = AdminSentence::whereNotIn('id',$in)->pluck('id')->toArray();
            if(empty($senId)){
                return 9;
            }
            //翻转id
            $senId = array_flip($senId);
            //随机取id
            $sentence['sentence_id'] = array_rand($senId);
            // 查询获得一语id的一语
            $returnSentence['heart_sentence'] = AdminSentence::where('id',$sentence['sentence_id'])->pluck('heart_sentence')->toArray()[0];
            //用户获得时间
            $sentence['addtime'] = $now;
            $sentence_year = date('Y',$sentence['addtime']);//当前年
            $sentence_month = date('m',$sentence['addtime']);//当前月
            $sentence_day = date('d',$sentence['addtime']);//当前日
            $sentence['sentence_time'] = mktime(0,0,0,$sentence_month,$sentence_day+1,$sentence_year);
            $userSentenceInsert =  DB::table('homeuser_sentence')->insert($sentence);
            if($userSentenceInsert){
                //获取当前积分
                $now_integral = HomeUser::where('id',$request->input('uid'))->pluck('integral')[0];
                if($now_integral == '0'){
                    return 100;
                }
                //扣除积分
                $minus_integral = HomeUser::where('id',$request->input('uid'))->update(['integral'=>$now_integral-1]);
                if($minus_integral){
                    $returnSentence['integral'] =  $now_integral-1;
                    session(['integral'=>$returnSentence['integral']]);
                }else{
                    return 1;
                }
                $returnSentence['addtime'] =$sentence['addtime'];
                session(['get_sentence_num'=>$get_sentence_num+1]);
                $returnSentence['get_sentence_num'] = $get_sentence_num+1;
                return  $returnSentence;
            }else{
                return 1;//获取失败
            }
        }catch(\Exception $e){
                return 1;//获取失败
        }
    }
    public function ajaxsentence(Request $request){
        $sentence = DB::table('homeuser_sentence')->where('uid',session('homeuser')->id)->orderBy('addtime','desc')->skip($request->input('page'))->limit(7)->get();
        if(empty($sentence)){
            return [];
        }
        // dd($sentence);
        if(!empty($sentence)){
            foreach($sentence as $k=>$v){
                $isHave = AdminSentence::where('id',$v->sentence_id)->get()->toArray();
                if(empty($isHave)){
                    $sentence[$k]->heart_sentence = '该一语不存在或已被删除';
                    $sentence[$k]->status = 0;
                }else{
                    $sentence[$k]->heart_sentence = AdminSentence::where('id',$v->sentence_id)->pluck('heart_sentence')->toArray()[0];
                     $sentence[$k]->status =  AdminSentence::where('id',$v->sentence_id)->pluck('status')->toArray()[0];
                }
            }
        }
        return $sentence;
    }
    public function ajaxlike(Request $request){
         //我的喜欢
        $likes = DB::table('praise')->where('u_id',session('homeuser')->id)->skip($request->input('pagelike'))->limit(4)->get()->toArray();
        if(!empty($likes)){
            $infolike = [];
            foreach ($likes as $k => $v) {
                $infolike[] = DetailsContent::where('id',$v->d_c_id)->orderBy('addtime','desc')->first()->toArray();
            }
            return $infolike;
        }else{
            return [];
        }
    }
}

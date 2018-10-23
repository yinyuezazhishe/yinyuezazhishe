<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\Admin\HomeUsers;
use App\Model\Home\HomeUserMusic;
use App\Model\Admin\Integral;
use Illuminate\Support\Facades\Mail;
use Cookie;
use DB;

class HomeLoginController extends Controller
{
	/**
	 *  登录验证
	 *
	 *  @return \Illuminate\Http\Response.
	 */
    public function dologin(Request $request)
    {
        session(['login' => '1']);

        $uri = empty(session('uri')) ? '/' : session('uri');

    	$res = $request -> except('_token');

    	if (!preg_match_all("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_\-]{3,10}$/u",$res['username'])) {
            return redirect($uri)->with('error','用户名里含有字母、数字、下划线、中文以外的非法字符且必须最少3位, 最多十位！')-> withInput();
        }

        if (empty($res['password'])) {
            return redirect($uri) -> with('error', '密码不能为空！')-> withInput();
        }

        if (!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[\S]{6,16}$/', $res['password'])) {
            return redirect($uri) -> with('error', '必须有数字和字母, 且必须要六位, 不能超过十六位！')-> withInput();
        }

        if (strtolower($res['code']) != strtolower(session('code'))) {
        	// echo $res['code'];
        	// echo session('code');
			return redirect($uri)->with('error','验证码错误');
		}

        $user = HomeUsers::where('username', $res['username']) -> first();

        if ($user) {
            $music = HomeUserMusic::where('uid',$user->id)->first();
            if ($user -> status == 1) {
                return redirect($uri)->with('error','您的账户已被禁用, 请联系网站管理员!')-> withInput();

            } else if ($user -> status == 2) {
                return redirect($uri)->with('error','您输入的的邮箱未在本网站注册验证成功, 请前往您注册时的邮箱进行验证再进行登录!')-> withInput();
            }

    		if ($user -> username != $res['username']) {
	    		return redirect($uri)->with('error','用户名或密码错误')-> withInput();
	    	}

	    	if (!Hash::check($res['password'], $user -> password)) {
			    return redirect($uri)->with('error','用户名或密码错误')-> withInput();
			}

    	} else {
    		return redirect($uri)->with('error','用户名或密码错误')-> withInput();
    	}
        if(!empty($music)){
            session(["homeuserMusic"=>$music]);
        }
    	session(['homeuser' => $user]);
        session(['sdasd'=>$user->sdasd]);
        session(['homeface'=>$user->face]);
        // 积分
        $integral = Integral::where('hid',$user->id)->first();
        $now = time();
        $year = date('Y',$now); //年
        $month = date('m',$now); //月
        $day = date('d',$now); //日
        $hour = date('H',$now); //小时
        $minute = date('i',$now);//分
        $seconds = date('s',$now);//秒
        $futureday = mktime($hour,$minute,$seconds,$month,$day+1,$year);
        if($integral->futuretime <= $now){
            Integral::where('hid',$user->id)->update(['did_num'=>0,'mid_num'=>0,'rid_num'=>0,'hid_num'=>0]);
        }
        if($integral){
            //查积分是否超过最大设置值
            $isHid = Integral::where('hid',$user->id)->where('hid_num','>=',$integral->max_num)->first();   
        }else{
            $intId = Integral::insertGetId(['hid'=>$user->id]);
            if($intId){
                $isHid = Integral::where('hid',$user->id)->where('hid_num','>=',5)->first();
            }
        }
        if(!$isHid){
            Integral::where('hid',$user->id)->update(['hid_num'=>5,'futuretime'=>$futureday]);
            HomeUsers::where('id',$user->id)->update(['integral'=>$user->integral+5]);
        }
        $integral = HomeUsers::where('id', $user->id)->get()->pluck('integral')[0];
        // $sentence = DB::table('homeuser_sentence')->where('sentence_time','>=',$now)->where('uid',$user->id)->get()->toArray();
        // session(['get_sentence_num'=>count($sentence)]);
        session(['integral'=>$integral]);

    	$uris = empty(session('back')) ? $uri : session('back');

        $request->session()->forget('back');
        $request->session()->forget('login');

        return redirect($uris)->with('success','登录成功');
    	// dd($res);
    }

    /**
     *  注册验证
     *
     *  @return \Illuminate\Http\Response.
     */

    public function doregister(Request $request)
    {
        session(['register' => '1']);

        $uri = empty(session('uri')) ? '/' : session('uri');

    	$req = $request -> except('_token', 'repassword');

        $users = HomeUsers::get();

        foreach ($users as $k => $v) {

            if ($req['username'] == $v -> username ) {

                 return redirect($uri)->with('error', '您注册的用户名重复, 请重新输入！')-> withInput();
            }

            if ($req['email'] == $v -> email ) {

                 return redirect($uri)->with('error', '您注册的邮箱重复, 请重新输入！')-> withInput();
            }
        }

        // dd($users);

    	if (!preg_match_all("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_\-]{3,10}$/u",$req['username'])) {

            return redirect($uri)->with('error','用户名里含有字母、数字、下划线、中文以外的非法字符且必须最少3位, 最多十位！')-> withInput();
        }

        if (empty($req['password'])) {

            return redirect($uri) -> with('error', '密码不能为空！')-> withInput();
        }

        if($req['password'] !== $request -> repassword) {

            return redirect($uri) -> with('error', '两次密码不一致！')-> withInput();
        }

        if (!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[\S]{6,16}$/', $req['password'])) {

            return redirect($uri) -> with('error', '必须有数字和字母, 且必须要六位, 不能超过十六位！')-> withInput();
        }

        if (!preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $req['email'])) {

            return redirect($uri) -> with('error', '您输入的邮箱格式不正确')-> withInput();
        }

        $req['password'] = Hash::make($request->password);

        $req['face'] = '/homes/Public_face/01.jpg';

        $req['status'] = '2';

        $req['addtime'] = time();

        $req['token'] = str_random(60);

        $rs = HomeUsers::insertGetId($req);

        if (!$rs) {

        	abort('404');
        }

        if($rs){
            Integral::insert(['hid'=>$rs]);
            HomeUserMusic::insert(['uid'=>$rs]);
    		//发送邮件
        	Mail::send('home.email.emessage', ['id'=>$rs,'req'=>$req,'token'=>$req['token']], function ($msg) use ($req){
        		//从哪发的邮件
	            $msg->from(env('MAIL_USERNAME'), '音悦杂志社');
	            //发给谁的
	            $msg->to($req['email'], $req['username'])->subject('感谢注册音悦杂志社');
	        });
    	}

        //发送邮件成功的提醒
        return view('Home.email.remind');

    	// dd($rs);
    }

    /**
     *  邮件验证
     *
     *  @return \Illuminate\Http\Response.
     */

    public function activate(Request $request)
    {
    	//获取id
        $id = $request->input('id');

        //通过id获取数据
        $res = HomeUsers::find($id);

        //获取token
        $token = $request->input('token');

        //对比token
        if($token != $res->token){

            abort(404);
        }

        $rs['status'] = '0';
        //把id这条数据的状态从 2变成 0 

        $data = HomeUsers::where('id', $id)->update($rs);

        if($data){

            return redirect('/') -> with('success', '验证邮箱成功, 请点击首页进行登录!');
        }
    }

    /**
     *  退出登录
     *
     *  @return \Illuminate\Http\Response.
     */
    public function logout(Request $request)
    {
        $uri = empty(session('uri')) ? '/' : session('uri');

        $request->session()->forget('homeuser');
        session()->forget('sdasd');
        session()->forget('integral');
        session()->forget('get_sentence_num');
        if(session('homeuserMusic')){
            session()->forget('homeuserMusic');
        } 
    	session()->forget('homeface');

    	return redirect($uri) -> with('success', '退出登录成功!');
    }

    /**
     *  发送验证码邮件
     *
     *  @return \Illuminate\Http\Response.
     */
    public function sendemail(Request $request)
    {
        $email = $request -> input('email');

        $user = HomeUsers::where('email', $email) -> first();

        $code = str_random(6);

        Cookie::queue('homecode', $code, 5);

        // var_dump( Cookie::get('home') ) ;

        if ($user) {

            if ($user -> status == '1') {

                return 2;
            }

            // 发送邮件
            Mail::send('Home.email.ecode', ['code' => $code, 'email' => $email], function ($msg) use ($user, $email){
                //从哪发的邮件
                $msg->from(env('MAIL_USERNAME'), '音悦杂志社');
                // //发给谁的
                $msg->to($email, $user->username)->subject('重置音悦杂志社密码');
            });

            return 0;

        } else {

            return 1;
        }
    }

    /**
     *  重置密码验证
     *
     *  @return \Illuminate\Http\Response.
     */
    public function forgetpass(Request $request)
    {
        session(['forgetpass' => '1']);

        $uri = $request -> input('uri');

        $uri = empty($uri) ? '/' : $uri;

        $res = $request -> except('_token', 'repassword');

        $user = HomeUsers::where('email' ,$res['email']) -> first();

        if (strtolower($res['code']) != strtolower(Cookie::get('homecode'))) {
            // echo $res['code'].'<br>';
            // echo Cookie::get('homecode');
            return redirect($uri) -> with('error', '您输入的验证码有误, 请确认输入验证码与邮箱验证码一致!') -> withInput();
        }

        if (!preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $res['email'])) {
            return redirect($uri) -> with('error', '您输入的邮箱格式不正确!')-> withInput();
        }

        if (empty($res['password'])) {
            return redirect($uri) -> with('error', '密码不能为空!') -> withInput();
        }

        if (!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[\S]{6,16}$/', $res['password'])) {
            return redirect($uri) -> with('error', '必须有数字和字母, 且必须要六位, 不能超过十六位!') -> withInput();
        }

        if($res['password'] !== $request -> input('repassword')) {
            return redirect($uri) -> with('error', '两次密码不一致!') -> withInput();
        }

        if (Hash::check($res['password'], $user -> password)) {
            return redirect($uri) -> with('error', '不能与最近密码一致, 请更换密码!') -> withInput();
        }

        $pass['password'] = Hash::make($res['password']);

        // dd($res);

        try{
           
            $rs = HomeUsers::where('email' ,$res['email']) -> update($pass);

            if($rs){

                return redirect($uri)->with('success','修改密码成功');
            }

        }catch(\Exception $e){

            // echo $e -> getCode();
            // echo $e -> getMessage();

            return back()->with('error','修改密码失败') -> withInput();
        }
    }
}

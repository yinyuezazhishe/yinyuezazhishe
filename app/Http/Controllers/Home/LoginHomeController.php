<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\Home\HomeUser;
use Illuminate\Support\Facades\Mail;
use Cookie;

class LoginHomeController extends Controller
{
	/**
	 *  登录验证
	 *
	 *  @return \Illuminate\Http\Response.
	 */
    public function dologin(Request $request)
    {
    	$res = $request -> except('_token');

    	if (!preg_match_all("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_\-]{3,10}$/u",$res['username'])) {
            return redirect('/')->with('error','用户名里含有字母、数字、下划线、中文以外的非法字符且必须最少3位, 最多十位！');
        }

        if (empty($res['password'])) {
            return redirect('/') -> with('error', '密码不能为空！');
        }

        if (!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[\S]{6,16}$/', $res['password'])) {
            return redirect('/') -> with('error', '必须有数字和字母, 且必须要六位, 不能超过十六位！');
        }

        if (strtolower($res['code']) != strtolower(session('code'))) {
        	// echo $res['code'];
        	// echo session('code');
			return redirect('/')->with('error','验证码错误');
		}

        $user = HomeUser::where('username', $res['username']) -> first();

        if ($user) {

            if ($user -> status == 1) {
                return redirect('/')->with('error','您的账户已被禁用, 请联系网站管理员!');

            } else if ($user -> status == 2) {
                return redirect('/')->with('error','您输入的的邮箱未在本网站注册验证成功, 请前往您注册时的邮箱进行验证再进行登录!');
            }

    		if ($user -> username != $res['username']) {
	    		return redirect('/')->with('error','用户名或密码错误');
	    	}

	    	if (!Hash::check($res['password'], $user -> password)) {
			    return redirect('/')->with('error','用户名或密码错误');
			}

    	} else {
    		return redirect('/')->with('error','用户名或密码错误');
    	}

    	session(['homeuser' => $user]);

    	return redirect('/')->with('success','登录成功');

    	// dd($res);
    }

    /**
     *  注册验证
     *
     *  @return \Illuminate\Http\Response.
     */

    public function doregister(Request $request)
    {
    	$req = $request -> except('_token', 'repassword');

        $users = HomeUser::get();

        foreach ($users as $k => $v) {

            if ($req['username'] == $v -> username ) {

                 return redirect('/')->with('error', '您注册的用户名重复, 请重新输入！');
            }

            if ($req['email'] == $v -> email ) {

                 return redirect('/')->with('error', '您注册的邮箱重复, 请重新输入！');
            }
        }

        // dd($users);

    	if (!preg_match_all("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_\-]{3,10}$/u",$req['username'])) {

            return redirect('/')->with('error','用户名里含有字母、数字、下划线、中文以外的非法字符且必须最少3位, 最多十位！');
        }

        if (empty($req['password'])) {

            return redirect('/') -> with('error', '密码不能为空！');
        }

        if($req['password'] !== $request -> repassword) {

            return redirect('/') -> with('error', '两次密码不一致！');
        }

        if (!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[\S]{6,16}$/', $req['password'])) {

            return redirect('/') -> with('error', '必须有数字和字母, 且必须要六位, 不能超过十六位！');
        }

        if (!preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $req['email'])) {

            return redirect('/') -> with('error', '您输入的邮箱格式不正确');
        }

        $req['password'] = Hash::make($request->password);

        $req['face'] = '/uploads/homes/01.jpg';

        $req['status'] = '2';

        $req['addtime'] = time();

        $req['token'] = str_random(60);

        $rs = HomeUser::insertGetId($req);

        if (!$rs) {

        	abort('404');
        }

        if($rs){

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
        $res = HomeUser::find($id);

        //获取token
        $token = $request->input('token');

        //对比token
        if($token != $res->token){

            abort(404);
        }

        $rs['status'] = '0';
        //把id这条数据的状态从 2变成 0 

        $data = HomeUser::where('id', $id)->update($rs);

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
    	$request->session()->forget('homeuser');

    	return redirect('/') -> with('success', '退出登录成功!');
    }

    /**
     *  发送验证码邮件
     *
     *  @return \Illuminate\Http\Response.
     */
    public function sendemail(Request $request)
    {
        $email = $request -> input('email');

        $user = HomeUser::where('email', $email) -> first();

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

        $res = $request -> except('_token', 'repassword');

        $user = HomeUser::where('email' ,$res['email']) -> first();
        echo $res['code'].'<br>';
        echo Cookie::get('homecode');
        if (strtolower($res['code']) != strtolower(Cookie::get('homecode'))) {
            echo $res['code'].'<br>';
            echo Cookie::get('homecode');
            // return redirect('/') -> with('error', '您输入的验证码有误, 请确认输入验证码与邮箱验证码一致!');
        }

        if (!preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $res['email'])) {
            return redirect('/') -> with('error', '您输入的邮箱格式不正确!');
        }

        if (empty($res['password'])) {
            return redirect('/') -> with('error', '密码不能为空!');
        }

        if (!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[\S]{6,16}$/', $res['password'])) {
            return redirect('/') -> with('error', '必须有数字和字母, 且必须要六位, 不能超过十六位!');
        }

        if($res['password'] !== $request -> input('repassword')) {
            return redirect('/') -> with('error', '两次密码不一致!');
        }

        if (Hash::check($res['password'], $user -> password)) {
            return redirect('/') -> with('error', '不能与最近密码一致, 请更换密码!');
        }

        $pass['password'] = Hash::make($res['password']);

        // dd($res);
        // try{
           
        //     $rs = HomeUser::where('email' ,$res['email']) -> update($pass);

        //     if($rs){

        //         return redirect('/')->with('success','修改密码成功');
        //     }

        // }catch(\Exception $e){

        //     // echo $e -> getCode();
        //     // echo $e -> getMessage();

        //     return back()->with('error','修改密码失败');
        // }
    }
}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\Home\HomeUser;
use Illuminate\Support\Facades\Mail;

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

        if ($res['code'] != session('code')) {
        	// echo $res['code'];
        	// echo session('code');
			return redirect('/')->with('error','验证码错误');
		}

        $user = HomeUser::where('username', $res['username']) -> first();

        if ($user) {

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

        $req['status'] = '0';

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

        $rs['status'] = '1';
        //把id这条数据的状态从 0 变成 1

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
    public function sendemail()
    {
    	echo 1;
    	// //发送邮件
    	// Mail::send('home.email.emessage', ['id'=>$rs,'req'=>$req,'token'=>$req['token']], function ($msg) use ($req){
    	// 	//从哪发的邮件
     //        $msg->from(env('MAIL_USERNAME'), '音悦杂志社');
     //        //发给谁的
     //        $msg->to($req['email'], $req['username'])->subject('感谢注册音悦杂志社');
     //    });
    }
}

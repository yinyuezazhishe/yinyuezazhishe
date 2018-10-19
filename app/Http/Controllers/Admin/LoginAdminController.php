<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\Model\Admin\AdminUsers;
use Hash;

class LoginAdminController extends Controller
{
	/**
	 *  登录主页面
	 *
	 *  @return string
	 */
    public function login()
    {
    	return view('Admin/Login/index', ['title' => '登录页']);
    }

    /**
     *  生成验证码
     *
     *  @return \Illuminate\Http\Response.
     */
    public function verify()
    {
		$phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 90, $height = 35, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        echo session(['code' => $phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    /**
     *  检测登录信息
     *
     *  @return \Illuminate\Http\Response.
     */
    public function dologin(Request $request)
    {
		// dd($user);

    	// echo session('code');

  //   	if ($request -> code != session('code')) {

		// 	return redirect('/admin/login')->with('error','验证码错误') -> withInput();
		// }

    	$user = AdminUsers::where('username', $request -> username) -> first();

    	if ($user) {

    		if ($user -> username != $request -> username) {

	    		return redirect('/admin/login')->with('error','用户名或密码错误') -> withInput();
	    	}

	    	// echo $request -> password;
	    	// echo $user -> password;

	    	if (!Hash::check($request -> password, $user -> password)) {

			    return redirect('/admin/login')->with('error','用户名或密码错误') -> withInput();
			}

    	} else {

    		return redirect('/admin/login')->with('error','用户名或密码错误') -> withInput();
    	}

    	// dump($user) ;
      //用户名
      session(['adminusers'=>$user]);
      //用户头像路径
      session(['adminusers_face'=>$user->face]);
        
    	return redirect('/admin')->with('success','登录成功');     
    }

    /**
     *  退出登录
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Exitlogon(Request $request)
    {   
        //将用户信息从session中清除
        $request->session()->forget(['adminusers', 'adminusers_face']);
        
        return redirect('/admin/login') -> with('success', '退出成功, 请重新登录');
    }
}
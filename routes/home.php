<?php

/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 前台主页
Route::any('/', 'Home\HomeIndexController@index');

// 前台首页删除session
Route::get('/home/resession', 'Home\HomeIndexController@resession');

// 前台登录验证
Route::post('home/dologin', 'Home\HomeLoginController@dologin');
// 前台注册验证
Route::post('home/doregister', 'Home\HomeLoginController@doregister');
// 前台邮箱验证
Route::any('home/activate', 'Home\HomeLoginController@activate');
// 前台退出登录
Route::any('home/logout', 'Home\HomeLoginController@logout');
// 前台发送邮箱验证码
Route::post('home/sendemail', 'Home\HomeLoginController@sendemail');
// 前台重置密码
Route::post('home/forgetpass', 'Home\HomeLoginController@forgetpass');

//前台链接展示
Route::get('home/blogroll','Home\BlogrollController@showBlogroll');

//前台留言展示
Route::resource('Home/message','Home\MessageController');

Route::group(['middleware'=>'homelogin'],function ()
{
	//前台个人中心显示
	Route::get('home/user/center','Home\HomeUsersController@index');
	//前台个人中心个性签名
	Route::get('home/user/sdasd','Home\HomeUsersController@sdasd');
	//前台个人中心设置
	Route::get('home/user/setting','Home\HomeUsersController@setting');
	//保存个人中心设置
	Route::post('home/user/saveinfo','Home\HomeUsersController@saveinfo');
	//上传用户头像
	Route::post('home/user/uploadface','Home\HomeUsersController@uploadface');
	//用户音乐设置
	Route::post('home/user/music',"Home\HomeUsersController@music");
	//每日一语设置
	Route::post('home/user/sentence','Home\HomeUsersController@sentence');
});

//前台活动页面展示
Route::get('home/activity','Home\HomeActivityController@index')->middleware('activity');
//前台用户获得积分
Route::post('home/activity/get','Home\HomeActivityController@getActivity');
//活动结束或未开始
Route::get('home/noactivity','Home\HomeActivityController@noactivity');

// 前台列表显示
Route::any('home/lists/{id}', 'Home\HomeListsController@index');

// 前台详情显示
Route::any('home/details/{id}', 'Home\HomeDetailsController@index');
// 详情点赞
Route::get('home/praise', 'Home\HomeDetailsController@praise');

//评论
Route::resource('home/comment','Home\CommentController');
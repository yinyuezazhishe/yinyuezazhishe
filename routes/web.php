<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('Home.Public.layout');
});

// 后台管理主页
Route::any('admin','Admin\IndexController@init');

// Route::get('admin/login', 'Admin\LoginAdminController@login');

// Route::post('admin/dologin', 'Admin\LoginAdminController@dologin');

// Route::any('/code', 'Admin\LoginAdminController@verify');

// // 前台登录验证
// Route::post('home/dologin', 'Home\LoginHomeController@dologin');

// // 前台注册验证
// Route::post('home/doregister', 'Home\LoginHomeController@doregister');

// // 前台邮箱验证
// Route::any('home/activate', 'Home\LoginHomeController@activate');

// // 前台退出登录
// Route::any('home/logout', 'Home\LoginHomeController@logout');

// // 前台发送邮箱验证码
// Route::post('homendemail', 'Home\LoginHomeController@sendemail');

// Route::any('admin',function(){
// 	return view('Admin.Public.layout');
// });

//后台链接管理
Route::prefix('Admin')->group(function(){
	Route::get('Blogroll/rank','Admin\AdminBlogrollController@rank');
	Route::resource('Blogroll','Admin\AdminBlogrollController');
});
//前台链接展示
Route::get('Home/Blogroll','Home\BlogrollController@showBlogroll');

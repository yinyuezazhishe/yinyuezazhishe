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

// 后台管理主页
Route::any('admin','Admin\IndexController@init');

// 后台登录
Route::get('admin/login', 'Admin\LoginAdminController@login');

// 后台登录验证
Route::post('admin/dologin', 'Admin\LoginAdminController@dologin');

//后台退出登录
Route::get('/admin/Exitlogon','Admin\LoginAdminController@Exitlogon');

// 后台角色管理
Route::resource('admin/role', 'Admin\RoleAdminController');

// 后台权限管理
Route::resource('admin/permission', 'Admin\PermissionAdminController');

//后台链接管理
Route::prefix('Admin')->group(function(){
	Route::get('Blogroll/rank','Admin\AdminBlogrollController@rank');
	Route::resource('Blogroll','Admin\AdminBlogrollController');
});

//后台用户修改头像
Route::get('/admin/user/setFace','Admin\AdminUsersController@setFace');
Route::post('/admin/user/do_setFace','Admin\AdminUsersController@do_setFace');

//后台用户修改密码
Route::get('/admin/setPass','Admin\AdminUsersController@setPass');
Route::post('/admin/doPass','Admin\AdminUsersController@doPass');

//后台用户
Route::get('/admin/user/getName','Admin\AdminUsersController@getName');
Route::resource('/admin/user','Admin\AdminUsersController');

// 类别管理
Route::resource('Admin/category', 'Admin\AdminCategoryController');

// 轮播图管理
Route::resource('Admin/banner', 'Admin\AdminBannerController');

// 广告管理
Route::resource('Admin/advertising', 'Admin\AdminAdvertisingController');

// 留言板管理
Route::resource('Admin/message', 'Admin\AdminMessageController');





// 前台主页
Route::any('/', function () {
    return view('Home/index');
});

// 前台登录验证
Route::post('home/dologin', 'Home\LoginHomeController@dologin');

// 前台注册验证
Route::post('home/doregister', 'Home\LoginHomeController@doregister');

// 前台邮箱验证
Route::any('home/activate', 'Home\LoginHomeController@activate');

// 前台退出登录
Route::any('home/logout', 'Home\LoginHomeController@logout');

// 前台发送邮箱验证码
Route::post('home/sendemail', 'Home\LoginHomeController@sendemail');

// 前台重置密码
Route::post('home/forgetpass', 'Home\LoginHomeController@forgetpass');

//前台链接展示
Route::get('Home/Blogroll','Home\BlogrollController@showBlogroll');




// 生成验证码
Route::any('/code', 'Admin\LoginAdminController@verify');	
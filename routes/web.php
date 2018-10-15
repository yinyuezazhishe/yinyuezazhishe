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

Route::get('/', function () {
    return view('Home/index');
});


//用户修改头像
Route::get('/admin/user/setFace','Admin\AdminUsersController@setFace');
Route::post('/admin/user/do_setFace','Admin\AdminUsersController@do_setFace');

//用户修改密码
Route::get('/admin/setPass','Admin\AdminUsersController@setPass');
Route::post('/admin/doPass','Admin\AdminUsersController@doPass');

//后台用户
Route::resource('/admin/user','Admin\AdminUsersController');

//查询后用户名称是否重复
Route::get('/admin/user/getName','Admin\AdminUsersController@getName');

// 后台管理主页
Route::any('admin','Admin\IndexController@index');

// 后台登录
Route::get('/admin/login', 'Admin\LoginAdminController@login');
Route::post('/admin/dologin', 'Admin\LoginAdminController@dologin');

//后台退出登录
Route::get('/admin/Exitlogon','Admin\LoginAdminController@Exitlogon');

// 生成验证码
Route::any('/code', 'Admin\LoginAdminController@verify');




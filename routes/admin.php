<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>'adminlogin'], function ()
{
		// 后台管理主页
Route::any('admin','Admin\IndexController@init');
	// Route::group(['middleware'=>'u_r_p'], function ()
// {
	// 后台角色管理
	Route::resource('admin/role', 'Admin\RoleAdminController');
// });


	// 后台权限管理
	Route::resource('admin/permission', 'Admin\PermissionAdminController');

	/* 后台用户角色权限 */
	// 为用户添加角色
	Route::get('admin/user_role/{id}/u_r_edit', 'Admin\User_Role_Permission@u_r_edit');
	// 处理用户添加角色
	Route::post('admin/u_r_update', 'Admin\User_Role_Permission@u_r_update');
	// 为角色添加权限
	Route::get('admin/role_permission/{id}/r_p_edit', 'Admin\User_Role_Permission@r_p_edit');
	// 处理角色添加权限
	Route::post('admin/r_p_update', 'Admin\User_Role_Permission@r_p_update');

	//后台用户修改头像
	Route::get('/admin/user/setFace','Admin\AdminUsersController@setFace');
	Route::post('/admin/user/do_setFace','Admin\AdminUsersController@do_setFace');

	//后台用户主题修改
	Route::get('/admin/setTheme','Admin\AdminUsersController@setTheme');
	//后台用户修改密码
	Route::get('/admin/setPass','Admin\AdminUsersController@setPass');
	Route::post('/admin/doPass','Admin\AdminUsersController@doPass');

	//后台用户
	Route::get('/admin/user/getName','Admin\AdminUsersController@getName');
	Route::resource('/admin/user','Admin\AdminUsersController');

	// 后台类别管理
	Route::resource('Admin/category', 'Admin\AdminCategoryController');

	// 后台轮播图管理
	Route::resource('Admin/banner', 'Admin\AdminBannerController');

	// 后台广告管理
	Route::resource('Admin/advertising', 'Admin\AdminAdvertisingController');

	// 后台留言板管理
	Route::resource('Admin/message', 'Admin\AdminMessageController');

	// 后台详情管理
	Route::resource('admin/details', 'Admin\AdminDetailsController');
	// 后台详情状态
	Route::get('admin/details/{id}/edit_status', 'Admin\AdminDetailsController@edit_status');

	// 后台列表管理
	Route::resource('admin/lists', 'Admin\AdminListsController');
	// 后台列表状态
	Route::get('admin/lists/{id}/edit_status', 'Admin\AdminListsController@edit_status');

	//后台链接管理
	Route::prefix('admin')->group(function(){
		Route::get('blogroll/rank','Admin\AdminBlogrollController@rank');
		Route::resource('blogroll','Admin\AdminBlogrollController');
		//会员管理
		Route::get('homeusers/index','Admin\HomeUsersController@index');
		//会员状态
		Route::get('homeusers','Admin\HomeUsersController@status');
		//会员删除
		Route::delete('homeusers/{id}','Admin\HomeUsersController@distory');

		// 后台活动管理
		Route::resource('activity','Admin\AdminActivityController');
		//用户积分
		Route::get('integral/index','Admin\HomeIntegralController@index');
		Route::get('integral/{id}/show','Admin\HomeIntegralController@show');

		//后台每日一语管理
	Route::resource('sentence','Admin\AdminSentenceController');
	});
});

// 后台登录
Route::get('admin/login', 'Admin\LoginAdminController@login');

// 后台登录验证
Route::post('admin/dologin', 'Admin\LoginAdminController@dologin');

//后台退出登录
Route::get('/admin/Exitlogon','Admin\LoginAdminController@Exitlogon');
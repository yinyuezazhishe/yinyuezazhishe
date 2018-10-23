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
	// ��̨������ҳ
	Route::any('admin','Admin\IndexController@init');

	Route::group(['middleware'=>'u_r_p'], function ()
	{
		// ��̨��ɫ����
		Route::resource('admin/role', 'Admin\RoleAdminController');

		// ��̨Ȩ�޹���
		Route::resource('admin/permission', 'Admin\PermissionAdminController');

		/* ��̨�û���ɫȨ�� */
		// Ϊ�û���ӽ�ɫ
		Route::get('admin/user_role/{id}/u_r_edit', 'Admin\User_Role_Permission@u_r_edit');
		// �����û���ӽ�ɫ
		Route::post('admin/u_r_update', 'Admin\User_Role_Permission@u_r_update');
		// Ϊ��ɫ���Ȩ��
		Route::get('admin/role_permission/{id}/r_p_edit', 'Admin\User_Role_Permission@r_p_edit');
		// �����ɫ���Ȩ��
		Route::post('admin/r_p_update', 'Admin\User_Role_Permission@r_p_update');

		//��̨�û��޸�ͷ��
		Route::get('/admin/user/setFace','Admin\AdminUsersController@setFace');
		Route::post('/admin/user/do_setFace','Admin\AdminUsersController@do_setFace');

		//��̨�û������޸�
		Route::get('/admin/setTheme','Admin\AdminUsersController@setTheme');
		//��̨�û��޸�����
		Route::get('/admin/setPass','Admin\AdminUsersController@setPass');
		Route::post('/admin/doPass','Admin\AdminUsersController@doPass');

		//��̨�û�
		Route::get('/admin/user/getName','Admin\AdminUsersController@getName');
		Route::resource('/admin/user','Admin\AdminUsersController');

		// ��̨������
		Route::resource('Admin/category', 'Admin\AdminCategoryController');

		// ��̨�ֲ�ͼ����
		Route::resource('Admin/banner', 'Admin\AdminBannerController');

		// ��̨������
		Route::resource('Admin/advertising', 'Admin\AdminAdvertisingController');

		// ��̨���԰����
		Route::resource('Admin/message', 'Admin\AdminMessageController');

		// ��̨�������
		Route::resource('admin/details', 'Admin\AdminDetailsController');
		// ��̨����״̬
		Route::get('admin/details/{id}/edit_status', 'Admin\AdminDetailsController@edit_status');

		// ��̨�б����
		Route::resource('admin/lists', 'Admin\AdminListsController');
		// ��̨�б�״̬
		Route::get('admin/lists/{id}/edit_status', 'Admin\AdminListsController@edit_status');

		//��̨���ӹ���
		Route::prefix('admin')->group(function(){
			Route::get('blogroll/rank','Admin\AdminBlogrollController@rank');
			Route::resource('blogroll','Admin\AdminBlogrollController');
			//��Ա����
			Route::get('homeusers/index','Admin\HomeUsersController@index');
			//��Ա״̬
			Route::get('homeusers','Admin\HomeUsersController@status');
			//��Աɾ��
			Route::delete('homeusers/{id}','Admin\HomeUsersController@distory');

			// ��̨�����
			Route::resource('activity','Admin\AdminActivityController');
			//�û�����
			Route::get('integral/index','Admin\HomeIntegralController@index');
			Route::get('integral/{id}/show','Admin\HomeIntegralController@show');

			//��̨ÿ��һ�����
			Route::resource('sentence','Admin\AdminSentenceController');
		});
	});
});

// ��̨��¼
Route::get('admin/login', 'Admin\LoginAdminController@login');

// ��̨��¼��֤
Route::post('admin/dologin', 'Admin\LoginAdminController@dologin');

//��̨�˳���¼
Route::get('/admin/Exitlogon','Admin\LoginAdminController@Exitlogon');
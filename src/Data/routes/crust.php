<?php

Route::group(['middleware' => ['crust:~x102']], function () {
	Route::get('crust',      'CrustController@index');
	Route::get('crust/seed', 'CrustMigrationController@index');

	Route::group(['prefix' => 'crust/api/v1/'], function () {
		Route::resource('users',       'CrustUserController');
		Route::resource('roles',       'CrustRoleController');
		Route::resource('permissions', 'CrustPermitController');
	});

	Route::group(['prefix' => 'crust/partial'], function () {
		Route::get('dashboard.html', 'CrustController@dashboard');
		Route::get('role.html',      'CrustController@role');

		Route::group(['prefix' => 'modal'], function () {
			Route::get('userinfo.html',   'CrustController@modalUserInfo');
			Route::get('userdelete.html', 'CrustController@modalUserDelete');

			Route::get('role.html',       'CrustController@modalRole');
			Route::get('roledelete.html', 'CrustController@modalRoleDelete');
			
			Route::get('success.html',    'CrustController@modalSuccess');
			Route::get('waiting.html',    'CrustController@modalWaiting');

			Route::get('permission.html', 'CrustController@modalPermission');
			Route::get('permissiondelete.html', 'CrustController@modalPermissionDelete');
		});
	});
});
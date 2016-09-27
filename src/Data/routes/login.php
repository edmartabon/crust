<?php

Route::get('login',  'LoginTemplateController@login');
Route::get('logout', 'LoginAuthenticateController@logout');

Route::post('crust/authenticate', ['as' => 'login', 'uses' => 'LoginAuthenticateController@authenticate']);
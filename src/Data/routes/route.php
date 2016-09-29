<?php

Route::group(['middleware' => ['web'], 'namespace' => 'Crust\Controllers'], function () {
    require 'login.php';
    require 'crust.php';
});

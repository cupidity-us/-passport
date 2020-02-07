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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

//2020 1. 13 登录 
Route::prefix('test/transmit')->group(function(){//前台登录页
    Route::any('doreg','test\TransmitController@doreg');//后台列表页
    Route::any('dologin','test\TransmitController@dologin');//后台列表页
    Route::any('getinfo','test\TransmitController@getinfo');//后台列表页
});
//项目接口
Route::prefix('port/port')->group(function(){//前台登录页
    Route::any('register','port\PortController@register');//后台列表页
  
});




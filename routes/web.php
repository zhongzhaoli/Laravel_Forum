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
//     return view('home');
//     //return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    //创建
    Route::get('/create', 'CreateController@index')->name('create');
    Route::resource('create','CreateController');
    //我的文章
    Route::get('/my','HomeController@my')->name('my');
    //个人信息
    Route::get('myself','MyselfController@index')->name('myself');
    Route::resource('myself','MyselfController');
    //文章图片上传
    Route::resource('upphoto','UpPhotoController');
    //评论
    Route::resource('comment','CommentController');

});
//首页
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
//文章详细
Route::get('/show/{id}','ShowController@index')->name('show');
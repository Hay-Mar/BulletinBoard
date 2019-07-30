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
// use App\Http\Middleware\checkRole;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
	//POST
	Route::resource('/posts','Post\PostController');

	//Post Create Confirm
	Route::post('/posts/confirm','Post\PostController@createConfirm')->name('posts.createConfirm');
	//Post Edit Confirm
	Route::post('/posts/editConfirm/{id}','Post\PostController@editConfirm')->name('posts.editConfirm');
	//Post Search
	Route::post('/search' , 'Post\PostController@search')->name('posts.search');
	//Show Post Details Modal
	Route::post('/showPost', 'Post\PostController@show');
	//Export Excel
    Route::get('/download','Post\PostController@export');

    //Import Excel
    Route::get('/csv/upload', 'Post\PostController@showUploadForm');
    Route::post('/csv/upload', 'Post\PostController@import');

    //USER
    Route::resource('/users','User\UserController');
    //User Create Confrim
    Route::post('/users/confirm','User\UserController@createConfirm')->name('users.createConfirm');
    //User Edit Confirm
    Route::post('/editConfirm/{id}','User\UserController@editConfirm')->name('users.editConfirm');
    //User Search
    Route::get('/search','User\UserController@search')->name('users.search');
    //User Detail Modal
    Route::post('/showUser','User\UserController@show');
    //User Profile
    Route::get('/profile/{id}', 'User\UserController@showProfile')->name('profile');
    //Change Password
    Route::get('/changePwd/{id}','User\UserController@changePwdForm')->name('password');
    Route::post('/changePwd/{id}','User\UserController@changePassword');
});
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
	return view('welcome');
});
Route::get('/trangchu', function () {
	return view('index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userlogout')->name('user.logout');

 // prefix user
Route::group(['prefix' => 'user', 'namespace'=>'User', 'middleware' => 'locale'],
	function (){
		Route::get('change-language/{language}', 'WedController@changeLanguage')
		->name('user.change-language');
		Route::resource('wed', 'WedController');
		Route::get('/wed/course/{id}', 'WedController@course');
	});

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'locale'], 
	function() {
		Route::get('change-language/{language}', 'Admin\StudentController@changeLanguage')
		->name('admin.change-language');
		// 
		Route::resource('/student', 'Admin\StudentController');
		Route::get('/student/contact/{id}', 'Admin\StudentController@contact');
		Route::post('/student/send/{id}', 'Admin\StudentController@contactsend');
		// 
		Route::resource('/department', 'Admin\DepartmentController');
		Route::resource('oppidan', 'Admin\OppidanController')->except(['index', 'create']);
		Route::get('/oppidan/create/{id}', 'Admin\OppidanController@createid');
		// 
		Route::resource('/course', 'Admin\CourseController');
		Route::resource('/violation', 'Admin\ViolationController')->except(['index', 'create']);
		// 
		Route::get('/violation/create/{id}', 'Admin\ViolationController@createid');
		// 
		Route::post('/showCourseInDepartment', 'Admin\StudentController@showCourseInDepartment');
		Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
		Route::get('/', 'AdminController@index')->name('admin.dashboard');
		Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
		// password reset
		Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
		Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
		Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
		Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
	});
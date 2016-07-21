<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/profile', function(){
 	return view('profile');
});

Route::get('/profile/edit', function(){
	return view('edit');
});

Route::post('/profile/edit', ['uses'=>'EditController@editUser']);

Route::group(['middleware'=>'admin'], function(){

	Route::get('/admin/userlist', ['as' => 'userlist', function(){
		return view('admin/userlist');
	}]);



	Route::get('/admin/user/{idedit}', ['as' => 'adminview', function($idedit){
		return view('admin/adminuserview', ['idedit' => $idedit]);
	}]);

	Route::get('/admin/edituser/{idedit}', ['as' => 'adminedit', function($idedit){
		return view('admin/adminedit', ['idedit' => $idedit]);
	}]);

	Route::post('/admin/edituser/edit', ['as' => 'admineditaction', 'uses'=>'AdminController@editSubmit']);

	Route::get('/admin/newuser', ['as' => 'adminnew', function(){
		return view('admin/adminnewuser');
	}]);

	Route::post('/admin/newuser', ['as' => 'adminnew', 'uses'=>'AdminController@newUser']);

	Route::post('/admin/reset', ['as' => 'adminreset','uses'=>'AdminController@resetPassword']);

});

Route::get('/403', function(){
	return view('403');
});


	Route::get('/admin/courselist', ['as' => 'courselist', function(){
		return view('admin/courselist');
	}]);

	Route::get('/admin/newcourse', ['as' => 'newcourse', function(){
		return view('admin/newcourse');
	}]);

	Route::post('/admin/newcourse', ['as' => 'newcourse', 'uses'=>'AdminController@newCourse']);

	Route::get('/admin/editcourse/{idcourse}', ['as' => 'courseedit', function($idcourse){
		return view('admin/courseedit', ['idcourse' => $idcourse]);
	}]);

	Route::post('/admin/editcourse/edit', ['as' => 'courseeditaction', 'uses'=>'AdminController@editCourse']);

	Route::post('courseview', ['uses'=>'Course\AdminController@editCourseForm']);
	Route::get('/admin/courseedit/{idcourse}', function($idcourse){
		return view('course/courseedit', ['idcourse' => $idcourse]);
	});

	


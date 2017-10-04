<?php
 Route::get('/', function() {
 	return view('welcome')->name('home');
 });
 Auth::routes();

/* Dashboard Index */
Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => ['auth']], function () {
   Route::get('{path?}', 'IndexController@index')->where('path', '[\/\w\.-]*');;
});

Route::get('/home', 'HomeController@index')->name('home');

/** User Api Routes **/
Route::group(['prefix' => 'api', 'middleware' => ['auth']], function(){
	Route::post('logout', 'UserController@logout');
	Route::put('updateprofile', 'UserController@updateProfile');
	Route::put('update_password', 'UserController@updatePassword');
	Route::get('stastitics', 'Dashboard\IndexController@stastitics');
	Route::resource('posts', 'Dashboard\PostController');
	Route::resource('pages', 'Dashboard\PageController');
});

/** Admin **/
Route::group(['prefix' => 'admin/home', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
   Route::get('{path?}', 'IndexController@index')->where('path', '[\/\w\.-]*');
});
Route::group(['prefix' => 'api/admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function(){
	Route::get('stastitics', 'IndexController@stastitics');
	Route::resource('users', 'UserController');
	Route::get('posts', 'IndexController@getPost');
	Route::get('pages', 'IndexController@getPage');
});

Route::get('/home', 'HomeController@index')->name('home');
/** Post Slug **/
Route::get('{slug}', 'IndexController@getPost');

 Route::get('health/{slug}', 'IndexController@getPage');
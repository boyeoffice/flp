<?php
 Route::get('/', function() {
 	return view('welcome')->name('home');
 });
 Route::get('health/{slug}', 'HomeController@getPage');
 Route::post('upload_image', 'HomeController@uploadImage')->name('posts.upload_image');

/* Dashboard Index */
Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => ['auth']], function () {
   Route::get('/', 'IndexController@index');
   Route::resource('posts', 'PostController');
   Route::resource('pages', 'PageController');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/** User Api Routes **/
Route::group(['prefix' => 'api', 'middleware' => ['auth']], function(){
	Route::post('logout', 'UserController@logout');
	Route::get('stastitics', 'Dashboard\IndexController@stastitics');
	Route::get('posts', 'Dashboard\PostController@getPost');
	Route::get('pages', 'Dashboard\PageController@getPages');
});
/** Post Slug **/
Route::get('{slug}', 'PostController@getPost');


/** Admin **/
Route::group(['prefix' => 'admin/home', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
   Route::get('{path?}', 'IndexController@index')->where('path', '[\/\w\.-]*');
});
Route::group(['prefix' => 'api/admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function(){
	Route::get('stastitics', 'IndexController@stastitics');
	Route::resource('users', 'UserController');
	Route::get('posts', 'IndexController@getPost');
});
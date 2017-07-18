<?php
 Route::get('/', function() {
 	return view('welcome')->name('home');
 });
 Route::post('upload_image', 'HomeController@uploadImage')->name('posts.upload_image');
 /* Temporary Link */
 Route::get('dashboard/edit_page/{id}/edit', 'HomeController@getEditPage');
 Route::post('dashboard/edit_page/{id}', 'HomeController@postEditPage')->name('upload');
 Route::get('health/{slug}', 'HomeController@getPage');
/* Dashboard Index */
Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => ['auth']], function () {
   Route::get('{path?}', 'IndexController@index')->where('path', '[\/\w\.-]*');

});
Route::resource('api/backend/pages', 'Dashboard\PageController');
Route::group(['prefix' => 'backend/v1'], function() {
	Route::post('logout', 'HomeController@getLogout');
});
Route::post('signin', 'HomeController@postSignin')->name('login');
 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/pages', 'HomeController@getPages');
Route::get('/home/page/{id}/edit', 'HomeController@getPage');
Route::post('/home/page/{id}', 'HomeController@updatePage');

//API
Route::group(['prefix' => 'api', 'namespace' => 'API'], function(){
	Route::resource('/pages', 'PageController');
});


/** User Api Routes **/
Route::group(['prefix' => 'api', 'middleware' => ['auth']], function(){
	Route::post('logout', 'UserController@logout');
	Route::resource('posts', 'PostController');
	Route::get('stastitics', 'Dashboard\IndexController@stastitics');
});
/** Post Slug **/
Route::get('{slug}', 'PostController@getPost');

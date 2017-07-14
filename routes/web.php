<?php
 Route::get('/', function() {
 	return view('welcome');
 });
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

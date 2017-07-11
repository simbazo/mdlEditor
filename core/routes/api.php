<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
  
Route::group(['prefix'=>'v1'],function(){
	//Projects Routers
	Route::post('/authenticate','Auth\ApiAuthController@authenticate');
	Route::group(['prefix'=>'projects'],function(){
	Route::get('/','Projects\ProjectsController@index')->name('projects.index');
	Route::post('store','Projects\ProjectsController@store')->name('projects.store');
	Route::put('update/{id}','Projects\ProjectsController@update')->name('projects.update');

	});
	Route::get('content','Editor\Content\ApiContentController@index');
	Route::get('treetable','Editor\Project\ProjectController@json');
	#'middleware'=>'jwt.auth'
	Route::group(['prefix'=>'users'],function(){
		Route::get('index','Auth\AuthController@index');
		Route::post('signup','Auth\AuthController@signup');
	});


});
Route::group(['prefix'=>'v2'],function(){
	Route::get('treetable','Editor\Project\ProjectController@json2');
});

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
	Route::post('/signup','Auth\ApiAuthController@signup');
	Route::get('/activate/otp/{otp}','Auth\ActivationController@otp')->name('auth.activate');
	Route::post('/activate/resend','Auth\ActivationController@resend')->name('auth.resend');
	Route::get('/profile','Auth\ApiAuthController@profile');

	Route::group(['prefix'=>'projects'],function(){
	Route::get('/','Projects\ProjectsController@index')->name('projects.index');
	Route::post('store','Projects\ProjectsController@store')->name('projects.store');
	Route::put('update/{id}','Projects\ProjectsController@update')->name('projects.update');
  
	});
	Route::get('content','Editor\Content\ApiContentController@index');
	Route::get('treetable','Editor\Project\ProjectController@json');
	Route::post('content/search','Editor\Content\ApiContentController@search')->name('content.search');
	Route::group(['prefix'=>'gender','namespace'=>'Gender'],function(){
		Route::get('/','GenderController@index');
		Route::post('store','GenderController@store');
	});

	Route::group(['prefix'=>'forms','namespace'=>'FormsApi'],function(){
		Route::group(['prefix'=>'manufactures'],function(){
			Route::get('/','ManufactureApiController@index');
			Route::post('store','ManufactureApiController@store');
			Route::patch('updated','ManufactureApiController@update');
			Route::delete('destroy','ManufactureApiController@destroy');
			Route::post('/search','ManufactureApiController@search');
		});
	});
	#'middleware'=>'jwt.auth'
	Route::group(['prefix'=>'users'],function(){
		Route::get('index','Auth\AuthController@index');
		Route::post('signup','Auth\AuthController@signup');
	});


});
Route::group(['prefix'=>'v2'],function(){
	Route::get('treetable','Editor\Project\ProjectController@json2');
});

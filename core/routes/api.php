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
   
Route::group(['prefix'=>'v1'],function() {	
	Route::post('/authenticate','Auth\ApiAuthController@authenticate');
	Route::post('/signup','Auth\ApiAuthController@signup');
	Route::get('/activate/otp/{otp}','Auth\ActivationController@otp')->name('auth.activate');
	Route::post('/activate/resend','Auth\ActivationController@resend')->name('auth.resend');
	Route::get('/profile','Auth\ApiAuthController@profile');
	Route::post('/u-profile','Auth\ApiAuthController@update');

	Route::get('/change-passwd/{email}','Auth\ActivationController@resetPassword')->name('resend.otp');
	Route::post('/change-passwd','Auth\ApiAuthController@changePassword');

	//Projects Routes
	Route::group(['prefix'=>'projects'],function() {
		Route::get('/','Projects\ProjectsController@index')->name('projects.index');
		Route::post('store','Projects\ProjectsController@store')->name('projects.store');
		Route::put('update/{id}','Projects\ProjectsController@update')->name('projects.update');
	});

	//Content Routes
	Route::group(['prefix'=>'contentapi', 'namespace'=>'Content'],function() {
			Route::get('/', 'ApiContentController@index')->name('contentapi.index');
			Route::post('/search', 'ApiContentController@search')->name('contentapi.search');
			Route::get('/{id}', 'ApiContentController@show')->name('contentapi.show');

			//LookupKeys Routes
			Route::group(['prefix'=>'lookupkey'],function() {
				Route::get('/','ApiLookupKeyController@index')->name('contentapi.lookupkey.index');
				Route::post('/search','ApiLookupKeyController@search')->name('content.lookupkey.search');
			});
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
		Route::resources([
			'ngos'		=>'NgosApiController',
			'devices'	=>'DevicesApiController',
			'icg-users'	=>'IcgUsersController',
			'pageimpressions' => 'PageImpressionsApiController',
			'icg-users'		=>'IcgUsersController'
		]);
		Route::get('icg/users/{pin}','IcgUsersController@pin')->name('icg-pin');
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

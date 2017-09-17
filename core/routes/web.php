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
Route::group(['prefix'=>'auth'],function(){
	Route::get('login','Auth\AuthController@login');
	Route::post('login','Auth\AuthController@postLogin');
	Route::get('logout','Auth\AuthController@logout')->name('logout');
	Route::get('/login/{service}','Auth\SocialLoginController@redirect');
	Route::get('/login/{service}/callback','Auth\SocialLoginController@callback');
});
Route::get('/activate/token/{token}','Auth\ActivationController@activate')->name('auth.activate');
Route::get('/activate/resend','Auth\ActivationController@resend')->name('auth.activate.resend');

Route::group(['middleware'=>'auth'],function(){
	Route::get('/', 'HomeController@index')->name('dashboard');
	Route::get('home', 'HomeController@index')->name('home');
	Route::get('/profile', 'Web\ProfileController@edit')->name('profile');
	Route::post('/profile', 'Web\ProfileController@update');
	Route::post('/productquestion','Editor\ProductsController@questions')->name('productquestion');
	
	Route::post('/questionsdetach','Editor\ProductsController@questionsdetach')->name('questionsdetach');

	Route::get('jquery-tree-view','Web\TreeController@treeView');
	Route::get('inline','Web\ContentController@inline')->name('inline');
	Route::get('treecontent/{id}','Web\ContentController@content');
	Route::get('preview/{id}','Web\ContentController@preview')->name('preview');
	Route::get('productspreview/{id}','Editor\ProductsController@preview')->name('productspreview');
	Route::get('ccontent/{id}','Web\ProjectsController@createStartPoint')->name('ccontent');
	Route::get('/json','Editor\Project\ProjectController@json')->name('json');
	Route::post('node/{id}','Web\ProjectsContentController@nodeUpdate')->name('node');
	Route::get('nodechild/{id}','Editor\Project\ProjectController@getNode')->name('nodechilds');
	Route::post('nodechild','Editor\Project\ProjectController@storeNode')->name('nodechild');
	Route::post('ajaxSearch','Editor\QuestionsController@ajaxSearch')->name('ajaxSearch');

	Route::get('/projects/dropdown/{id}','Web\ProjectsController@projectDropDownData');
	Route::get('pcontent/{id}','Web\ProjectsContentController@content')->name('pcontent');
	Route::get('/tr/{id}','Web\ProjectsContentController@tr');
	Route::resources([
		'projectcontent'=>'Web\ProjectsContentController',
		'projects'		=>'Web\ProjectsController',
		'navigator'		=>'Navigator\NavigatorController',
		'users'			=>'Web\UsersController',
		'content'		=>'Web\ContentController',
		'tasks'			=>'Web\ProjectTaskController',
		'nestedprojects'=>'Editor\Project\ProjectController',
		'products'		=>'Editor\ProductsController',
		'productlist'	=>'Editor\ProductListsController',
		'questions'		=>'Editor\QuestionsController',
		'files'			=>'Editor\FilesController',
		'formbuilder'	=>'Editor\FormBuilderController'
		]);

	Route::group(['prefix'=>'forms','namespace'=>'Forms'], function(){
		Route::resources([
			'/'			=>'FormsController',
            'dforms'    =>'DFormsController',
			'farmers'	=>'FarmersController',
			'farms'		=>'FarmsController',
			'farmtype'	=>'FarmTypesController',
			'ngos'		=>'NgosController',
			'ngotype'	=>'NgoTypesController',
			'races'		=>'RaceController',
			'sponsors'	=>'SponsorsController',
			'gender'	=>'GenderController',
			'manufactures'=>'ManufacturesController'	
			]);        
		
		Route::get('farmer/farm/{id}','FarmersController@farm')->name('farmer.farm');
		Route::post('farmer/farm/{id}','FarmersController@addFarms');
		Route::post('ngologo','NgosController@uploadLogo')->name('ngo.logo');
		Route::post('farmlogo','FarmsController@uploadLogo')->name('farm.logo');
	});

	Route::group(['prefix'=>'settings'],function(){
		Route::resource('producttypes','Editor\ProductTypesController');
	});
	
	Route::group(['prefix'=>'dforms'],function(){
		Route::resource('clients','Forms\FormsController@clientforms');
	});
});

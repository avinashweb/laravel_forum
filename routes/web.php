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

Route::get('/', [
	'uses'	=> 'PageController@home',
	'as'	=> 'home'
]);

Route::get('/{cat}/{slug}',[
	'uses'	=> 'PageController@singlepage',
	'as'	=> 'singlepage'
]);
Route::group(['middleware' => 'guest'], function(){
	Route::get('/signup',[
		'uses'	=> 'UserController@getSignup',
		'as'	=> 'signup'
	]);
	Route::post('/signup', 'UserController@postSignup');

	Route::get('/signin',[
		'uses'	=> 'UserController@getSignin',
		'as'	=> 'signin'
	]);
	Route::post('/signin', 'UserController@postSignin');
	Route::get('/ajax-login', [
		'uses'	=> 'UserController@getAjaxLogin',
		'as'	=> 'ajax-login'
	]);
	Route::post('/ajax-login', 'UserController@postAjaxLogin');
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('/logout',[
		'uses'	=> 'UserController@getLogout',
		'as'	=> 'logout'
	]);
	Route::get('/ask-question', [
		'uses'	=> 'ForumController@getQuestionPage',
		'as'	=> 'ask_question'
	]);
	Route::post('/ask-question', 'ForumController@postQuestionPage');

	Route::get('/post-answer/{id}',[
		'uses'	=> 'PageController@getAnswer',
		'as'	=> 'post-answer'
	]);
	Route::post('/post-answer/{id}', 'PageController@postAnswer');

	Route::get('/comment/{ques_id}/{ans_id}', [
		'uses'	=> 'ForumController@getComment',
		'as'	=> 'comment'
	]);
	Route::post('/comment/{ques_id}/{ans_id}', 'ForumController@postComment');
	
	Route::post('/upvote', 'VoteController@post_up_vote')->name('up_vote');

	Route::post('/down_vote', 'VoteController@post_down_vote')->name('down_vote');
});

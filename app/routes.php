<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* AUTHENTICATION ROUTES */
Route::get('auth/signin', 'AuthController@signin');
// Route::get('auth/signup', 'AuthController@signup');
// Route::post('auth/signup', 'AuthController@postSignup');
Route::get('auth/forgot-password', 'AuthController@forgot');
Route::post('auth/forgot-password', 'AuthController@passswordRequest');
Route::get('auth/logout', 'AuthController@destroy');
Route::resource('auth', 'AuthController');

Route::group(array('before' => ['auth', 'status']), function() {

    /* DEFAULT ROUTES */
	Route::get('/', 'MainController@index');
	Route::get('test', 'MainController@test');
	//Route::get('home', 'HomeController@index');

	/* EMAIL ROUTES */
	Route::get('emails/sent', 'EmailsController@sent');
	Route::get('emails/drafts', 'EmailsController@drafts');
	Route::get('emails/trash', 'EmailsController@trash');

	/* SUPPORT ROUTES */
	Route::get('support/my-tickets', 'SupportController@myTickets');
	Route::get('support/tickets', 'SupportController@tickets');

	/* DOMAIN ROUTES */
	Route::get('domains/dns', 'DomainsController@dns');

	/* ROUTE RESOURCES */
	Route::resource('projects', 'ProjectsController');
	Route::resource('users', 'UsersController');
	Route::resource('clients', 'ClientsController');
	Route::resource('domains', 'DomainsController');
	Route::resource('notifications', 'NotificationsController');
	Route::resource('themes', 'ThemesController');
	Route::resource('kb', 'KnowledgeBaseController');
	Route::resource('documents', 'DocumentsController');
	Route::resource('leads', 'LeadsController');
	Route::resource('proposal', 'ProposalsController');
	Route::resource('contacts', 'ContactsController');
	Route::resource('support', 'SupportController');
	Route::resource('emails', 'EmailsController');
	
});
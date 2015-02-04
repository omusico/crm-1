<?php

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
	Route::get('domains/transfer', 'DomainsController@transfer');

	/* CONFIGURATION ROUTES  */
	Route::post('configurations/emailUpdate', 'ConfigurationsController@emailUpdate');

	/* USER ROUTES */
	Route::put('users/{user_id}/suspend', 'UsersController@suspend');
	Route::put('users/{user_id}/unsuspend', 'UsersController@unsuspend');
	Route::put('users/{user_id}/deactivate', 'UsersController@deactivate');
	Route::put('users/{user_id}/activate', 'UsersController@activate');

	/* CLIENT ROUTES */
	Route::put('clients/{user_id}/deactivate', 'ClientsController@deactivate');
	Route::put('clients/{user_id}/activate', 'ClientsController@activate');

	/* CONTACT ROUTES */
	Route::post('contacts/{contact_person_id}/primary', 'ContactsController@makePrimary');

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
	Route::resource('invoices', 'InvoicesController');
	Route::resource('items', 'ItemsController');
	Route::resource('configurations', 'ConfigurationsController');
});
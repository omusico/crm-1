<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('auth/signin');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check())
		return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

/*
|--------------------------------------------------------------------------
| Status Filters
|--------------------------------------------------------------------------
|
| The status filter checks to see if the user and/or the client they 
| assigned to have not been suspended or deactivated for any reason.
| Essentially, it only allows active users/clients to sign in.
|
*/

// Route::filter('status', function()
// {
// 	if(!Status::userIsActive()) {
// 			Auth::logout();
// 			return Redirect::action('MainController@index');
// 		}
// });



/*
|--------------------------------------------------------------------------
| Permission Filters
|--------------------------------------------------------------------------
|
| The permission filter checks to see if the user and/or the client have
| senior admin priveleges. Throw's 401 error ('Unauthorized') if not and
| continues with the request otherwise.
|
*/

Route::filter('permission', function()
{	
	//user not logged in
	if(Auth::guest())
		return Redirect::to('auth/signin');

	//user is not an admin
	if(Auth::user()->permission_id < 4)
	{
		if(Request::ajax())
		{
			return htmlentities('Unauthorized - You don\'t have permission to perform that action.');
		}
		else
		{
			return Response::make('Unauthorized', 401);	
		}
	}
});
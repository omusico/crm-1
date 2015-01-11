<?php

class UsersController extends \BaseController {

	protected $user;

	/**
	*
	*/
	public function __construct(User $user)
	{
		$this->user = $user;
		$this->beforeFilter('csrf', ['on' => ['post'] ]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()	
	{
		return View::make('users.index', 
			[
				'title' 		=> 'Users',
				'pageHeader' 	=> 'Users',
				'users'			=> $this->user->getUsers()
			]);		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create', 
			[
				'title' => 'Create New User'
			]);
	}


	/**
	 * Attempt to store new user.
	 *
	 * @return Response
	 */
	public function store()
	{
		// $v = Validator::make($input = Input::all(), $this->user->rules);
		// if($v->fails())
		// 	return Redirect::back()->withInput()->withErrors($v);

		// if($this->user->createNewUser($input))
		// 	return Redirect::action('UsersController@index');
		// else
		// 	return Redirect::back()-withInput();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

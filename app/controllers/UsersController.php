<?php

class UsersController extends \BaseController {

	protected $user;
	protected $notification;
	protected $unsuccessfulAjaxResponse;

	/**
	*
	*/
	public function __construct(User $user, Notification $notification)
	{	
		/* INSTANTIATE FILTERS */
		$this->beforeFilter('csrf', ['on' => ['post'] ]);
		$this->beforeFilter('permission', ['only' => 
							['suspend', 'unsuspend', 'deactivate',
							 'activate', 'destroy'] 
						]);
		
		/* INSTANTIATE OTHER STUFF */
		$this->user = $user;
		$this->notification = $notification;
		$this->unsuccessfulAjaxResponse = ErrorClass::defaultAjaxErrorResponse();
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

	
	/**
	 * Set the default response for an unsuccessful
	 * AJAX request.
	 * 
	 * @param string $response
	 */
	private function setUnsuccessfulAjaxResponse($response)
	{
		$this->unsuccessfulAjaxResponse = $response;
	}


	/**
	 * Get the default response for an unsuccessful
	 * AJAX request.
	 * 
	 * @return string
	 */
	private function getUnsuccessfulAjaxResponse()
	{
		return $this->unsuccessfulAjaxResponse;
	}


	/**
	 * Suspend given user account.
	 * 
	 * @param  int  $id
	 * @return Response
	 */
	public function suspend($user_id)
	{
		if(Request::ajax())
		{	
			if($this->user->suspendUser($user_id))
				$name = $this->user->getUserFullName($user_id);
				$this->notification->newStandardNotification('success', '<b>'. $name . '</b> has had their account suspended');
				return 'success';
			return $this->unsuccessfulAjaxResponse;
		}
	}

	/**
	 * Unsuspend given user account.
	 * 
	 * @param  int  $id
	 * @return Response
	 */
	public function unsuspend($user_id)
	{
		if(Request::ajax())
		{	

			if($this->user->unsuspendUser($user_id))
				$name = $this->user->getUserFullName($user_id);
				$this->notification->newStandardNotification('success', '<b>'. $name . '</b> has had their account unsuspended');
				return 'success';
			return $this->getUnsuccessfulAjaxResponse;
		}
	}

	/**
	 * Deactivate given user account.
	 * 
	 * @param  int  $id
	 * @return Response
	 */
	public function deactivate($user_id)
	{
		if(Request::ajax())
		{	
			if($this->user->deactivateUser($user_id))
				$name = $this->user->getUserFullName($user_id);
				$this->notification->newStandardNotification('success', '<b>'. $name . '</b> has had their account deactivated');
				return 'success';
			return $this->getUnsuccessfulAjaxResponse;
		}
	}

	/**
	 * Activate given user account.
	 * 
	 * @param  int  $id
	 * @return Response
	 */
	public function activate($user_id)
	{
		if(Request::ajax())
		{	
			if($this->user->activateUser($user_id))
				$name = $this->user->getUserFullName($user_id);
				$this->notification->newStandardNotification('success', '<b>'. $name . '</b> has had their account activated');
				return 'success';
			return $this->getUnsuccessfulAjaxResponse;
		}
	}

}

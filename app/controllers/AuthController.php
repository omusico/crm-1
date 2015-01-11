<?php

class AuthController extends \BaseController {

	protected $rules;
	protected $user;
	protected $client;
	protected $status;

	/**
     * Instantiate a new AuthController instance.
     */
	public function __construct(Rules $rules, User $user, Client $client, Status $status) 
	{
		$this->rules = $rules;
		$this->user = $user;
		$this->client = $client;
		$this->status = $status;
		$this->beforeFilter('csrf', ['on' => ['post'] ]);
		$this->beforeFilter('guest', ['except' => ['destroy'] ]);
	}

	/**
	 * Display sign in form.
	 *
	 * @return Response
	 */
	public function signin()
	{
		return View::make('auth/signin', ['title' => 'Sign in']);
	}

	/**
	 * Display sign up form.
	 *
	 * @return Response
	 */
	public function signup()
	{
		return View::make('auth/signup', ['title' => 'Sign un']);
	}

	/**
	 * Attempt to register a new user.
	 *
	 * @return Response
	 */
	public function postSignup()
	{
		$v = Validator::make($input = Input::all(), $this->rules->signupRules);
		if($v->fails())
			return Redirect::back()->withInput()->withErrors($v);

		if($this->user->createNewUser($input)) {
			return Redirect::action('UsersController@index');
		}		
		else {
			return Redirect::back()-withInput();
		}
	}

	/**
	 * Display sign up form.
	 *
	 * @return Response
	 */
	public function forgot()
	{
		return View::make('auth/forgot', ['title' => 'Forgot Your Password?']);
	}

	public function passswordRequest()
	{
		return 'todo:';
	}

	/**
	 * Attempt to sign the user in.
	 *
	 * @return Response
	 */
	public function store()
	{	
		// RUN 'status' FILTER AFTER EXECUTION OF SIGN IN REQUEST

		$v = Validator::make(Input::all(), $this->rules->signinRules);
		if($v->fails())
			return Redirect::back()->withInput()->withErrors($v);

		$remember = (Input::get('remember') === null)? false :  true;

		if(Auth::attempt(array('email' => Input::get('email'),'password'=> Input::get('password')), $remember))

			//dd($this->status->userIsActive());
			// check if account is active
			if(!$this->status->userIsActive() || !$this->status->clientIsActive()) {
				Auth::logout();
				Session::flash('error', $this->status->getStatusMessage());
				return Redirect::back()->withInput();
			}

			//dd('user status: ' . $this->status->getUserStatus() . ' Client Status: ' . $this->status->getClientStatus());

			return Redirect::action('MainController@index');

		Session::flash('error', 'Invalid email address or password.');
		return Redirect::back()->withInput();
	}

	/**
	 * Log the user out.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::action('AuthController@signin');
	}


}

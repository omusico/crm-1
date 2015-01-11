<?php

class Status extends Eloquent {

	protected $user;
	protected $client;
	public $message;

	public function __construct(User $user, Client $client)
	{
		$this->user = $user;
		$this->client = $client;
		$this->message = 'Your account has been suspended. Please conctact support to find out more.';
	}

	public function userIsActive() {
		if($test = $this->getUserStatus() === 1)
			return true;
		return false;
	}

	public function clientIsActive() {
		if($this->getClientStatus() === 1)
			return true;
		return false;
	}

	public function getUserStatus()
	{
		return DB::table('users')->where('id', Auth::id())->pluck('user_status');
	}

	public function setUserStatus($status_id) 
	{
		// void
	}

	public function getClientStatus()
	{
		$client_id = $this->user->getUserClientId(Auth::id());
		return DB::table('clients')->where('id', $client_id)->pluck('client_status');	
	}

	public function setClientStatus($status_id)
	{
		// void
	}

	public function getStatusMessage() 
	{
		return $this->message;
	}

	public function setStatusMessage($message)
	{
		$this->message = $message;
	}
}
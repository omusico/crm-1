<?php

class Client extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clients';

	public $rules = [
		'' 			=> 'required',
		'last_name' 			=> 'required',
		'primary_phone' 		=> 'min: 10',
		'secondary_phone' 		=> 'min:10',
		'email' 				=> 'required|email|unique:users',
		'password' 				=> 'required|min:6',
		'password_confirm' 		=> 'same:password',
		'client_id' 			=> 'required|exists:clients,id',
		'permission_id' 		=> 'required|exists:permissions,id',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	/**
	 * The attributes that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = array();

	public function createNewClient($input)
	{

	}


	/**
	* Returns all clients.
	*
	* @param  string  $numItemsPerPage
	* @return object
	*/
	public function getClients($numItemsPerPage = 15)
	{
		$clients = DB::table($this->table)
	            ->orderBy('clients.created_at', 'asc')
	            ->paginate($numItemsPerPage);

		return $clients;
	}


	/**
	* Returns the specified client's business name
	*
	* @param int $client_id
	* @return string
	*/
	public function getClientBusinessName($client_id)
	{
		$client = $this->find($client_id);
		return $client->business_name;
	}


	/**
	* Returns all users for the given client.
	*
	* @param  string  $client_id
	* @return array
	*/
	public function getClientUsers($client_id)
	{
		return $clients = DB::table('users')->where('client_id', '=', $client_id)->get();
	}


	/**
	* Returns a specidied client's status.
	*
	* @param  int  $client_id
	* @return string
	*/
	public static function getClientStatus($client_status_id)
	{
		return DB::table('client_status')->where('id', '=', $client_status_id)->pluck('status');
	}


	/**
	* Returns the client's status id
	* 
	* @param int $client_id
	* @return int
	*/
	public function getClientStatusId($client_id)
	{
		return DB::table($this->table)->where('id', '=', $client_id)->pluck('client_status');
	}


	/**
	 * Suspend a client's account.
	 *
	 * @param  int  $client_id
	 * @return bool 
	 */
	public function suspendClient($client_id)
	{
		if($this->getClientStatusId($client_id) === 1)
		{
			$this->where('id', '=', $client_id)->update(['client_status' => 2]);
			return true;
		}

		return false;
	}


	/**
	 * Unsuspend a client's account.
	 *
	 * @param  int  $client_id
	 * @return bool 
	 */
	public function unsuspendClient($client_id)
	{
		if($this->getClientStatusId($client_id) === 2)
		{
			$this->where('id', '=', $client_id)->update(['client_status' => 1]);
			return true;
		}

		return false;
	}


	/**
	 * Deactivate a client's account.
	 *
	 * @param  int  $client_id
	 * @return bool 
	 */
	public function deactivateClient($client_id)
	{
		if($this->getClientStatusId($client_id) === 2 || $this->getClientStatusId($client_id) === 1)
		{
			$this->where('id', '=', $client_id)->update(['client_status' => 3]);
			return true;
		}

		return false;
	}


	/**
	 * Activate a client's account.
	 *
	 * @param  int  $client_id
	 * @return bool 
	 */
	public function activateClient($client_id)
	{
		if($this->getClientStatusId($client_id) === 3)
		{
			$this->where('id', '=', $client_id)->update(['client_status' => 1]);
			return true;
		}

		return false;
	}
}
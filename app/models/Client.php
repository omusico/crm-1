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
	protected $hidden = array('password', 'remember_token');

	/**
	 * The attributes that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = array('first_name', 'last_name', 'primary_phone', 'secondary_phone', 'email', 'password', 'client_id', 'permission_id');

	public function createNewUser($input)
	{

	}

	public function getClients($numItemsPerPage = 15)
	{
		$clients = DB::table($this->table)
	            ->orderBy('clients.created_at', 'asc')
	            ->paginate($numItemsPerPage);

		return $clients;
	}
}
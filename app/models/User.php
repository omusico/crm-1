<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public $rules = [
		'first_name' 			=> 'required',
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

	public function getUsers($numItemsPerPage = 15)
	{
		$users = DB::table($this->table)
	            ->orderBy('users.created_at', 'desc')
	            ->paginate($numItemsPerPage);

		return $users;
	}

	public function getUserClientId($user_id)
	{
		return DB::table('users')->where('id', $user_id)->pluck('client_id');
	}


}

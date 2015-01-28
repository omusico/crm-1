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

	
	/**
	* Returns the specified user's first name
	*
	* @param int $user_id
	* @return string
	*/
	public function getUserFirstName($user_id)
	{
		$user = $this->find($user_id);
		return $user->first_name;
	}


	/**
	* Returns the specified user's last name
	*
	* @param int $user_id
	* @return string
	*/
	public function getUserLastName($user_id)
	{
		$user = $this->find($user_id);
		return $user->last_name;
	}


	/**
	* Returns the specified user's full name
	*
	* @param int $user_id
	* @return string
	*/
	public function getUserFullName($user_id)
	{
		return $this->getUserFirstName($user_id) . ' ' . $this->getUserLastName($user_id);
	}

	/**
	* Returns the user's status id
	* 
	* @param int $user_id
	* @return int
	*/
	public function getUserStatusId($user_id)
	{
		return DB::table($this->table)->where('id', '=', $user_id)->pluck('user_status');
	}

	/**
	 * Return a single user's status
	 *
	 * @param  int  $status_id
	 * @return string 
	 */
	public static function getUserStatus($status_id)
	{
		return DB::table('user_status')->where('id', '=', $status_id)->pluck('status');
	}

	
	/**
	 * Suspend a users account.
	 *
	 * @param  int  $user_id
	 * @return bool 
	 */
	public function suspendUser($user_id)
	{
		if($this->getUserStatusId($user_id) === 1)
		{
			$this->where('id', '=', $user_id)->update(['user_status' => 2]);
			return true;
		}

		return false;
	}


	/**
	 * Unsuspend a users account.
	 *
	 * @param  int  $user_id
	 * @return bool 
	 */
	public function unsuspendUser($user_id)
	{
		if($this->getUserStatusId($user_id) === 2)
		{
			$this->where('id', '=', $user_id)->update(['user_status' => 1]);
			return true;
		}

		return false;
	}


	/**
	 * Deactivate a users account.
	 *
	 * @param  int  $user_id
	 * @return bool 
	 */
	public function deactivateUser($user_id)
	{
		if($this->getUserStatusId($user_id) === 2 || $this->getUserStatusId($user_id) === 1)
		{
			$this->where('id', '=', $user_id)->update(['user_status' => 3]);
			return true;
		}

		return false;
	}

	/**
	 * Activate a users account.
	 *
	 * @param  int  $user_id
	 * @return bool 
	 */
	public function activateUser($user_id)
	{
		if($this->getUserStatusId($user_id) === 3)
		{
			$this->where('id', '=', $user_id)->update(['user_status' => 1]);
			return true;
		}

		return false;
	}

	
	/**
	 * Activate a users account.
	 *
	 * @param  int  $user_id
	 * @return bool 
	 */
	public function getUserEmailAddress($user_id)
	{
		$user = $this->find(intval($user_id));
		return $user->email;
	}	

}

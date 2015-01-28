<?php

class Domain extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'domains';

	public $rules = [
		//
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

	public function createNewUser($input)
	{

	}

	public function getDomains($numItemsPerPage = 15)
	{
		$domains = DB::table($this->table)
	            ->orderBy('domains.expiry_date', 'asc')
	            ->paginate($numItemsPerPage);

		return $domains;
	}

	public function getClientDomains($client_id) 
	{
		return DB::table($this->table)->where('owned_by', '=', $client_id)->paginate(10);
	}
}
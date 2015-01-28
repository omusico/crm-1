<?php

class Invoice extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'invoices';

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

	public function getClientInvoices($client_id)
	{
		return DB::table($this->table)->where('client_id', '=', $client_id)->paginate(10);
	}
}
<?php

class Configuration extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'configurations';

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

	/**
	 * 
	 * 
	 */
	public static function getConfigVariable($variable)
	{
		return DB::table('configurations')->where('variable', '=', $variable)->pluck('value');
	}

	/**
	 * 
	 * 
	 */
	public static function getConfigDescription($variable)
	{
		return DB::table('configurations')->where('variable', '=', $variable)->pluck('description');
	}
}
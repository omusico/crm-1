<?php

class Industry extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'industry';

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

}
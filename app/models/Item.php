<?php

class Item extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'items';

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


	public function sanitizeNewItem($input)
	{
		$string = App::make('StringClass');

		$item = [
			'name' => $string->sanitizeString($input['name']),
			'description' => $string->sanitizeString($input['description']),
			'rate' => floatval($input['price'])
		];

		return $item;
	}

	
}
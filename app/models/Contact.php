<?php

class Contact extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contacts';

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

	public function santizeInput($input)
	{
		$string = App::make('StringClass');

		//build POST payload
		$contact = [
			'contact_id'	=> $string->sanitizeString($input['contact_id']),
			'first_name' 	=> $string->sanitizeString($input['first_name']),
			'last_name'	 	=> $string->sanitizeString($input['last_name']),
			'email' 		=> $string->sanitizeString($input['email']),
			'phone' 		=> $string->sanitizeString($input['phone']),
			'mobile' 		=> $string->sanitizeString($input['mobile']),
		];
		
		return $contact;
	}
}
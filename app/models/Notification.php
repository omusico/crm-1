<?php

class Notification extends Eloquent {

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
	 * Create new standard notification.
	 * 
	 * @param  string  $type
	 * @param  string  $message
	 * @param  int  $length (Optional)
	 */
	public function newStandardNotification($type, $message, $length = 5000)
	{
		Session::flash('notificationType', "'" . $type . "'");
		Session::flash('notificationMessage', "'" . $message . "'");
		Session::flash('notificationLength', $length);
	}
}
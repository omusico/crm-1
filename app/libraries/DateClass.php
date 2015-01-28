<?php

class DateClass {
	
	/**
	* Returns a new date.
	*
	* @return Date object
	*/
	public static function newDate() {
		return date('Y-m-d H:i:s');
	}

	/**
	* Returns formatted date.
	* 
	* @param DateOject $date
	* @param string $format
	* @return string
	*/
	public static function formatDate($date, $format) {
		return date_format(date_create($date), $format);
	}

	/**
	 * Return unix timestamp.
	 * 
	 * @param $string
	 * @return int
	 */
	public static function dateToUnixTimestamp($string)
	{
		return strtotime($string);		
	}
}
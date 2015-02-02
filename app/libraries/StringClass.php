<?php

/**
 * Various static methods for sanitizing and
 * manipulating strings.
 */
class StringClass {


	/**
	* Converts and returns $string in pretty URL
	* format (eg. "this-is-my-pretty-url")
	* @param  string  $string
	* @return string
	*/
	public static function slugify($string) {
		return
			strtolower(
				preg_replace(
					array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),		// 3rd iteration
				 	array('', '-', ''),										// 2nd iteration
				 	trim($string)											// 1st iteration
			 	)
			);
	}


	/**
	* Returns $string as NULL if $string is empty. Otherwise 
	* returns html encoded $string, tags stripped unless
	* specified in $allowableTags.
	* @param  string  $string
	* @param  string  $allowableTags (optional)
	* @return string 
	*/
	public static function nullifyAndStripTags($string, $allowableTags = null) {
		if($string === '' || $string === null)
			return null;
		return htmlentities(strip_tags(trim($string), $allowableTags));
	}

	
	/**
	* Return HTML encoded $string.
	* @param string $string
	* @return string
	*/
	public static function htmlEncode($string) {
		return htmlentities(trim($string));
	}

	/**
	 * Santizes string.
	 *
	 * @param string $str
	 * @param bool stripTags
	 * @param string $tagsToLeave
	 * @param bool $addSlashes
	 * @return string
	 */
	public function sanitizeString($str, $stripTags = true, $tagsToLeave = '', $addSlashes = false)
	{	
		$str = str_replace('&', 'and', trim($str));

		if($stripTags)
			$str = strip_tags($str, $tagsToLeave);

		if($addSlashes) {
			if(strpos(str_replace("\'",""," $str"),"'") != false)
			    $str = addslashes($str);
		}
		
		return $str;
	}	
}
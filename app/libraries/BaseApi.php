<?php

class BaseApi {

	/**
	 * Sumbit GET Request
	 *
	 * @param string $url
	 * @return array
	 */
	public function sendGetRequest($url)
	{
		$json = file_get_contents($url, false, null);
		return json_decode($json, true);
	}


	/**
	 * Sumbit POST Request
	 * 
	 * @param srting $url
	 * @param string $data
	 * @return array
	 */
	public function sendPostRequest($url, $data)
	{		 
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt( $ch, CURLOPT_POST, count($data));
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, false);
		curl_setopt( $ch, CURLOPT_TIMEOUT, 30);

		$response = curl_exec( $ch );
		curl_close ($ch);

		return json_decode($response, true);
	}

	/**
	 * Sumbit PUT Request
	 * 
	 * @param srting $url
	 * @return array
	 */
	public function sendPutRequest($url, $data)
	{
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, false);
		curl_setopt( $ch, CURLOPT_TIMEOUT, 30);

		$response = curl_exec( $ch );
		curl_close ($ch);

		return json_decode($response, true);	
	}	


	/**
	 * Sumbit DELETE Request
	 * 
	 * @param srting $url
	 * @return array
	 */
	public function sendDeleteRequest($url)
	{
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, false);
		curl_setopt( $ch, CURLOPT_TIMEOUT, 30);

		$response = curl_exec( $ch );
		curl_close ($ch);

		return json_decode($response, true);
	}

	

}
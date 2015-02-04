<?php

class BaseApi {

	/**
	 * Sumbit GET Request
	 *
	 * @param string $url
	 * @return array
	 */
	protected function sendGetRequest($url)
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
	protected function sendPostRequest($url, $data)
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
	protected function sendPutRequest($url, $data)
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
	protected function sendDeleteRequest($url)
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


	/**
	 * Build query string
	 * 
	 * @param array $params
	 * @return string
	 */
	protected function buildQueryParams($params)
	{
		return http_build_query($params);
	}


	/**
	 * Convert array data to JSON
	 * 
	 * @param array $attributes
	 * @return JSON
	 */
	protected function jsonEncode($attributes)
	{
		return json_encode($attributes);
	}	
}
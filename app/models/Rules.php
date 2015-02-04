<?php

class Rules {

	public $signinRules = [
		'email' 	=> 'required|email',
		'password' 	=> 'required'
	];

	public $signupRules = [
		'email' 	=> 'required|email',
		'password' 	=> 'required|min:6',
		'password_confirm' => 'same:password'
	];

	public $newClientRules = [
		'name'						=> 'required',
		'industry'					=> 'required',
		'phone'						=> 'required|min:6',
		'email'						=> 'required|email',
		'webiste'					=> 'url',
		'abn'						=> 'min:6',
		'address'					=> '',
		'city'						=> '',
		'state'						=> '',
		'zip'						=> 'numeric|min:4',
		'counrty'					=> '',
		'contact_first_name'		=> 'required',
		'contact_last_name'			=> 'required',
		'contact_email'				=> 'required|email',
		'contact_primary_phone' 	=> 'required|min:6',
		'contact_secondary_phone'	=> 'min:6',
		'password'					=> 'required|min:6',
		'password_confirm'			=> 'same:password',
		'notes'						=> '',
	];

	public $updateClientRules = [
		'name'						=> 'required',
		'industry'					=> 'required',
		'phone'						=> 'required|min:6',
		'email'						=> 'required|email',
		'webiste'					=> 'url',
		'abn'						=> 'min:6',
		'address'					=> '',
		'city'						=> '',
		'state'						=> '',
		'zip'						=> 'numeric|min:4',
		'counrty'					=> '',
		'notes'						=> '',
	];

	public $newContactPersonRules = [
		'contact_id'			=> 'required',
		'first_name'			=> 'required',
		'last_name'				=> 'required',
		'email'					=> 'required|email',
		'phone'					=> 'min:6',
		'mobile'				=> 'min:6',
		'password'				=> 'required|min:6',
		'password_confirm'		=> 'same:password',
	];

	public $updateContactPersonRules = [
		'contact_id'			=> 'required',
		'first_name'			=> 'required',
		'last_name'				=> 'required',
		'email'					=> 'required|email',
		'phone'					=> 'min:6',
		'mobile'				=> 'min:6',
	];

	public $newItemRules = [
		'name' 			=> 'required',
		'description' 	=> 'required',
		'price' 			=> 'required|regex:/^\d*\.?\d*$/'
	];

}
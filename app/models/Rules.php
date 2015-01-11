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

}
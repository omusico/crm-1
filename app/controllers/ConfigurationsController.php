<?php

class ConfigurationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		//dd(Configuration::get());

		return View::make('configs.index', 
			[
				'title' => 'Global Configurations',
				'pageHeader' => 'Global Configurations',
				'defaultEmailName' => Configuration::getConfigVariable('default_email_name'),
				'defaultEmailNameDesc' => Configuration::getConfigDescription('default_email_name'),
				'defaultEmailAddress' => Configuration::getConfigVariable('default_email_address'),
				'defaultEmailAddressDesc' => Configuration::getConfigDescription('default_email_address')
			]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Update the specified default email configurations.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function emailUpdate($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

<?php

class ClientsController extends \BaseController {

	protected $client;
	protected $domain;

	public function __construct(Client $client, Domain $domain) 
	{
		$this->client = $client;
		$this->domain = $domain;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('clients.index', 
			[
				'title' 		=> 'Clients',
				'pageHeader' 	=> 'Clients',
				'clients'		=>  $this->client->getClients()
			]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clients.create', 
			[
				'title' 		=> 'Create New Client',
				'pageHeader' 	=> 'Create New Client',
			]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('clients.show',
			[
				'title' => 'Show',
				'pageHeader' => 'Show',
				'clientDomains' => $this->domain->getClientDomains($id)
			]);
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

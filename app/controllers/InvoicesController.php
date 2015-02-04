<?php

class InvoicesController extends \BaseController {

	protected $client;
	protected $zohoApi;

	public function __construct(Client $client, ZohoInvoicesApi $zohoApi)
	{
		$this->client = $client;
		$this->zoho = $zohoApi;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('invoices.create',
			[
				'title' => 'New Invoice',
				'pageHeader' => 'Create New Invoice',
				'clients' => $this->returnModelList($this->client, 'business_name', 'id', 'business_name'),
				'c' => (Input::has('c'))? intval(Input::get('c')) : null
			]);
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
		return View::make('invoices.show');
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

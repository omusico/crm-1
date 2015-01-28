<?php

class ClientsController extends \BaseController {

	protected $client;
	protected $domain;
	protected $industry;
	protected $invoice;
	protected $project;
	protected $notification;
	protected $unsuccessfulAjaxResponse;

	public function __construct(Client $client, Domain $domain, Industry $industry,
								Invoice $invoice, Project $project, Notification $notification)
	{
		/* INSTANTIATE FILTERS */
		$this->beforeFilter('csrf', ['on' => ['post'] ]);
		$this->beforeFilter('permission', ['only' => 
							['suspend', 'unsuspend', 'deactivate',
							 'activate', 'destroy'] 
						]);

		$this->client = $client;
		$this->domain = $domain;
		$this->industry = $industry;
		$this->invoice = $invoice;
		$this->project = $project;
		$this->notification = $notification;
		$this->unsuccessfulAjaxResponse = ErrorClass::defaultAjaxErrorResponse();
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
				'industries'	=> $this->returnModelList($this->industry, 'industry', 'id', 'id')
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
		$client = $this->client->findOrFail($id);

		return View::make('clients.show',
			[
				'title' => 'Client - ' . $client->business_name,
				'pageHeader' => 'Client - ' . $client->business_name,
				'client' => $client,
				'clientUsers' => $this->client->getClientUsers($id),
				'clientProjects' => $this->project->getClientProjects($id),
				'clientDomains' => $this->domain->getClientDomains($id),
				'clientInvoices' => $this->invoice->getClientInvoices($id),
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


	/**
	 * Suspend given client account.
	 * 
	 * @param  int  $client_id
	 * @return Response
	 */
	public function suspend($client_id)
	{
		if(Request::ajax())
		{	
			if($this->client->suspendClient($client_id))				
				$name = $this->client->getClientBusinessName($client_id);
				$this->notification->newStandardNotification('success', '<b>'. $name . '</b> has had their account suspended');
				return 'success';
			return $this->unsuccessfulAjaxResponse;
		}
	}


	/**
	 * Unsuspend given client account.
	 * 
	 * @param  int  $client_id
	 * @return Response
	 */
	public function unsuspend($client_id)
	{
		if(Request::ajax())
		{	

			if($this->client->unsuspendClient($client_id))
				$name = $this->client->getClientBusinessName($client_id);
				$this->notification->newStandardNotification('success', '<b>'. $name . '</b> has had their account unsuspended');
				return 'success';
			return $this->getUnsuccessfulAjaxResponse;
		}
	}

	/**
	 * Deactivate given client account.
	 * 
	 * @param  int  $client_id
	 * @return Response
	 */
	public function deactivate($client_id)
	{
		if(Request::ajax())
		{	
			if($this->client->deactivateClient($client_id))
				$name = $this->client->getClientBusinessName($client_id);
				$this->notification->newStandardNotification('success', '<b>'. $name . '</b> has had their account deactivated');
				return 'success';
			return $this->getUnsuccessfulAjaxResponse;
		}
	}

	/**
	 * Activate given client account.
	 * 
	 * @param  int  $client_id
	 * @return Response
	 */
	public function activate($client_id)
	{
		if(Request::ajax())
		{	
			if($this->client->activateClient($client_id))
				$name = $this->client->getClientBusinessName($client_id);
				$this->notification->newStandardNotification('success', '<b>'. $name . '</b> has had their account activated');
				return 'success';
			return $this->getUnsuccessfulAjaxResponse;
		}
	}
}

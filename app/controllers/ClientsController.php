<?php

class ClientsController extends \BaseController {

	protected $client;
	protected $domain;
	protected $industry;
	protected $rules;
	protected $invoice;
	protected $project;
	protected $notification;
	protected $zohoApi;
	protected $htmlBuilder;

	public function __construct(Client $client, Domain $domain, Industry $industry, Rules $rules,
								Invoice $invoice, Project $project, Notification $notification,
								ZohoInvoicesApi $zohoApi, HtmlBuilder $htmlBuilder)
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
		$this->rules = $rules;
		$this->invoice = $invoice;
		$this->project = $project;
		$this->notification = $notification;
		$this->zohoApi = $zohoApi;
		$this->htmlBuilder = $htmlBuilder;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Request::ajax())
 		{
 			$response = $this->zohoApi->getAllContacts();
 			if($response['message'] === 'success')
 			{
 				return $this->htmlBuilder->buildClientListingTableRows($response['contacts']);
 			}
 			else
 			{
 				return $response['message'];
 			}
 		}

		return View::make('clients.index', 
			[
				'title' 		=> 'Clients',
				'pageHeader' 	=> 'Clients',
				//'clients'		=>  '' //$this->zohoApi->getAllContacts() //$this->client->getClients()
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
				'industries'	=> $this->returnModelList($this->industry, 'industry', 'industry', 'id')
			]);
	}


	/**
	 * Store a newly created clients.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate input
		$v = Validator::make($input = Input::all(), $this->rules->newClientRules);
		if($v->fails())
			return Redirect::back()->withInput()->withErrors($v);


		$response = $this->zohoApi->createContact($this->client->santizeInput($input));

		if($response['message'] === 'The contact has been added.')
		{
			$this->notification->newStandardNotification('success', '<b>'. $response['contact']['contact_name'] . '</b> has been added a client.');
			return Redirect::action('ClientsController@index');
		}
		else
		{
			$error = str_replace('customer', 'client', $response['message']);
			return Redirect::back()->withInput()->with('error', $error);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		$response = $this->zohoApi->getContact($id);

		if($response['message'] === 'success')
		{
			$client = $response['contact'];

			return View::make('clients.show',
			[
				'title' => 'Client - ' . $client['contact_name'],
				'pageHeader' => 'Client - ' . $client['contact_name'],
				'client' => $client
			]);	
		}
		else
		{
			return 'Error: ' . $response['message'];
		}
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
	 * Deactivate given client account.
	 * 
	 * @param  string  $client_id
	 * @return Response
	 */
	public function deactivate($client_id)
	{
		if(Request::ajax())
		{
			$response = $this->zohoApi->markContactAsInactive($client_id);

			if($response['message'] === 'The contact has been marked as inactive.')
			{
				$this->notification->newStandardNotification('success', $response['message']);
				return 'success';
			}
			else
			{
				return $response['message'];
			}
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
			$response = $this->zohoApi->markContactAsActive($client_id);

			if($response['message'] === 'The contact has been marked as active.')
			{
				$this->notification->newStandardNotification('success', $response['message']);
				return 'success';
			}
			else
			{
				return $response['message'];
			}
		}	
	}


}

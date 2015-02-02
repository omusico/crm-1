<?php

class ContactsController extends \BaseController {

	protected $contact;
	protected $zohoApi;
	protected $rules;
	protected $notification;
	protected $htmlBuilder;

	public function __construct(Contact $contact, ZohoInvoicesApi $zohoApi, Rules $rules, 
								Notification $notification, HtmlBuilder $htmlBuilder)
	{
		$this->contact = $contact;
		$this->zohoApi = $zohoApi;
		$this->rules = $rules;
		$this->notification = $notification;
		$this->htmlBuilder = $htmlBuilder;
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
		//
	}


	/**
	 * Store a newly created contact.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax())
		{
			// validate input
			$v = Validator::make($input = Input::all(), $this->rules->newContactPersonRules);
			if($v->fails()) {
				$html = $this->htmlBuilder->buildValidatorErrorResponseHtml($v->messages());
				return $html;
			}

			$response = $this->zohoApi->createNewContactPerson($this->contact->santizeInput($input));

			if($response['message'] === "Contact person's information has been saved.")
			{
				$this->notification->newStandardNotification('success', '<b>'. $response['contact_person']['first_name']. ' ' . $response['contact_person']['last_name'] . '</b> has been added a contact.');
				return 'success';
			}
			else
			{
				//$error = str_replace('customer', 'client', $response['message']);
				return $response['message']; //$this->htmlBuilder->buildValidatorErrorResponseHtml($response['message']); // Redirect::back()->withInput()->with('error', $error);
			}
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
		//
	}


	/**
	 * Show the form for editing the specified contact.
	 *
	 * @param  string  $contact_person_id
	 * @return Response
	 */
	public function edit($contact_person_id)
	{
		if(Request::ajax())
		{	
			$response = $this->zohoApi->getContactPerson(Request::get('client_id'), $contact_person_id);

			if($response['message'] === 'success')
			{
				return $response['contact_person'];
			}
			else
			{
				return $this->htmlBuilder->buildValidatorErrorResponseHtml($response['message']);
			}
		}
	}


	/**
	 * Update the specified contact person.
	 *
	 * @return Response
	 */
	public function update()
	{
		if(Request::ajax())
		{
			// validate input
			$v = Validator::make($input = Input::all(), $this->rules->updateContactPersonRules);
			if($v->fails()) {
				$html = $this->htmlBuilder->buildValidatorErrorResponseHtml($v->messages());
				return $html;
			}

			$response = $this->zohoApi->updateContactPerson(Input::except('password_confirm', 'password'));

			if($response['message'] === "Contact person's information has been saved.")
			{
				$this->notification->newStandardNotification('success', '<b>'. $response['contact_person']['first_name']. ' ' . $response['contact_person']['last_name'] . '</b> has had their contact information updated.');
				return 'success';
			}
			else
			{
				return $this->htmlBuilder->buildValidatorErrorResponseHtml($response['message']);
			}
		}
	}



	/**
	 * Remove the specified contact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($contact_person_id)
	{
		$response = $this->zohoApi->deleteContactPerson($contact_person_id);

		if($response['message'] === "The contact person has been deleted.")
		{
			$this->notification->newStandardNotification('success', 'Contact deleted.');		
			return 'success';
		}
		else
		{
			return $this->htmlBuilder->buildValidatorErrorResponseHtml($response['message']);
		}
	}


	/**
	 * Make contact person primary contact.
	 *
	 * @param  string  $id
	 * @return Response
	 */
	public function makePrimary($contact_person_id)
	{
		$response = $this->zohoApi->makeContactPersonPrimary($contact_person_id);

		if($response['message'] === "This contact person has been marked as your primary contact person.")
		{
			$this->notification->newStandardNotification('success', 'Contact updated.');
			return 'success';
		}
		else
		{
			return $this->htmlBuilder->buildValidatorErrorResponseHtml($response['message']);
		}
	}


}

<?php

class ZohoInvoicesApi extends BaseApi {

	private $authToken = '9dd7e25dfb7a7d91e96e5e8b8cdff078';
	private $organizationId = '47654162';

	public function __construct()
	{
		// Define Base URL for API call
		define("BASE_URL", "https://invoice.zoho.com/api/v3");

		// Define Query Params
		define("ORGANIZATION_ID", "ORGANIZATION_ID");
		define("AUTHTOKEN", "AUTHTOKEN");
		define("JSONSTRING", "JSONString");
		define("SCOPE", "SCOPE");
		
		// Define Assets
		define("ORGANIZATIONS", 'organizations');
		define("CONTACTS", "contacts");
		define('CONTACTPERSONS', 'contactpersons');
		
		define("INVOICES", "invoices");
		define("ITEMS", "items");
	}

	/**********************************/
	/***		  Contacts			***/
	/**********************************/

	/**
	 * List contacts
	 * 
	 * @param array $params
	 * @return array
	 */
	public function getAllContacts($params = [])
	{
		$url = 	BASE_URL.'/'.CONTACTS.'?'.
				AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId.'&'.
				http_build_query($params);

		return $this->sendGetRequest($url);
	}


	/**
	 * Get contact
	 *
	 * @param string $contact_id
	 * @param array $params
	 * @return array
	 */
	public function getContact($contact_id, $params = [])
	{
		if(!is_array($params))
			return 'Supplied arguement needs to be an array. '.ucfirst(gettype($params)).' given.';

		$url = 	BASE_URL.'/'.CONTACTS.'/'.intval($contact_id).'?'.
				AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId.'&'.
				http_build_query($params);

		return $this->sendGetRequest($url);
	}


	/**
	 * Create a contact
	 *
	 * @param array $attributes
	 * @return array
	 */
	public function createContact($attributes)
	{
		if(!is_array($attributes))
			return 'Supplied arguement needs to be an array. '.ucfirst(gettype($attributes)).' given.';

		$url = BASE_URL.'/'.CONTACTS;

		$data = AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId.'&'.
				JSONSTRING.'='.json_encode($attributes);
		
		return $this->sendPostRequest($url, $data);
	}

	
	/**
	 * Update a contact
	 *
	 * @param array $attributes
	 * @return array
	 */
	public function updateContact($contact_id, $attributes)
	{
		if(!is_array($attributes))
			return 'Second arguement needs to be an array. '.ucfirst(gettype($attributes)).' given.';

		$url = BASE_URL.'/'.CONTACTS.'/'.intval($contact_id);

		$data = AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId.'&'.
				JSONSTRING.'='.json_encode($attributes);
		
		return $this->sendPutRequest($url, $data);
	}


	/**
	 * Delete contact
	 *
	 * @param array $attributes
	 * @return array
	 */
	public function deleteContact($contact_id)
	{
		$url = 	BASE_URL.'/'.CONTACTS.'/'.intval($contact_id).'?'.
				AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId;

		return $this->sendDeleteRequest($url);
	}


	/**
	 * Mark contact as Active
	 *
	 * @param string $contact_id
	 * @return array
	 */
	public function markContactAsActive($contact_id)
	{
		// POST  /contacts/:contact_id/active
		$url = 	BASE_URL.'/'.CONTACTS.'/'.intval($contact_id).'/active';

		$data = AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId;

		return $this->sendPostRequest($url, $data);
	}


	/**
	 * Mark contact as Inactive
	 *
	 * @param string $contact_id
	 * @return array
	 */
	public function markContactAsInactive($contact_id)
	{
		$url = 	BASE_URL.'/'.CONTACTS.'/'.intval($contact_id).'/inactive';

		$data = AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId;

		return $this->sendPostRequest($url, $data);
	}


	/**********************************/
	/***      Contact Persons		***/
	/**********************************/

	/**
	 * Get contact person
	 *
	 * @param string $contact_person_id
	 * @return array
	 */
	public function getContactPerson($contact_id, $contact_person_id)
	{
	
		$url = 	BASE_URL.'/'.CONTACTS.'/'.intval($contact_id).'/'.CONTACTPERSONS.'/'.intval($contact_person_id).'?'.
				AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId;

		return $this->sendGetRequest($url);
	}


	/**
	 * Create a new contact person for pri
	 *
	 * @param string $contact_id
	 * @return array
	 */
	public function createNewContactPerson($attributes)
	{
		if(!is_array($attributes))
			return 'Supplied arguement needs to be an array. '.ucfirst(gettype($attributes)).' given.';

		$url = BASE_URL.'/'.CONTACTS.'/'.CONTACTPERSONS;

		$data = AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId.'&'.
				JSONSTRING.'='.json_encode($attributes);
		
		return $this->sendPostRequest($url, $data);
	}


	/**
	 * Create a new contact person for pri
	 *
	 * @param string $contact_person_id
	 * @return arrary
	 */
	public function makeContactPersonPrimary($contact_person_id)
	{
		
		$url = BASE_URL.'/'.CONTACTS.'/'.CONTACTPERSONS.'/'.$contact_person_id.'/primary';

		$data = AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId;
		
		return $this->sendPostRequest($url, $data);
	}


	/**
	 * Update a contact person
	 *
	 * @param array $attributes
	 * @return array
	 */
	public function updateContactPerson($attributes)
	{
		$url = BASE_URL.'/'.CONTACTS.'/'.CONTACTPERSONS.'/'.intval(Input::get('contact_person_id'));

		$data = AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId.'&'.
				JSONSTRING.'='.json_encode($attributes);
		
		return $this->sendPutRequest($url, $data);
	}


	/**
	 * Delete contact person
	 *
	 * @param string $contact_person_id
	 * @return array
	 */
	public function deleteContactPerson($contact_person_id)
	{
		$url = 	BASE_URL.'/'.CONTACTS.'/'.CONTACTPERSONS.'/'.intval($contact_person_id).'?'.
				AUTHTOKEN.'='.$this->authToken.'&'.
				ORGANIZATION_ID.'='.$this->organizationId;

		return $this->sendDeleteRequest($url);
	}
}
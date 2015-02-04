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

	/**
	 *
	 *
	 *
	 */
	private function getAuthParams()
	{
		return AUTHTOKEN.'='.$this->authToken.'&'.ORGANIZATION_ID.'='.$this->organizationId;
	}

	/**********************************/
	/***	 Contacts (Clients)		***/
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
				$this->getAuthParams().'&'.
				$this->buildQueryParams($params);

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
				$this->getAuthParams().'&'.
				$this->buildQueryParams($params);

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

		$data = $this->getAuthParams().'&'.JSONSTRING.'='.$this->jsonEncode($attributes);
		
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

		$data = $this->getAuthParams().'&'.JSONSTRING.'='.$this->jsonEncode($attributes);
		
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
				$this->getAuthParams();

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

		$data = $this->getAuthParams();

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

		$data = $this->getAuthParams();

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
				$this->getAuthParams();

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

		$data = $this->getAuthParams().'&'.JSONSTRING.'='.$this->jsonEncode($attributes);
		
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

		$data = $this->getAuthParams().'&'.JSONSTRING.'='.$this->jsonEncode($attributes);
		
		return $this->sendPutRequest($url, $data);
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

		$data = $this->getAuthParams();
		
		return $this->sendPostRequest($url, $data);
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
				$this->getAuthParams();

		return $this->sendDeleteRequest($url);
	}


	/**********************************/
	/***        Invoice Items		***/
	/**********************************/

	/**
	 * Get all items.
	 * 
	 * @param array $params
	 * @return array
	 */
	public function getAllItems($params = [])
	{
		$url = 	BASE_URL.'/'.ITEMS.'?'.
				$this->getAuthParams().'&'.
				$this->buildQueryParams($params);

		return $this->sendGetRequest($url);
	}


	/**
	 * Get items.
	 * 
	 * @param array $item_id
	 * @return array
	 */
	public function getItem($item_id)
	{
		$url = 	BASE_URL.'/'.ITEMS.'/'.intval($item_id).'?'.
				$this->getAuthParams();

		return $this->sendGetRequest($url);
	}

	/**
	 * Create an item.
	 *
	 * @param array $attributes
	 * @return array
	 */
	public function createItem($attributes)
	{
		if(!is_array($attributes))
			return 'Supplied arguement needs to be an array. '.ucfirst(gettype($attributes)).' given.';

		$url = BASE_URL.'/'.ITEMS;

		$data = $this->getAuthParams().'&'.JSONSTRING.'='.$this->jsonEncode($attributes);
		
		return $this->sendPostRequest($url, $data);
	}


	/**
	 * Update an item
	 *
	 * @param array $attributes
	 * @return array
	 */
	public function updateItem($item_id, $attributes)
	{
		if(!is_array($attributes))
			return 'Second arguement needs to be an array. '.ucfirst(gettype($attributes)).' given.';

		$url = BASE_URL.'/'.ITEMS.'/'.intval($item_id);

		$data = $this->getAuthParams().'&'.JSONSTRING.'='.$this->jsonEncode($attributes);
		
		return $this->sendPutRequest($url, $data);
	}


	/**
	 * Delete item
	 *
	 * @param string $item_id
	 * @return array
	 */
	public function deleteItem($item_id)
	{
		$url = 	BASE_URL.'/'.ITEMS.'/'.intval($item_id).'?'.
				$this->getAuthParams();

		return $this->sendDeleteRequest($url);
	}
}
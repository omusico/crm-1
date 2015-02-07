<?php

class ItemsController extends \BaseController {

	protected $zohoApi;
	protected $htmlBuilder;
	protected $rules;
	protected $item;
	protected $notification;

	public function __construct(Item $item, ZohoInvoicesApi $zohoApi, HtmlBuilder $htmlBuilder,
								Rules $rules, Notification $notification)
	{
		$this->zohoApi = $zohoApi;
		$this->htmlBuilder = $htmlBuilder;
		$this->rules = $rules;
		$this->item = $item;
		$this->notification = $notification;
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
			//return intval(Input::get('itemNum'));
			$items = $this->returnSelectValue($this->zohoApi->getAllItems(), 'item', 'name', 'description');
			$html = $this->htmlBuilder->buildInvoiceItem(intval(Input::get('itemNum')), $items);
			return $html;

		}
		
		// if(Request::ajax())
		// {
			//$response = $this->zohoApi->getAllItems();
 	// 		if($response['message'] === 'success')
 	// 		{
 	// 			return $this->htmlBuilder->buildItemListingTableRows($response['items']);
 	// 		}
 	// 		else
 	// 		{
 	// 			return $response['message'];
 	// 		}
		// }
		//dd($this->zohoApi->getAllItems()['items'][0]['name']);
		return View::make('items.index', 
			[
				'title' 		=> 'Items',
				'pageHeader' 	=> 'Items',
				//'items' 		=> $this->htmlBuilder->buildItemListingTableRows($response['items'])
				'items'			=>  $this->zohoApi->getAllItems()['items']
			]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('items.create', 
			[
				'title' => 'New Item',
				'pageHeader' => 'New Item'
			]);
	}


	/**
	 * Store a newly created item.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate input
		$v = Validator::make($input = Input::all(), $this->rules->newItemRules);
		if($v->fails())
			return Redirect::back()->withInput()->withErrors($v);

		//dd($this->item->sanitizeNewItem($input));
		$response = $this->zohoApi->createItem($this->item->sanitizeNewItem($input));

		if($response['message'] === 'The item has been added.')
		{
			$this->notification->newStandardNotification('success', '<b>'. $response['item']['name'] . '</b> has been added as an invoice item.');
			return Redirect::action('ItemsController@index');
		}
		else
		{
			return Redirect::back()->withInput()->with('error', $response['message']);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($item_id)
	{
		if(Request::ajax())
		{
			$item = $this->zohoApi->getItem($item_id)['item'];

			return $item;
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($item_id)
	{
		if(Request::ajax())
		{	
			$response = $this->zohoApi->getItem($item_id);

			if($response['message'] === 'success')
			{
				return $response['item'];
			}
			else
			{
				return $response['message'];
			}
			
		}
	}


	/**
	 * Update the item.
	 *
	 * @return Response
	 */
	public function update()
	{
		if(Request::ajax())
		{	
			// validate input
			$v = Validator::make($input = Input::all(), $this->rules->newItemRules);
			if($v->fails())
				return Redirect::back()->withInput()->withErrors($v);

			$response = $this->zohoApi->updateItem(intval(Input::get('item_id')), $this->item->sanitizeNewItem($input));

			if($response['message'] === 'Item details have been saved.')
			{
				$this->notification->newStandardNotification('success', '<b>'. $response['item']['name'] . '</b> has been updated.');
				return 'success';
			}
			else
			{
				return $response['message'];
			}

		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($item_id)
	{
		if(Request::ajax())
		{
			$response = $this->zohoApi->deleteItem($item_id);

			if($response['message'] === 'The item has been deleted.')
			{
				$this->notification->newStandardNotification('success', 'Item deleted.');
				return 'success';
			}
			else
			{
				return $response['message'];
			}
		}
	}


}

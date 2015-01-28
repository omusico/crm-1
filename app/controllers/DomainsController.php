<?php

class DomainsController extends \BaseController {

	protected $domain;

	public function __construct(Domain $domain)
	{
		$this->domain = $domain;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		return View::make('domains.index',
			[
				'title' => 'Domains',
				'pageHeader' => 'Domains',
				'domains' => $this->domain->getDomains()
			]);
	}


	/**
	 * Show the form for registering a new domain.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Show the form for transfering an existing domain.
	 *
	 * @return Response
	 */
	public function transfer()
	{
		
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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function dns()
	{

		$url = 'http://api.statdns.com/www.thelobbi.com/mx';

		$result = json_decode(file_get_contents($url, false, null), true);

		//dd($result['question']);
		//dd($result['answer']);
		// foreach($result['answer'] as $item) {
		// 	dd($item['name']);
		// }
		//dd($result['answer'][0]['ttl']);
		dd($result['answer']);


		// return View::make('domains.dns', 
		// 	[
		// 		'title' 		=> 'DNS Tools',
		// 		'pageHeader'	=> 'DNS Tools'
		// 	]);
	}

}

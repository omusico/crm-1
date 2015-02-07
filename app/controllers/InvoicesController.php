<?php

class InvoicesController extends \BaseController {

	protected $client;
	protected $zohoApi;
	protected $htmlBuilder;

	public function __construct(Client $client, ZohoInvoicesApi $zohoApi, HtmlBuilder $htmlBuilder)
	{
		$this->client = $client;
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
			$response = $this->zohoApi->getAllInvoices(['customer_id' => intval(Input::get('customer_id'))]);
 			if($response['message'] === 'success')
 			{
 				return $this->htmlBuilder->buildClientInvoiceTableRows($response['invoices']);
 			}
 			else
 			{
 				return $response['message'];
 			}
		}

		return View::make('invoices.index', 
			[
				'title' => 'Invoices',
				'pageHeader' => 'Invoices',
				'invoices' => $this->zohoApi->getAllInvoices()['invoices']

			]);
		// $data = "<entry xmlns='http://www.w3.org/2005/Atom' xmlns:gd='http://schemas.google.com/g/2005' xmlns:yt='http://gdata.youtube.com/schemas/2007' xmlns:media='http://search.yahoo.com/mrss/' gd:etag='W/&quot;DkAERn47eCp7I2A9XRRQEEw.&quot;'><id>tag:youtube.com,2008:video:on0iywEXD9k</id><published>2014-03-15T12:17:06.000Z</published><updated>2015-02-04T01:51:47.000Z</updated><category scheme='http://schemas.google.com/g/2005#kind' term='http://gdata.youtube.com/schemas/2007#video'/><category scheme='http://gdata.youtube.com/schemas/2007/categories.cat' term='People' label='People &amp; Blogs'/><title>Austin Powers -- Mustafa</title><content type='application/x-shockwave-flash' src='https://www.youtube.com/v/on0iywEXD9k?version=3&amp;f=videos&amp;app=youtube_gdata'/><link rel='alternate' type='text/html' href='https://www.youtube.com/watch?v=on0iywEXD9k&amp;feature=youtube_gdata'/><link rel='http://gdata.youtube.com/schemas/2007#video.related' type='application/atom+xml' href='https://gdata.youtube.com/feeds/api/videos/on0iywEXD9k/related?v=2'/><link rel='http://gdata.youtube.com/schemas/2007#mobile' type='text/html' href='https://m.youtube.com/details?v=on0iywEXD9k'/><link rel='http://gdata.youtube.com/schemas/2007#uploader' type='application/atom+xml' href='https://gdata.youtube.com/feeds/api/users/8rw1Iyghh02hbTkbqONuHQ?v=2'/><link rel='self' type='application/atom+xml' href='https://gdata.youtube.com/feeds/api/videos/on0iywEXD9k?v=2'/><author><name>strelokgunslinger</name><uri>https://gdata.youtube.com/feeds/api/users/strelokgunslinger</uri><yt:userId>8rw1Iyghh02hbTkbqONuHQ</yt:userId></author><yt:accessControl action='comment' permission='allowed'/><yt:accessControl action='commentVote' permission='allowed'/><yt:accessControl action='videoRespond' permission='moderated'/><yt:accessControl action='rate' permission='allowed'/><yt:accessControl action='embed' permission='allowed'/><yt:accessControl action='list' permission='allowed'/><yt:accessControl action='autoPlay' permission='allowed'/><yt:accessControl action='syndicate' permission='allowed'/><gd:comments><gd:feedLink rel='http://gdata.youtube.com/schemas/2007#comments' href='https://gdata.youtube.com/feeds/api/videos/on0iywEXD9k/comments?v=2' countHint='29'/></gd:comments><yt:hd/><media:group><media:category label='People &amp; Blogs' scheme='http://gdata.youtube.com/schemas/2007/categories.cat'>People</media:category><media:content url='https://www.youtube.com/v/on0iywEXD9k?version=3&amp;f=videos&amp;app=youtube_gdata' type='application/x-shockwave-flash' medium='video' isDefault='true' expression='full' duration='248' yt:format='5'/><media:content url='rtsp://r3---sn-a5m7zu7s.c.youtube.com/CiILENy73wIaGQnZDxcByyJ9ohMYDSANFEgGUgZ2aWRlb3MM/0/0/0/video.3gp' type='video/3gpp' medium='video' expression='full' duration='248' yt:format='1'/><media:content url='rtsp://r3---sn-a5m7zu7s.c.youtube.com/CiILENy73wIaGQnZDxcByyJ9ohMYESARFEgGUgZ2aWRlb3MM/0/0/0/video.3gp' type='video/3gpp' medium='video' expression='full' duration='248' yt:format='6'/><media:credit role='uploader' scheme='urn:youtube' yt:display='strelokgunslinger'>strelokgunslinger</media:credit><media:description type='plain'/><media:keywords/><media:license type='text/html' href='http://www.youtube.com/t/terms'>youtube</media:license><media:player url='https://www.youtube.com/watch?v=on0iywEXD9k&amp;feature=youtube_gdata_player'/><media:thumbnail url='https://i.ytimg.com/vi/on0iywEXD9k/default.jpg' height='90' width='120' time='00:02:04' yt:name='default'/><media:thumbnail url='https://i.ytimg.com/vi/on0iywEXD9k/mqdefault.jpg' height='180' width='320' yt:name='mqdefault'/><media:thumbnail url='https://i.ytimg.com/vi/on0iywEXD9k/hqdefault.jpg' height='360' width='480' yt:name='hqdefault'/><media:thumbnail url='https://i.ytimg.com/vi/on0iywEXD9k/sddefault.jpg' height='480' width='640' yt:name='sddefault'/><media:thumbnail url='https://i.ytimg.com/vi/on0iywEXD9k/1.jpg' height='90' width='120' time='00:01:02' yt:name='start'/><media:thumbnail url='https://i.ytimg.com/vi/on0iywEXD9k/2.jpg' height='90' width='120' time='00:02:04' yt:name='middle'/><media:thumbnail url='https://i.ytimg.com/vi/on0iywEXD9k/3.jpg' height='90' width='120' time='00:03:06' yt:name='end'/><media:title type='plain'>Austin Powers -- Mustafa</media:title><yt:aspectRatio>widescreen</yt:aspectRatio><yt:duration seconds='248'/><yt:uploaded>2014-03-15T12:17:06.000Z</yt:uploaded><yt:uploaderId>UC8rw1Iyghh02hbTkbqONuHQ</yt:uploaderId><yt:videoid>on0iywEXD9k</yt:videoid></media:group><gd:rating average='4.952381' max='5' min='1' numRaters='168' rel='http://schemas.google.com/g/2005#overall'/><yt:statistics favoriteCount='0' viewCount='45015'/><yt:rating numDislikes='2' numLikes='166'/></entry>";
		// $xml = simplexml_load_string($data) or die("Error: Cannot create object");
		
		// $json = json_encode($xml);
		// $array = json_decode($json,TRUE);

		// return dd($array['link']);

	}


	/**
	 * Show the form for creating a new invoice.
	 *
	 * @return Response
	 */
	public function create()
	{	
		// $array = array('' => ' - ') + $this->returnSelectValue($this->zohoApi->getAllItems(), 'item', 'name', 'description');

		// dd($array);
		//dd($this->returnSelectValue($this->zohoApi->getAllContacts(), 'contact', 'company_name'));
		//dd($this->zohoApi->getAllContacts());
		return View::make('invoices.create',
			[
				'title' => 'New Invoice',
				'pageHeader' => 'Create New Invoice',
				'clients' => $this->returnSelectValue($this->zohoApi->getAllContacts(), 'contact', 'company_name'),
				'items' => array('' => '-') + $this->returnSelectValue($this->zohoApi->getAllItems(), 'item', 'name', 'description'),
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeDraft()
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
		//598110000000057003
		dd($this->zohoApi->getAllInvoices(['customer_id' => '598110000000057003']));
		//return View::make('invoices.show');
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

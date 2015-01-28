<?php

class EmailsController extends \BaseController {

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('emails.index', 
			[
				'title' => 'Inbox',
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// URI Example
		//http://crm.app:8000/emails/create?to=1&cc=1&bcc=1&subject=Welcome%20to%20Up%20and%20Above&content=hi%3Cscript%3Ealert(%27hi%27);%3Cscript%3E

		$to = (Input::has('to'))? $this->user->getUserEmailAddress(Input::get('to')) : null;
		$cc = (Input::has('cc'))? $this->user->getUserEmailAddress(Input::get('cc')) : null;
		$bcc = (Input::has('bcc'))? $this->user->getUserEmailAddress(Input::get('bcc')) : null;
		$subject = (Input::has('subject'))? strip_tags(Input::get('subject')) : null;;
		$content = (Input::has('content'))? strip_tags(Input::get('content')) : null;;
		
		//dd($to);
		return View::make('emails.create', 
			[
				'title' => 'New Email',
				'to' => $to,
				'cc' => $cc,
				'bcc' => $bcc,
				'subject' => $subject,
				'content' => $content				
			]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//dd(Input::get('to'));

		$data = [ 
			'name' => 'Nicholas Law'
		];

		Mailgun::send('emails.templates.welcome', $data, function($message)
		{
		    $message->to(Input::get('to'))->subject(Input::get('subject'));

		    if(Input::has('cc'))
		    	$message->cc(Input::get('cc'));

		    if(Input::has('cc'))
		    	$message->bcc(Input::get('bcc'));		    

		    // $message->tracking(true);
		    // $message->trackOpens(true);
		});

		return 'Emails Sent!';
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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function sent()
	{
		return View::make('emails.sent', 
			[
				'title' => 'Sent Mail',
				
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function drafts()
	{
		return View::make('emails.drafts', 
			[
				'title' => 'Draft Emails',
				
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function trash()
	{
		return View::make('emails.trash', 
			[
				'title' => 'Trashed Mail',
				
			]);
	}

}

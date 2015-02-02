@extends('templates.main-template')
    @section('content')

	  <div class="wrapper-md" ng-controller="FormDemoCtrl">

	  	<div class="row">
	    <div class="col-sm-12">
	      <div class="panel panel-default">

	        <div class="panel-heading font-bold">Create New Client</div>
	        <div class="panel-body">

        	@include('partials.errors.validation')
	          
	          <!-- row -->
	          <div class="row">
	          {{ Form::open(['id' => 'create-client-form', 'action' => 'ClientsController@store']) }}
	          	
	          	<!-- business details -->
	          	<div class="col-sm-6">
	          		<h3>Client Details</h3>
		          	<div class="form-group">
			          	<label for="client">Client Name <span class="text-danger">*</span></label>
			          	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'eg. Bob\'s Backyard Beetroot', 'required']) }}
		          	</div>

		          	<div class="form-group">
			          	<div class="form-group">
				          <label for="client">Industry <span class="text-danger">*</span></label>
				          	{{ Form::select('industry', $industries, '', ['class' => 'form-control m-b']) }}
				        </div>
		          	</div>

		          	<!-- row -->
		          	<div class="row">
				        <div class="col-sm-6">
				        	<div class="form-group">
					          	<label for="client">Primary Phone <span class="text-danger">*</span></label>
					          	{{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'eg. +613 4936 1937']) }}
				          	</div>
				        </div>
		          		<div class="col-sm-6">
		          			<div class="form-group">
					          	<label for="client">Primary Email Address <span class="text-danger">*</span></label>
					          	<a data-toggle="tooltip" data-placement="top" title="This will be the client's primary email address and the one at which they will recieve invoices and receipts.">
					          		<i class="fa fa-question-circle"></i>
					          	</a>
					          	{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg. accounts@backyardbeetroots.com', 'required']) }}
			          		</div>
				        </div>
				    </div>
				    <!-- / row -->

		          	<!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Website</label>
					          	{{ Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'eg. www.bobsbackyardbeetroot.com']) }}
				          	</div>
				        </div>
				        <div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">ABN / ACN</label> 
					          	<a data-toggle="tooltip" data-placement="top" title="A valid ABN/ACN is required when registering a new Australian domain (eg. mydomain.com.au).">
					          		<i class="fa fa-question-circle"></i>
					          	</a>
					          	{{ Form::text('abn', null, ['class' => 'form-control', 'placeholder' => 'eg. 12 345 678 901']) }}
				          	</div>
			          	</div>
			        </div>

		          	<div class="form-group">
			          	<label for="client">Street Address</label>
			          	{{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'eg. 56 Collins St']) }}
		          	</div>

		          	<!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">City / Suburb</label>
					          	{{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'eg. Melbourne']) }}
				          	</div>
				        </div>
				        <div class="col-sm-6">
				          	<div class="form-group">
					          	<div class="form-group">
						          <label for="client">State / Territory</label>
						          {{ Form::select('state', array(
						          							'' => ' - ',
						          							'nsw' => 'New South Wales',
						          							'vic' => 'Victoria',
						          							'qld' => 'Queensland',
						          							'sa' => 'South Australia',
						          							'nt' => 'Nothern Territory',
						          							'wa' => 'Western Australia',
						          							'tas' => 'Tasmania'
						          							), null, ['class' => 'form-control m-b']) }}
						        </div>
				          	</div>
				        </div>
				    </div>
				    <!-- / row -->

				    <!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Post Code / ZIP</label>
					          	{{ Form::text('zip', null, ['class' => 'form-control', 'placeholder' => 'eg. 3000']) }}
				          	</div>
				        </div>
				        <div class="col-sm-6">
				        	<div class="form-group">
					          <label for="client">Country</label>
					          {{ Form::select('country', array(
					          							'' => ' - ',
					          							'australia' => 'Australia',
					          							'new-zealand' => 'New Zealand',
					          							'united-states' => 'United States',
					          							'united-kingdom' => 'United Kingdom'
					          							), null, ['class' => 'form-control m-b']) }}
					        </div>
				        </div>
				    </div>
				    <!-- / row -->

	          	</div>
	          	<!-- / business detail -->

	          	<!-- contact details -->
	          	<div class="col-sm-6">
	          		<h3>Primary Contact</h3>

	          		<!-- row -->
	          		<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Contact First Name <span class="text-danger">*</span></label>
					          	{{ Form::text('contact_first_name', null, ['class' => 'form-control', 'placeholder' => 'eg. Robert', 'required']) }}
				          	</div>
			          	</div>

			          	<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Contact Last Name <span class="text-danger">*</span></label>
					          	{{ Form::text('contact_last_name', null, ['class' => 'form-control', 'placeholder' => 'eg. Butcher', 'required']) }}
				          	</div>
			          	</div>
		          	</div>
		          	<!-- / row -->

          	       	<div class="form-group">
			          	<label for="client">Contact Email Address <span class="text-danger">*</span></label>
			          	<a data-toggle="tooltip" data-placement="top" title="The contact's email address will act as their username for logging in.">
			          		<i class="fa fa-question-circle"></i>
			          	</a>
			          	{{ Form::email('contact_email', null, ['class' => 'form-control', 'placeholder' => 'eg. bob@bobsbackyardbeetroot.com', 'required']) }}
		          	</div>

		          	<!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Primary Phone <span class="text-danger">*</span></label>
					          	{{ Form::text('contact_primary_phone', null, ['class' => 'form-control', 'placeholder' => 'eg. +61.423 650 187',]) }}
				          	</div>
				        </div>
				     	<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client"> Phone</label>
					          	{{ Form::text('contact_secondary_phone', null, ['class' => 'form-control', 'placeholder' => 'eg. +61.323 650 187', 'required']) }}
				          	</div>
				        </div>
				    </div>
				    <!-- / row -->

				    <!-- row -->
	          		<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="password">Password <span class="text-danger">*</span></label>
					          	{{ Form::password('password', ['class' => 'form-control', 'required']) }}
				          	</div>
			          	</div>

			          	<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="password">Confirm Password <span class="text-danger">*</span></label>
					          	{{ Form::password('password_confirm', ['class' => 'form-control', 'required']) }}
				          	</div>
			          	</div>
		          	</div>
		          	<!-- / row -->

		          	<div class="form-group">
		          		<p><span class="font-bold text-upper">note:</span> Additonal contacts can be added once the client has been created.</p>
		          	</div>



		          	<!-- <h3>Google Apps</h3>
		          	<div class="form-group">
		          		Will this client require a Google Apps account?
		          		<a data-toggle="tooltip" data-placement="top" title="If the client needs to create new email accounts, we will need to configure a new Google Apps account.">
			          		<i class="fa fa-question-circle"></i>
			          	</a>
		          		<div class="radio">
			              <label class="i-checks">
			                <input type="radio" name="gapps" value="0" checked />
			                <i></i>
			                No Google Apps account is required.
			              </label>
			            </div>
			            <div class="radio">
			              <label class="i-checks">
			                <input type="radio" name="gapps" value="1" />
			                <i></i>
			                The client already has a Google Apps account.
			              </label>
			            </div>
			            <div class="radio">
			              <label class="i-checks">
			                <input type="radio" name="gapps" value="2" />
			                <i></i>
			                Yes, we will need to configure a new Google Apps account.
			              </label>
			            </div>
			        </div> -->
			        <div class="form-group">
			          	<label for="password">Additional Notes</label>
			          	{{ Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '7']) }}
		          	</div>
	          	</div>
	          	<!-- contact details -->

	          	<div class="col-sm-12">
	          		{{ Form::button('Cancel', ['class' => 'btn btn-md btn-default']) }}
	          		{{ Form::submit('Save Client', ['class' => 'btn btn-md btn-danger']) }}
	          	</div>

	          {{ Form::close() }}
	          </div>
	          <!-- / row -->
	        </div>

	      </div>
	    </div> 
	  </div>

	  </div>
    
@stop
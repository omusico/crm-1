@extends('templates.main-template')
    @section('content')

	  <div class="wrapper-md" ng-controller="FormDemoCtrl">

	  	<div class="row">
	    <div class="col-sm-12">
	      <div class="panel panel-default">
	        <div class="panel-heading font-bold">Create New Client</div>
	        <div class="panel-body">
	          
	          <!-- row -->
	          <div class="row">
	          {{ Form::open(['action' => 'ClientsController@store']) }}
	          	
	          	<!-- business details -->
	          	<div class="col-sm-6">
	          		<h3>Business Details</h3>
		          	<div class="form-group">
			          	<label for="client">Business Name <span class="text-danger">*</span></label>
			          	{{ Form::text('client_name', null, ['class' => 'form-control', 'placeholder' => 'eg. Bob\'s Backyard Beetroot', 'required']) }}
		          	</div>

		          	<div class="form-group">
			          	<div class="form-group">
				          <label for="client">Industry</label> <span class="text-danger">*</span></label>
				          <select name="industry" class="form-control m-b">
					          	<option value=""> - </option>
					          	<option value="1200">Accounting</option>
					          	<option value="6251">Administration &amp; Office Support</option>
					          	<option value="6304">Advertising, Arts &amp; Media</option>
					          	<option value="1203">Banking &amp; Financial Services</option>
					          	<option value="1204">Call Centre &amp; Customer Service</option>
					          	<option value="7019">CEO &amp; General Management</option>
					          	<option value="6163">Community Services &amp; Development</option>
					          	<option value="1206">Construction</option>
					          	<option value="6076">Consulting &amp; Strategy</option>
					          	<option value="6263">Design &amp; Architecture</option>
					          	<option value="6123">Education &amp; Training</option>
					          	<option value="1209">Engineering</option>
					          	<option value="6205">Farming, Animals &amp; Conservation</option>
					          	<option value="1210">Government &amp; Defence</option>
					          	<option value="1211">Healthcare &amp; Medical</option>
					          	<option value="1212">Hospitality &amp; Tourism</option>
					          	<option value="6317">Human Resources &amp; Recruitment</option>
					          	<option value="6281">Information &amp; Communication Technology</option>
					          	<option value="1214">Insurance &amp; Superannuation</option>
					          	<option value="1216">Legal</option>
					          	<option value="6092">Manufacturing, Transport &amp; Logistics</option>
					          	<option value="6008">Marketing &amp; Communications</option>
					          	<option value="6058">Mining, Resources &amp; Energy</option>
					          	<option value="1220">Real Estate &amp; Property</option>
					          	<option value="6043">Retail &amp; Consumer Products</option>
					          	<option value="6362">Sales</option>
					          	<option value="1223">Science &amp; Technology</option>
					          	<option value="6261">Self Employment</option>
					          	<option value="6246">Sport &amp; Recreation</option>
					          	<option value="1225">Trades &amp; Services</option>
					          	<option value="6565">Other</option>
					        </select>
				          <!-- {{ Form::select('size', array(
				          							'' => ' - ',
				          							'it' => 'Information & Communication Technology',
				          							'accounting' => 'Accounting',
				          							'construction' => 'Construction',
				          							'design' => 'Design & Architecture',
				          							'education' => 'Education & Training',
				          							), '', ['class' => 'form-control m-b']) }} -->
				        </div>
			          	<!-- {{ Form::text('client_state', null, ['class' => 'form-control', 'placeholder' => 'eg. Victoria']) }} -->
		          	</div>

		          	<div class="form-group">
			          	<label for="client">Business Website</label>
			          	{{ Form::text('client_website', null, ['class' => 'form-control', 'placeholder' => 'eg. www.bobsbackyardbeetroot.com']) }}
		          	</div>

		          	<!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">ABN / ACN</label> 
					          	<a data-toggle="tooltip" data-placement="top" title="A valid ABN/ACN is required when registering a new Australian domain (eg. mydomain.com.au).">
					          		<i class="fa fa-question-circle"></i>
					          	</a>
					          	{{ Form::text('client_abn', null, ['class' => 'form-control', 'placeholder' => 'eg. 12 345 678 901']) }}
				          	</div>
				        </div>
				        <div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Billing Email Address <span class="text-danger">*</span></label>
					          	{{ Form::email('client_email', null, ['class' => 'form-control', 'placeholder' => 'eg. accounts@backyardbeetroots.com', 'required']) }}
			          		</div>
			          	</div>
			        </div>

		          	<div class="form-group">
			          	<label for="client">Street Address</label>
			          	{{ Form::text('client_street', null, ['class' => 'form-control', 'placeholder' => 'eg. 56 Collins St']) }}
		          	</div>

		          	<!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">City / Suburb</label>
					          	{{ Form::text('client_city', null, ['class' => 'form-control', 'placeholder' => 'eg. Melbourne']) }}
				          	</div>
				        </div>
				        <div class="col-sm-6">
				          	<div class="form-group">
					          	<div class="form-group">
						          <label for="client">State</label>
						          {{ Form::select('size', array(
						          							'' => ' - ',
						          							'nsw' => 'New South Wales',
						          							'vic' => 'Victoria',
						          							'qld' => 'Queensland',
						          							'sa' => 'South Australia',
						          							'nt' => 'Nothern Territory',
						          							'wa' => 'Western Australia',
						          							'tas' => 'Tasmania'
						          							), '', ['class' => 'form-control m-b']) }}
						        </div>
					          	<!-- {{ Form::text('client_state', null, ['class' => 'form-control', 'placeholder' => 'eg. Victoria']) }} -->
				          	</div>
				        </div>
				    </div>
				    <!-- / row -->

				    <!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Post Code</label>
					          	{{ Form::text('client_post_code', null, ['class' => 'form-control', 'placeholder' => 'eg. 3000']) }}
				          	</div>
				        </div>
				        <div class="col-sm-6">
				        	<div class="form-group">
					          <label for="client">Country</label>
					          {{ Form::select('size', array(
					          							'' => ' - ',
					          							'australia' => 'Australia',
					          							'new-zealand' => 'New Zealand',
					          							'united-states' => 'United States',
					          							'united-kingdom' => 'United Kingdom'
					          							), 'australia', ['class' => 'form-control m-b']) }}
					        </div>
				        </div>
				    </div>
				    <!-- / row -->

	          	</div>
	          	<!-- / business detail -->

	          	<!-- contact details -->
	          	<div class="col-sm-6">
	          		<h3>Contact Details</h3>

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

		          	<!-- row -->
	          		<div class="row">
			          	<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Contact Email Address <span class="text-danger">*</span></label>
					          	<a data-toggle="tooltip" data-placement="top" title="The user's email address will act as their username.">
					          		<i class="fa fa-question-circle"></i>
					          	</a>
					          	{{ Form::email('contact_email', null, ['class' => 'form-control', 'placeholder' => 'eg. bob@bobsbackyardbeetroot.com', 'required']) }}
				          	</div>
			          	</div>
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Company Title</label>
					          	{{ Form::text('contact_title', null, ['class' => 'form-control', 'placeholder' => 'eg. Business Owner']) }}
				          	</div>
			          	</div>
		          	</div>
		          	<!-- / row -->

		          	<!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Primary Phone (Mobile) <span class="text-danger">*</span></label>
					          	{{ Form::text('contact_primary_phone', null, ['class' => 'form-control', 'placeholder' => 'eg. +61.423 650 187',]) }}
				          	</div>
				        </div>
				     	<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Secondary Phone (Landline)</label>
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

		          	<h3>Google Apps</h3>
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
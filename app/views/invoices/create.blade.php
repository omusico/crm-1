@extends('templates.main-template')
    @section('content')

	  <div class="wrapper-md" ng-controller="FormDemoCtrl">

	  	<div class="row">
	    <div class="col-sm-12">
	      <div class="panel panel-default">

	      	@include('partials.errors.validation')

	        <div class="panel-heading font-bold">Create New Incoice</div>
	        <div class="panel-body">
	          
	          <!-- row -->
	          <div class="row">
	          {{ Form::open(['action' => 'UsersController@store']) }}
	          	
	          	<!-- business details -->
	          	<div class="col-sm-6">
	          		<h3>New Invoice</h3>

	          		<!-- client -->
		          	<div class="form-group">
			        	<label class="font-bold">Client:</label> <span class="text-danger">*</span></label>
			        	{{ Form::select('client', $clients,
			        			$c, ['class' => 'form-control chosen-selected', 'ui-jq' => 'chosen', 'data-placeholder' => 'Select recipients...', 'required']) }}
		          	</div>
		          	<!-- / client -->

		          	<div class="form-group">
			          	<label for="first_name">First Name <span class="text-danger">*</span></label>
			          	{{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'eg. Jane', 'required']) }}
		          	</div>

		          	<div class="form-group">
			          	<label for="last_name">Last Name <span class="text-danger">*</span></label>
			          	{{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'eg. Doe', 'required']) }}
		          	</div>

		          	<!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Primary Phone (Mobile) <span class="text-danger">*</span></label>
					          	{{ Form::text('primary_phone', null, ['class' => 'form-control', 'placeholder' => 'eg. +61.423 650 187',]) }}
				          	</div>
				        </div>
				     	<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="client">Secondary Phone (Landline)</label>
					          	{{ Form::text('secondary_phone', null, ['class' => 'form-control', 'placeholder' => 'eg. +61.323 650 187', 'required']) }}
				          	</div>
				        </div>
				    </div>
				    <!-- / row -->

		          	<div class="form-group">
			          	<label for="email">Email Address</label> <span class="text-danger">*</span></label>
			          	<a data-toggle="tooltip" data-placement="top" title="The user's email address will act as their username.">
			          		<i class="fa fa-question-circle"></i>
			          	</a>
			          	{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg. newuser@example.com']) }}
		          	</div>

		          	<!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="password">Password <span class="text-danger">*</span></label> 
					          	<a data-toggle="tooltip" data-placement="top" title="Password must be a minimun of 6 characters.">
					          		<i class="fa fa-question-circle"></i>
					          	</a>
					          	{{ Form::password('password', ['class' => 'form-control', 'required']) }}
				          	</div>
				        </div>
				     	<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="password_confirm">Comfirm Password</label> <span class="text-danger">*</span>
					          	{{ Form::password('password_confirm', ['class' => 'form-control', 'required']) }}
				          	</div>
				        </div>
				    </div>
				    <!-- / row -->

		          	<!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          <label for="client_id">Client</label> <span class="text-danger">*</span>
					          <a data-toggle="tooltip" data-placement="top" title="Assign the new user to a client.">
				          		<i class="fa fa-question-circle"></i>
				          	  </a>
					          <select name="client_id" class="form-control m-b" required>
						          	<option selected> - </option>
						          	<option value="1">Client 1</option>
						          	<option value="2">Client 2</option>
						          	<option value="3">Client 3</option>
						          	<option value="4">Client 4</option>
						        </select> 
				          	</div>
				        </div>

				        <div class="col-sm-6">
				          	<div class="form-group">
					          <label for="permission_id">Client Privileges</label> <span class="text-danger">*</span>
					          <a data-toggle="tooltip" data-placement="top" title="Assign the level of permissions this user has.">
				          		<i class="fa fa-question-circle"></i>
				          	  </a>
					          <select name="permission_id" class="form-control m-b" required>
						          	<option> - </option>
						          	<option value="1">Privilege 1</option>
						          	<option value="2">Privilege 2</option>
						          	<option value="3">Privilege 3</option>
						          	<option value="4">Privilege 4</option>
						        </select>
				          	</div>
				        </div>
				    </div>
				    <!-- / row -->

	          	</div>
	          	<!-- / business detail -->

	          	<div class="col-sm-12">
	          		{{ Form::button('Cancel', ['class' => 'btn btn-md btn-default']) }}
	          		{{ Form::submit('Save User', ['class' => 'btn btn-md btn-danger']) }}
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
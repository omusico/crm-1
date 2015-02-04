@extends('templates.main-template')
    @section('content')

	  <div class="wrapper-md" ng-controller="FormDemoCtrl">

	  	<div class="row">
	    <div class="col-sm-12">
	      <div class="panel panel-default">

	        <div class="panel-heading font-bold">New Invoice Item</div>
	        <div class="panel-body">

	          @include('partials.errors.validation')

	          <!-- row -->
	          <div class="row">
	          {{ Form::open(['action' => 'ItemsController@store', 'class' => 'form-label-bold']) }}
	          	
	          	<!-- business details -->
	          	<div class="col-sm-6">
	          		<h3>Item Details</h3>

	          		<!-- row -->
		          	<div class="row">
		          		<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="first_name">Name <span class="text-danger">*</span></label>
					          	{{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
				          	</div>
				        </div>
				       	<div class="col-sm-6">
				          	<div class="form-group">
					          	<label for="last_name">Price <span class="text-danger">*</span></label>
					          	<div class="input-group m-b">
                          			<span class="input-group-addon">$</span>
					          		{{ Form::text('price', null, ['class' => 'form-control', 'required']) }}
					          	</div>
				          	</div>
				        </div>
				    </div>
				    <!-- / row -->

		          	<div class="form-group">
			          	<label for="email">Description <span class="text-danger">*</span></label>
			          	{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4' , 'required']) }}
		          	</div>

	          	</div>
	          	<!-- / business detail -->

	          	<div class="col-sm-12">
	          		{{ Form::button('Cancel', ['class' => 'btn btn-md btn-default']) }}
	          		{{ Form::submit('Create Item', ['class' => 'btn btn-md btn-danger']) }}
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
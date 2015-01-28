<!-- row -->
<div class="row">
{{ Form::open(['action' => 'ConfigurationsController@emailUpdate', 'method' => 'PUT']) }}
	<div class="col-sm-6">
    <h3>Outgoing Email Configurations (Mailgun Config)</h3>
		<div class="form-group">
    	<label for="client">Default Email Name <span class="text-danger">*</span></label>
    	<a data-toggle="tooltip" data-placement="top" title='{{ $defaultEmailNameDesc }}'>
    		<i class="fa fa-question-circle"></i>
    	</a>
    	{{ Form::text('default_email_name', $defaultEmailName, ['class' => 'form-control', 'required', (Auth::user()->permission_id < 4)? 'disabled' : '']) }}
  	</div>

  	<div class="form-group">
    	<label for="client">Default Email Address <span class="text-danger">*</span></label>
    	<a data-toggle="tooltip" data-placement="top" title="{{ $defaultEmailAddressDesc }}">
    		<i class="fa fa-question-circle"></i>
    	</a>
    	{{ Form::email('default_email_address', $defaultEmailAddress, ['class' => 'form-control', 'required', (Auth::user()->permission_id < 4)? 'disabled' : '']) }}
  	</div>

		{{ Form::button('Cancel', ['class' => 'btn btn-md btn-default']) }}
		{{ Form::submit('Save Changes', ['class' => 'btn btn-md btn-danger']) }}
	</div>
{{ Form::close() }}
</div>
<!-- / row -->
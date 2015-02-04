<!-- Modal -->
<div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['action' => 'ContactsController@store', 'method' => 'post', 'id' => 'new-contact-form', 'class' => 'no-return-form form-label-bold']) }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $client['company_name'] }} - New Contact</h4>
      </div>
      <div class="modal-body">
        
            {{ Form::hidden('contact_id', $client['contact_id']) }}
            <!-- row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">First Name <span class="text-danger">*</span></label>
                        {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'John', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Last Name <span class="text-danger">*</span></label>
                        {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Doe', 'required']) }}
                    </div>
                </div>
            </div>
            <!-- / row -->
            
            <div class="form-group">
                <label for="client">Email <span class="text-danger">*</span></label>
                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'myemail@example.com', 'required']) }}
            </div>

            <!-- row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Primary Phone (Mobile)</label>
                        {{ Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'eg. +61.423 650 187',]) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Secondary Phone (Landline)</label>
                        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'eg. +61.323 650 187']) }}
                    </div>
                </div>
            </div>
            <!-- / row -->

            <!-- row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Password <span class="text-danger">*</span></label>
                        {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Confirm Password <span class="text-danger">*</span></label>
                        {{ Form::password('password_confirm', ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
            </div>
            <!-- / row -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-info">Add Contact</button>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="updateContactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['action' => 'ContactsController@update', 'id' => 'update-contact-form']) }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $client['company_name'] }} - Update Contact</h4>
      </div>
      <div class="modal-body">
        
            {{ Form::hidden('contact_id', $client['contact_id']) }}

            <!-- row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">First Name <span class="text-danger">*</span></label>
                        {{ Form::text('first_name', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Last Name <span class="text-danger">*</span></label>
                        {{ Form::text('last_name', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
            </div>
            <!-- / row -->
            
            <div class="form-group">
                <label for="client">Email <span class="text-danger">*</span></label>
                {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
            </div>

            <!-- row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Primary Phone (Mobile)</label>
                        {{ Form::text('mobile', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Secondary Phone (Landline)</label>
                        {{ Form::text('phone', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <!-- / row -->

            <!-- row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Password <span class="required-asterisk text-danger">*</span></label>
                        {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Confirm Password <span class="required-asterisk text-danger">*</span></label>
                        {{ Form::password('password_confirm', ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
            </div>
            <!-- / row -->
        

      </div>
      <div class="modal-footer">
        <a  href="#"
            id="delete-contact-person"
            data-title="Delete Contact"
            data-message="Are you sure you want to delete this contact from this client's account?<br><b>NOTE:</b> This cannot be undone."
            data-method="delete"
            data-ajax
            data-url=""
            class="pull-left bootbox-confirm btn btn-md btn-danger">
            Delete Contact
        </a>
        <a  href="#"
            id="primary-contact-person"
            data-title="Primary Contact"
            data-message="Would you like to make this contact the primary contact for this client?"
            data-method="post"
            data-ajax
            data-url=""
            class="pull-left bootbox-confirm btn btn-md btn-default">
            Make Primary Contact
        </a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-info">Update Contact</button>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
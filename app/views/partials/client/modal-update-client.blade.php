<!-- Modal -->
<div class="modal fade" id="updateClientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['action' => 'ClientsController@update', 'method' => 'put', 'id' => 'update-client-form', 'class' => 'no-return-form form-label-bold']) }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $client['company_name'] }} - Update Client</h4>
      </div>
      <div class="modal-body">
        
            {{ Form::hidden('contact_id', $client['contact_id']) }}

            <div class="form-group">
                <label for="client">Client Name <span class="text-danger">*</span></label>
                {{ Form::text('name', $client['contact_name'], ['class' => 'form-control', 'required']) }}
            </div>

            <div class="form-group">
                <div class="form-group">
                  <label for="client">Industry <span class="text-danger">*</span></label>
                    {{ Form::select('industry', $industries, $client['custom_fields'][0]['value'], ['class' => 'form-control m-b']) }}
                </div>
            </div>

            <!-- row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Primary Phone <span class="text-danger">*</span></label>
                        {{ Form::text('phone', $client['custom_fields'][2]['value'], ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Primary Email Address <span class="text-danger">*</span></label>
                        <a data-toggle="tooltip" data-placement="top" title="This will be the client's primary email address and the one at which they will recieve invoices and receipts.">
                            <i class="fa fa-question-circle"></i>
                        </a>
                        {{ Form::email('email', $client['custom_fields'][1]['value'], ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
            </div>
            <!-- / row -->

            <!-- row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">Website</label>
                        {{ Form::text('website', $client['website'], ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">ABN / ACN</label> 
                        <a data-toggle="tooltip" data-placement="top" title="A valid ABN/ACN is required when registering a new Australian domain (eg. mydomain.com.au).">
                            <i class="fa fa-question-circle"></i>
                        </a>
                        {{ Form::text('abn', $client['custom_fields'][3]['value'], ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="client">Street Address</label>
                {{ Form::text('address', $client['billing_address']['address'], ['class' => 'form-control']) }}
            </div>

            <!-- row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="client">City / Suburb</label>
                        {{ Form::text('city', $client['billing_address']['city'], ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="form-group">
                          <label for="client">State / Territory</label>
                          {{ Form::select('state', array(
                                                    'New South Wales' => 'New South Wales',
                                                    'Victoria' => 'Victoria',
                                                    'Queensland' => 'Queensland',
                                                    'South Australia' => 'South Australia',
                                                    'Nothern Territory' => 'Nothern Territory',
                                                    'Western Australia' => 'Western Australia',
                                                    'Tasmania' => 'Tasmania'
                                                    ), $client['billing_address']['state'], ['class' => 'form-control m-b']) }}
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
                        {{ Form::text('zip', $client['billing_address']['zip'], ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="client">Country</label>
                      {{ Form::select('country', array('Australia' => 'Australia'), $client['billing_address']['country'], ['class' => 'form-control m-b']) }}
                    </div>
                </div>
            </div>
            <!-- / row -->
            
            <div class="form-group">
                <label for="notes">Additional Notes</label>
                <textarea class="form-control" rows="4" name="notes">{{ $client['notes'] }}</textarea>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-info">Save Changes</button>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
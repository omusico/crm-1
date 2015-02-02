<div class="wrapper-sm">   
  <div class="row m-0 p-0">
    <div class="col-md-6 pl-0">
      <h3>Client Profile</h3>

      <table class="table table-bordered table-hover bg-white-only">
        <tbody class="client-profile">
        <tr>
          <td class="v-middle font-bold">Client:</td>
          <td class="v-middle">{{ $client['contact_name'] }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Status:</td>
          <td class="v-middle">{{ ucfirst($client['status']) }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Client Since:</td>
          <td class="v-middle">{{ DateClass::formatDate($client['created_time'], 'jS M Y') }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Website:</td>
          <td class="v-middle">{{ $client['website'] }}&nbsp;&nbsp;&nbsp;
            <a data-toggle="tooltip" data-placement="top" data-original-title="Open Website" class="external-link" target="_blank" href="{{ 'http://' . $client['website'] }}">
              <i class="fa fa-external-link"></i>
            </a>
          </td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Industry:</td>
          <td class="v-middle">{{ $client['custom_fields'][0]['value'] }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Primary Email:</td>
          <td class="v-middle">{{ $client['custom_fields'][1]['value'] }}&nbsp;&nbsp;&nbsp;
            <a data-toggle="tooltip" data-placement="top" data-original-title="Send New Email" class="external-link" href="{{ url('emails/create?to=' . $client['contact_id']) }}">
              <i class="fa fa-envelope"></i>
            </a>
          </td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Phone:</td>
          <td class="v-middle">{{ $client['custom_fields'][2]['value'] }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">ABN/ACN:</td>
          <td class="v-middle">{{ $client['custom_fields'][3]['value'] }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Street Address:</td>
          <td class="v-middle">{{ $client['billing_address']['address'] }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">City/Suburb:</td>
          <td class="v-middle">{{ $client['billing_address']['city'] }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">State:</td>
          <td class="v-middle">{{ $client['billing_address']['state'] }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Post Code:</td>
          <td class="v-middle">{{ $client['billing_address']['zip'] }}</td>
        </tr>
        <tr>
          <td class="v-middle font-bold">Country:</td>
          <td class="v-middle">{{ $client['billing_address']['country'] }}</td>
        </tr>
        </tbody>
      </table>

      <div class="client-btns">
          <ul>
              <li><a href="{{ url('client/'.$client['contact_id'].'/edit') }}" class="btn btn-md btn-info">Edit Profile</a></li>
              @if($client['status'] === 'active')
              <li>
                <a  href="#"
                    data-title="Client Deactivation" 
                    data-message="Are you sure you want to deactivate this client's account?"
                    data-method="put"
                    data-ajax
                    data-url="{{ url('clients/' . $client['contact_id'] . '/deactivate') }}"
                    class="bootbox-confirm btn btn-md btn-danger">
                  Deactivate Client
                </a>
              </li>
              @else
                <li>
                <a  href="#"
                    data-title="Client Activation" 
                    data-message="Are you sure you want to activate this client's account?"
                    data-method="put"
                    data-ajax
                    data-url="{{ url('clients/' . $client['contact_id'] . '/activate') }}"
                    class="bootbox-confirm btn btn-md btn-default">
                  Activate Client
                </a>
              </li>
              @endif
          </ul>
      </div>
    </div>
    <div class="col-md-6 pl-0">
      <h3>Client Contacts</h3>
      @if(count($client['contact_persons']) < 1)
        <p>This client has no contacts assigned.</p>
      @else
      <table class="table table-bordered table-hover bg-white-only">
        <tbody>
        <tr style="font-weight: bold">
          <td class="v-middle" style="width:30%">Name</td>
          <td class="ta-center v-middle" style="width:15%">Primary Conatact</td>
          <td class="ta-center v-middle" style="width:25%">Email</td>
          <td class="ta-center v-middle" style="width:30%">Phone</td>
        </tr>
        @foreach($client['contact_persons'] as $contact)
        <tr>
          <td class="v-middle">{{ $contact['first_name'] . ' ' . $contact['last_name'] }}&nbsp;&nbsp;(<a href data-toggle="modal"  data-target="#updateContactModal" class="external-link edit-contact-link" data-client-id="{{ $client['contact_id'] }}" data-contact-id = "{{ $contact['contact_person_id'] }}">edit</a>)</td>
          <td class="ta-center v-middle">{{ ($contact['is_primary_contact'])? 'Yes' : 'No' }}</td>
          <td class="ta-center v-middle">{{ $contact['email'] }}</td>
          <td class="ta-center v-middle">{{ $contact['mobile'] }}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
      @endif
      <div class="client-btns">
          <ul>
              <li>
                <a href class="btn btn-sm btn-info" data-toggle="modal" data-target="#addContactModal">Add Contact</a>
              </li>
          </ul>
      </div>
    </div>
  </div>
</div>

@include('partials.client.modal-create-contact')
@include('partials.client.modal-update-contact')

<script>
window.onload = function() {

  $('.edit-contact-link').on("click", function(event) {
      event.preventDefault();

      $client_id = $(this).data('client-id');
      $contact_id = $(this).data('contact-id');
      $url = '/contacts/'+$contact_id+'/edit';
      $method = 'get';
      $data = 'client_id='+$client_id;

      startHoldTight();
      $.ajax({
          url: $url,
          type: $method,
          data: $data,
          success:function(response){
            if(response !== null && typeof response === 'object')
            {
                $('<input name="contact_person_id" type="hidden" value="'+response['contact_person_id']+'">').insertAfter('input[name=contact_id]');
                // $('input[name=contact_person_id]').val(response['contact_person_id']);

                $('input[name=first_name]').val(response['first_name']);
                $('input[name=last_name]').val(response['last_name']);
                $('input[name=email]').val(response['email']);
                $('input[name=phone]').val(response['phone']);
                $('input[name=mobile]').val(response['mobile']);
                $('input[name=password]').removeAttr('required');
                $('input[name=password_confirm]').removeAttr('required');
                $('.required-asterisk').remove();

                $('#primary-contact-person').data('url', '/contacts/'+response['contact_person_id']+'/primary');
                $('#delete-contact-person').data('url', '/contacts/'+response['contact_person_id']);
                stopHoldTight();
            }
            else
            { 
              stopHoldTight();
              bootBoxAlert(response);  
            }
          }
      });
  });

  $('#update-contact-form').on( "submit", function(event) {
      event.preventDefault();
        
      $url = $(this).attr('action');
      $method = 'put';
      $data = $(this).serialize();

      startHoldTight();
      $.ajax({
          url: $url,
          type: $method,
          data: $data,
          success:function(response){
            if(response === 'success')
            {
              location.reload();
            }
            else
            {
              stopHoldTight();
              bootBoxAlert(response);                
            }              
          }
      });
  });

  

  $('#new-contact-form').on( "submit", function(event) {
    event.preventDefault();
      
    $url = $(this).attr('action');
    $method = 'post';
    $data = $(this).serialize();

    startHoldTight();
    $.ajax({
        url: $url,
        type: $method,
        data: $data,
        success:function(response){
          if(response === 'success')
          {
            location.reload();
          }
          else
          {
            stopHoldTight();
            bootBoxAlert(response);                
          }              
        }
    });
  });

};
</script>
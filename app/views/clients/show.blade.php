@extends('templates.main-template')
@section('content')
<div role="tabpanel" class="tab-container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active text-upper font-bold"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile & Contacts</a></li>
    <li role="presentation" class="text-upper font-bold"><a class="resource-tab" data-id="{{ $client['contact_id'] }}" href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">Invoices & Billing</a></li>
    <li role="presentation" class="text-upper font-bold"><a class="resource-tab" data-id="{{ $client['contact_id'] }}" href="#projects" aria-controls="projects" role="tab" data-toggle="tab">Projects</a></li>
    <li role="presentation" class="text-upper font-bold"><a class="resource-tab" href="#websites" aria-controls="websites" role="tab" data-toggle="tab">Websites</a></li>
    <li role="presentation" class="text-upper font-bold"><a class="resource-tab" href="#domains" aria-controls="domains" role="tab" data-toggle="tab">Domains</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <!-- profile -->
    <div role="tabpanel" class="tab-pane active" id="profile">
        @include('partials.client.profile')
    </div>
    <!-- / profile -->

    <!-- projects -->
    <div role="tabpanel" class="tab-pane" id="projects">
        
    </div>
    <!-- / projects -->

    <!-- websites -->
    <div role="tabpanel" class="tab-pane" id="websites">
        
    </div>
    <!-- / websites -->
    
    <!-- domains -->
    <div role="tabpanel" class="tab-pane" id="domains">
        
    </div>
    <!-- / domains -->

    <!-- invoices -->
    <div role="tabpanel" class="tab-pane" id="invoices">
        
    </div>
    <!-- / invoices -->

  </div>
</div>
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

  $('.resource-tab').on("click", function(event){
      event.preventDefault();
      //startHoldTight();
      $href = $(this).data('id');
      alert($href);
  });




};
</script>
@stop
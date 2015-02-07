function startHoldTight() {
  $('body').prepend('<div class="hold-tight-container"><h3 class="message">Hold tight...</h3></div><div class="hold-tight-overlay"></div>');
  $("body").css("overflow-x", "auto");
  $("body").css("overflow-y", "hidden");
  
  startSpinner();
}

function stopHoldTight() {
  $('.hold-tight-container').remove();
  $('.hold-tight-overlay').remove();
  $("body").css("overflow-x", "auto");
  $("body").css("overflow-y", "auto");

  stopSpinner();
}

function startSpinner()
{
   var opts = {
    lines: 13, // The number of lines to draw
    length: 7, // The length of each line
    width: 4, // The line thickness
    radius: 10, // The radius of the inner circle
    rotate: 0, // The rotation offset
    color: '#000', // #rgb or #rrggbb
    speed: 1, // Rounds per second
    trail: 60, // Afterglow percentage
    shadow: false, // Whether to render a shadow
    hwaccel: false, // Whether to use hardware acceleration
    className: 'spinner', // The CSS class to assign to the spinner
    zIndex: 2e9, // The z-index (defaults to 2000000000)
    top: '65px', // Top position relative to parent in px
    left: '75px' // Left position relative to parent in px
  };
  var spinner = new Spinner(opts).spin();
  $(".hold-tight-container").append(spinner.el);
}

function stopSpinner()
{
  var spinner = new Spinner().spin();
  spinner.stop();
}

$(function () {
  // instaniate tooltip items
  $('[data-toggle="tooltip"]').tooltip()

  $('#wysiwyg-editor').wysiwyg();

  $(".chosen-selected").chosen(); 
});

/**
 * Send AJAX Request
 * 
 * @param string $url
 * @param string $method
 * @param string $selector
 * @param string data (optional)
 * @return string
 */
function onloadAjax(url, method, selector, data)
{
  if(typeof(data)==='undefined') data = '';

  // start spinner object
  startHoldTight();
  $.ajax({
      url: url,
      type: method,
      data: data,
      success:function(response){
          //remove spinner object
          $(selector).html(response);          
          stopHoldTight();
      }
  });
}



function noReloadAjax(url, method, async, data)
{
    if(typeof(data)==='undefined') data = '';
    startHoldTight(); 
  
    $stuff = $.ajax({
        url: url,
        type: method,
        data: data,
        async: async
    });

    stopHoldTight();
    return $stuff.responseText;
}

$('.no-return-form').on( "submit", function(event) {
    event.preventDefault();

    $url = $(this).attr('action');
    $method = $(this).attr('method');
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

$('.edit-item-link').on("click", function(event) {
      event.preventDefault();

      $item_id = $(this).data('item-id');
      $url = '/items/'+$item_id+'/edit';
      $method = 'get';
      $data = '';

      startHoldTight();
      $.ajax({
          url: $url,
          type: $method,
          data: $data,
          success:function(response){

            if(response !== null && typeof response === 'object')
            {                
                $('<input name="item_id" type="hidden" value="'+response['item_id']+'">').insertAfter('textarea[name=description]');
                $('input[name=name]').val(response['name']);
                $('input[name=price]').val(response['rate']);
                $('textarea[name=description]').val(response['description']);                
                $('#delete-item').data('url', '/items/'+response['item_id']);
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

$('.resource-tab').on("click", function(event){
    event.preventDefault();
    $url = $(this).data('url');
    $client_id = $(this).data('id');
    $selector = $('tbody.invoices');
    $method = 'get';
    $data = 'customer_id='+$client_id;
    onloadAjax($url, $method, $selector, $data);
    $(this).removeClass('resource-tab');
});


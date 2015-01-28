
/**
 * 
 * 
 */
$('.bootbox-confirm').click(function()
{	
	$btn = $(this);
	$required = ['url', 'title', 'method'];

	//check that all required attributes are present
	for($i = 0; $i < $required.length; $i++) {
		if(undefined === $(this).data($required[$i]) || $(this).data($required[$i]).length < 1) {
			alert('data-' + $required[$i] + ' attribute not set.');
			return;
		}
	}

	/* REQUIRED DATA */
	$title = $(this).data('title');	
	$message = $(this).data('message');
	$url = $(this).data('url');
	$ajax = (undefined === $(this).data('ajax'))? false: true;

	/* OPTIONAL DATA */	
	$method = ($(this).data('method'))? $(this).data('method') : 'post';
	$successLabel = ($(this).data('success-label'))? $(this).data('success-label') : 'confirm';
	$successClass = ($(this).data('success-class'))? $(this).data('success-class') : 'btn-success';
	$dangerLabel = ($(this).data('danger-label'))? $(this).data('danger-label') :  'cancel';
	$dangerClass = ($(this).data('danger-class'))? $(this).data('danger-class') : 'btn-danger';

	bootbox.dialog({
	  message: $message,
	  title: $title.toUpperCase(),
	  buttons: {
	    success: {
	      label: $successLabel.toUpperCase(),
	      className: $successClass,
	      callback: function() {
	      	if($ajax) {		
	      		bootBoxAjax();
	      	}
	      	else {
	      		window.location = $url;
	      	}	      	
	      }
	    },
	    danger: {
	      label: $dangerLabel.toUpperCase(),
	      className: $dangerClass,
	      callback: function() {
	       	bootbox.hideAll();
	      }
	    }
	  }
	});
})

function bootBoxAjax()
{	
	$.ajax({
	    url: $url,
	    type: $method,
	    /*data: $dataArray,*/
	    success:function(response){
	    	if(response === "success") {
	    		location.reload();
	    	}
	    	else {
	    		bootBoxAlert(response);
	    	}
	    }
	});
}

/**
 * A function that accepts a string and displays 
 * that message in the form a bootbox.js alert.
 * 
 * @param string $message
 */
function bootBoxAlert(message)
{
	bootbox.alert(message, function() {});
}

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
	startHoldTight();

	$.ajax({
	    url: $url,
	    type: $method,
	    /*data: $dataArray,*/
	    success:function(response){
	    	if(response === "success")
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

/**
 * 
 * 
 * 
 */
function startHoldTight() {
	$('body').prepend('<div class="hold-tight-container"><h3 class="message">Hold tight...</h3></div><div class="hold-tight-overlay"></div>');
	$("body").css("overflow-x", "auto");
	$("body").css("overflow-y", "hidden");
	
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

/**
 * 
 * 
 * 
 */
function stopHoldTight() {
	$('.hold-tight-container').remove();
	$('.hold-tight-overlay').remove();
	$("body").css("overflow-x", "auto");
	$("body").css("overflow-y", "auto");

	var spinner = new Spinner().spin();
	spinner.stop();
}
@if(Session::has('notificationMessage'))
<script type="text/javascript">

	$(document).ready(function() {
		$.growl({{ Session::pull('notificationMessage') }}, {
			type: {{ Session::pull('notificationType') }},
			delay: {{ Session::pull('notificationLength') }},
			offset: {
				x: 20,
				y: 55
			}
		});

	});

</script>
@endif
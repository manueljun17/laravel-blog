@if (Session::has('flash_message'))
	<div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert_important' : '' }} "> 
		@if (Session::has('flash_message-important'))
			<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
		@endif
		{{ session('flash_message') }}
	</div>
@endif	
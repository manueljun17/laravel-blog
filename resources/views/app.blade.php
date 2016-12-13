<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="{{ elixir('css/all.css') }}">
		
	<style type="text/css">
		body{
			padding-top: 60px;
		}
	</style>
</head>
<body>
	@include('partials.nav')
	
<div class="container">
	@include('flash::message')
	@yield('content')
</div>

	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script >
		$('#flash-overlay-modal').modal();	
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	@yield('footer')
</body>
</html>
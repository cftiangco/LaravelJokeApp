<!DOCTYPE html>
<html>
<head>
	<title>Jokes</title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-4.3.1-dist/css/bootstrap.min.css')}}">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container">
	    <a class="navbar-brand" href="/">Jokes</a>
	  </div>
	</nav>

	<div class="container">
		@yield('content')
	</div>

	<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
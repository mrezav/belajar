<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<?php $hal = '';
	// if(Request::segment(1) == 'siswa'){
	// 	$hal = 'siswa';
	// }
	?>
<div class="container">
	@include('navbar')
	@yield('main')
</div>
<br><br><br>
	@yield('footer')
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
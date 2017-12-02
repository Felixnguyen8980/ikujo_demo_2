<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Ikujo - @yield('title')</title>
	<link rel="stylesheet" href="{{asset('css/master.css')}}">
	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
</head>
<body>
	@yield('view')
</body>
</html>
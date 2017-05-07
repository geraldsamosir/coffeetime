<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
    	<title>CoffeeTime @yield('title','| Homepage')</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		@yield('css')
	</head>
	<body>
		@include('frontend.components.header')

		@include('frontend.components.navbar')
			
		@yield('content', '')

		@include('frontend.components.footer')
		
		<script src="{{ asset('/js/app.js') }}"></script>
		@yield('js')
	</body>
</html>
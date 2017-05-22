<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
    	<title>CoffeeTime @yield('title','| Homepage')</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
		@yield('css')
	</head>
	<body>
		@include('frontend.components.header')

		@include('frontend.components.navbar')
			
		@yield('content', '')

		@include('frontend.components.footer')
		
		<script src="{{ asset('/js/app.js') }}"></script>
		<script src="{{ asset('/js/lib.js') }}"></script>
		<script>
			CKEDITOR.replace( 'ckeditor' );
		</script>
		@yield('js')
	</body>
</html>
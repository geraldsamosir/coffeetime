<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
    	<title>EduCoffe @yield('title','| Homepage')</title>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		@yield('css')
	</head>
	<body>
		@include('frontend.components.header')

		@include('frontend.components.navbar')
			
		@yield('content', '')

		@include('frontend.components.footer')
		
		<script src="{{ asset('/js/app.js') }}"></script>
		<script>
			CKEDITOR.replace( 'ckeditor' );
		</script>
		@yield('js')
	</body>
</html>
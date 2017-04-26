<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
    	<title>EduCoffe @yield('title','| Homepage')</title>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		@yield('css')
	</head>
	<body>
		@include('frontend.components.header')

		@include('frontend.components.navbar')
			
		@yield('content', '')

		@include('frontend.components.footer')
		
		<script src="{{ asset('/js/app.js') }}"></script>
		<script>
			// Initialize
			tinymce.init({
			  selector: 'textarea'
			})

		</script>
		@yield('js')
	</body>
</html>
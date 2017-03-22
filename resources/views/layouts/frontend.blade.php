<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
    	<title>EduCoffe @yield('title','| Homepage')</title>
		<link rel="stylesheet" href="css/app.css">
		@yield('stylesheet')
	</head>
	<body >

		@include('frontend.component.header')

		@include('frontend.component.navbar')
			
		@yield('content', '')

		@include('frontend.component.footer')
		
		<script src="/js/app.js"></script>
	</body>
</html>
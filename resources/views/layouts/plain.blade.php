<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
    	<title>EduCoffe @yield('title','| Homepage')</title>
		<link rel="stylesheet" href="css/app.css">
		@yield('stylesheet')
	</head>
	<body>
			
		@yield('content', '')

		<script src="/js/app.js"></script>
		@yield('js')
	</body>
</html>
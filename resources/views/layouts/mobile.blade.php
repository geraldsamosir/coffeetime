<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
    	<title>EduCoffe @yield('title','| Homepage')</title>
		<link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
		{{-- <link rel="stylesheet" href="{{ asset('css/mobile.css') }}"> --}}
		<link rel="stylesheet" href="{{ asset('css/mob.css') }}">
		@yield('css')

		<!--Let browser know website is optimized for mobile-->
      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      	<!--Import Google Icon Font-->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet">

	</head>
	<body>
		
		@include('mobile.components.sidebar')

		
		@yield('content', '')
		
		<script src="{{ asset('/js/jquery-2.1.1.min.js') }}"></script>
		<script src="{{ asset('/js/materialize.js') }}"></script>
		<script src="{{ asset('/js/mobile.js') }}"></script>
		@yield('js')

		<script>
			// Initialize collapse button
		  	$('.button-collapse').sideNav({
		    menuWidth: 300, // Default is 300
		    edge: 'left', // Choose the horizontal origin
		    closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
		    draggable: true, // Choose whether you can drag to open on touch screens,
		});

 
		</script>
	</body>
</html>
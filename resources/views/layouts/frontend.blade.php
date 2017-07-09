<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
    	<title>CoffeeTime @yield('title','| Homepage')</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('select2/css/select2.css') }}">
		<script src="{{asset('/js/ckeditor/ckeditor.js')}}"></script>
		@yield('css')
	</head>
	<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
		@include('frontend.components.header')

		@include('frontend.components.navbar')
			
		@yield('content', '')

		@include('frontend.components.footer')
		
		<script src="{{ asset('/js/app.js') }}"></script>
		<script src="{{ asset('/js/lib.js') }}"></script>
	<script src="{{ asset('/select2/js/select2.js') }}"></script>
		@yield('js')
	</body>
</html>
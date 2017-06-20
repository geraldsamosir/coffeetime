<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
    	<title>CoffeeTime @yield('title','| Homepage')</title>
		<link rel="stylesheet" href="css/app.css">
		@yield('stylesheet')
	</head>
	<body>

		@yield('content', '')

	   	<div class="section-footer-checkout">
			<div class="container">
				<div class="row">
					<p>
				   		<a href="/policy">Privacy Policy</a> | 
				   		<a href="/term">Term & Condition</a>
				   	</p>
				   	<p>Copyright &copy; CoffeeTime 2017</p>
				</div>
			</div>
	   	</div>

		<script src="/js/app.js"></script>
		@yield('js')
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <title>CoffeeTime @yield('title','| Homepage')</title>
  <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mob.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
  <link rel="stylesheet" href="{{ asset('select2/css/select2.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery.rateyo.min.css') }}">
@yield('css')

<!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet">

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

@include('mobile.components.sidebar')


@yield('content', '')

<script src="{{ asset('/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('/js/materialize.js') }}"></script>
<script src="{{ asset('/js/mobile.js') }}"></script>

<script src="{{ asset('/js/lib.js') }}"></script>
<script src="{{asset('/js/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('/select2/js/select2.js') }}"></script>
@yield('js')

<script>
    // Initialize collapse button


    $(document).ready(function () {
        $('.collapsible').collapsible();

        $('.button-collapse').sideNav({
            menuWidth: 300,
            edge: 'left',
            closeOnClick: true,
            draggable: true,
        });
    });


</script>
</body>
</html>
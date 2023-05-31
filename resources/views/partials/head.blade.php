<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('title') - Kuremi</title>

<link rel="icon" href="{{ asset('public/kuremi-icon.png') }}">

<style type="text/css">
	body {
		background: url("{{ asset('public/image/12ee.jpg') }}") no-repeat center center fixed;
		-moz-background-size: cover;
		-webkit-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
</style>

@include('partials.css')

@yield('stylesheets')

@include('partials.js')

@yield('script')
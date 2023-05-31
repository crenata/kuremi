<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials.head')
</head>
<body>
	@include('partials.nav')

	@yield('content')

	<div class="container">
		@yield('content-container')
	</div>

	@include('partials.footer')
</body>
</html>
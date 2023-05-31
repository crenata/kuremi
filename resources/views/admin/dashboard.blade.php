<!DOCTYPE html>
<html>
<head>
	@include('admin.partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		@include('admin.partials.header')

		@include('admin.partials.sidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					@yield('content-header')
					<small>@yield('sub-content-header')</small>
				</h1>
				<ol class="breadcrumb">
					@yield('breadcrumb')
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				@include('partials.message')
				@yield('content')
			</section> <!-- .content -->
		</div> <!-- .content-wrapper -->
		
		@include('admin.partials.footer')

		@include('admin.partials.control-sidebar')

	</div> <!-- .wrapper -->

@include('admin.partials.js')

@yield('scripts')

</body>

@yield('script-after-body')
</html>
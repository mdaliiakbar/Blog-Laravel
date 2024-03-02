<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8" />
		<title>@yield("title") :: {{config('constants.software.name')}}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- App favicon -->
		<link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">
		
		<!-- jvectormap -->
		<link href="{{ asset("assets/libs/jqvmap/jqvmap.min.css")}}" rel="stylesheet" />
		
		@yield("style")
		
		<link href="{{ asset("assets/libs/select2/select2.min.css") }}" rel="stylesheet" type="text/css" />
		<!-- App css -->
		<link href="{{ asset("assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset("assets/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset("assets/css/app.min.css")}}" rel="stylesheet" type="text/css" />
		
	</head>
	
	<body>
		
		<!-- Begin page -->
		<div id="wrapper">
			@include("layouts.header")
			@include("layouts.sidebar")
			<div class="content-page">
				@yield("content")  <!-- Footer Start -->
				<footer class="footer">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12 text-center">
								{{ config('constants.development.session') }} &copy; {{ config('constants.software.name') }} Developed by <a href="{{ config('constants.developer.url') }}" target="_blank">{{ config('constants.developer.name') }}</a>
							</div>
						</div>
					</div>
				</footer>
				<!-- end Footer -->
				
			</div>
		</div>
		<!-- END wrapper -->
		
		
		
		<!-- Vendor js -->
		<script src="{{ asset("assets/js/vendor.min.js") }}"></script>
		<!-- select2 js -->
		<script src="{{ asset("assets/libs/select2/select2.full.min.js") }}"></script>
		
		<!-- KNOB JS -->
		<script src="{{ asset("assets/libs/jquery-knob/jquery.knob.min.js") }}"></script>
		<!-- Chart JS -->
		<script src="{{ asset("assets/libs/chart-js/Chart.bundle.min.js") }}"></script>
		
		{{--<!-- Datatable js -->--}}
		{{--<script src="{{ asset("assets/libs/datatables/jquery.dataTables.min.js") }}"></script>--}}
		{{--<script src="{{ asset("assets/libs/datatables/dataTables.bootstrap4.min.js") }}"></script>--}}
		{{--<script src="{{ asset("assets/libs/datatables/dataTables.responsive.min.js") }}"></script>--}}
		{{--<script src="{{ asset("assets/libs/datatables/responsive.bootstrap4.min.js") }}"></script>--}}
		
		
		<!-- Init js-->
		<script src="{{ asset("assets/js/pages/form-advanced.init.js") }}"></script>
		
		@yield("script")
		
		<!-- App js -->
		<script src="{{ asset("assets/js/app.min.js") }}"></script>
		
	</body>
	
</html>
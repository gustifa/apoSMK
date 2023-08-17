<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('admin/assets/images/favicon-32x32.png')}}" type="image/png" />
	<meta name="csrf-token" content="{{ csrf_token() }}" >
	<!--plugins-->
	<link href="{{asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{asset('admin/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('admin/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('admin/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('admin/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('admin/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/assets/css/header-colors.css')}}" />
	<!-- <link rel="stylesheet" href="{{asset('admin/assets/social/css/bootstrap.css')}}" /> -->
	<!-- <link rel="stylesheet" href="{{asset('admin/assets/social/css/docs.css')}}" /> -->
	<link rel="stylesheet" href="{{asset('admin/assets/social/css/font-awesome.css')}}" />
		<link href="{{asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('admin/assets/download/css/toastr.css')}}" />
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" > -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />

	
	<title>SIPO SMK | @yield('title')</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('admin/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Admin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			@include('admin.body.sidebar')
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('admin.body.header')
		<!--end header -->
		<!--start page wrapper -->
		@yield('admin');
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('admin.body.footer')
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<!-- @include('admin.body.setting') -->
	<!--end switcher-->
	<!-- Bootstrap JS -->
	
	<!--plugins-->

	<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->


	<script src="{{asset('admin/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/jquery-knob/excanvas.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
		<!-- social-icon -->
	<script src="{{asset('admin/assets/social/js/docs.js')}}"></script>
	<!-- <script src="{{asset('admin/assets/social/js/jquery.js')}}"></script> -->
	<script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
	
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>

	  <script src="{{asset('admin/assets/js/index.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	<!--app JS-->
	<script src="{{asset('admin/assets/js/app.js')}}"></script>

	<script src="{{ asset('admin/assets/download/js/toastr.min.js') }}"></script>
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->

	@include('sweetalert::alert')

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
 <script src="{{ asset('admin/assets/download/js/sweetalert2.js') }}"></script>
 <script src="{{ asset('admin/assets/js/code.js') }}"></script>
 <script src="{{ asset('admin/assets/js/code/validate.min.js') }}"></script>





	
</body>

</html>
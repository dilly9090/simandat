<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('title')

	<!-- Global stylesheets -->
	@include('includes.script')
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	@include('includes.navbar')
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			@include('includes.sidebar')
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					@yield('header-content')

					@yield('breadcumb')
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					@yield('konten')


					<!-- Footer -->
					@include('includes.footer')
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
@yield('modal')
@yield('footscript')

<style>
.nav > li a
{
	color : #000 !important;
	font-weight: 600 !important;
}
.nav > li:hover
{
	background: #fff;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form : SIMANDAT-PSKBS</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/pages/login.js')}}"></script>

	<script type="text/javascript" src="{{asset('assets/js/plugins/ui/ripple.min.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container" id="radial-center">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

                    <!-- Advanced login -->
                    <div class="row">
                        <div style="text-align:center;width:100%">
                            <div style="margin:10px auto 50px auto !important;width:700px;padding-bottom:50px;">
                                <img src="{{asset('assets/images/simandat-logo.png')}}" style="width:100px;float:left">
                                <div style="float:left;margin-left:20px;margin-top:-10px;">
                                    <div>
                                        <span style="font-size:60px;">SIMANDAT</span> <span style="font-size:60px;font-weight:600">PSKBS</span>
                                    </div>
                                    <div style="margin-top:-20px;">
                                        <span style="font-size:25px;">Sistem Informasi Manajemen Data Terpadu</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<form action="#" style="margin-top:40px;">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<h5 class="content-group-lg">Silahkan Login Terlebih Dahulu</h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email" style="color:#004aaa !important;border:1px solid #004aaa !important;">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password" style="color:#004aaa !important;border:1px solid #004aaa !important;">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>


							<div class="form-group">
								<button type="submit" class="btn btn-block" style="background: #ffc300">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>

							
						</div>
                    </form>
                    <div class="row">
                        <div style="text-align:center;width:100%">
                            <div style="margin:0 auto !important;width:700px;">
                                <img src="{{asset('assets/images/kemensos_logo.png')}}" style="width:120px;">
                                <div style="">
                                    <div>
                                        <span style="font-size:14px;font-weight:600">Direktorat Perlindungan Sosial Korban Bencana Sosial</span>
                                    </div>
                                    <div>
                                        <span style="font-size:14px;">Direktorat Jenderal Perlindungan Jaminan Sosial</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- /advanced login -->

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
<style>
#radial-center {
  /* fallback */
  background-color: #00a3f1;
  /* background-image: url(images/radial_bg.png); */
  background-position: center center;
  background-repeat: no-repeat;

  /* Safari 4-5, Chrome 1-9 */
  /* Can't specify a percentage size? Laaaaaame. */
  background: -webkit-gradient(radial, center center, 0, center center, 460, from(#ffffff), to(#00a3f1));

  /* Safari 5.1+, Chrome 10+ */
  background: -webkit-radial-gradient(circle, #ffffff, #00a3f1);

  /* Firefox 3.6+ */
  background: -moz-radial-gradient(circle, #ffffff, #00a3f1);

  /* IE 10 */
  background: -ms-radial-gradient(circle, #ffffff, #00a3f1);

  /* Opera couldn't do radial gradients, then at some point they started supporting the -webkit- syntax, how it kinda does but it's kinda broken (doesn't do sizing) */
}
.panel
{
    background: transparent !important;
}
</style>

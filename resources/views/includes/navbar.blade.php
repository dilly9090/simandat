<div class="navbar navbar-inverse bg-indigo">
		<div class="navbar-header text-center" style="text-align:center">
            <a class="navbar-brand text-center" href="{{ url('/home')}}" style="padding:4px 0px;margin:0 auto !important;text-align:center">
                <img src="assets/images/simandat-logo-header.png" alt="" style="margin-top:0px;height:45px;margin-left:20px;">
            </a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				<li><a href="{{url('regulasi')}}" >Regulasi</a></li>
				<li><a href="{{url('sarpras')}}" >Data Sarpras</a></li>
				<li><a href="{{url('sdm')}}" >SDM</a></li>
				<li><a href="{{url('surat-masuk')}}" >Surat Masuk</a></li>
				<li><a href="{{url('surat-keluar')}}" >Surat Keluar</a></li>
			</ul>

			<div class="navbar-right">
				<p class="navbar-text" style="color:darkblue"> Nama Pengguna</p>
				<p class="navbar-text"><span class="label bg-success-400"> <i class="icon-user"></i> Online</span></p>
				
			</div>
		</div>
	</div>
<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								@php
									$path=Request::path();
								@endphp
								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="{{$path=='home' ? 'active' : ''}}"><a href="{{url('home')}}"><i class="icon-home4"></i> <span>Beranda</span></a></li>
								<li class="{{strpos($path,'program')!==false ? 'active' : ''}}">
									<a href="#"><i class="icon-stack"></i> <span>Program</span></a>
									<ul>
										<li><a href="{{url('program-persebaran')}}">Persebaran</a></li>
										<li><a href="{{url('program-tabel')}}">Tabel</a></li>
										<li><a href="{{url('program-grafik')}}">Grafik</a></li>
									</ul>
								</li>
								<li class="{{$path=='sebaran-peta' ? 'active' : ''}}"><a href="{{url('sebaran-peta')}}"><i class="icon-map4"></i> <span>Peta</span></a></li>
								<li class="{{$path=='iku' ? 'active' : ''}}"><a href="{{url('iku')}}"><i class="icon-stack2"></i> <span>IKU</span></a></li>
								<li class="{{$path=='anggaran' ? 'active' : ''}}"><a href="{{url('anggaran')}}"><i class="icon-wallet"></i> <span>Anggaran</span></a></li>
								<li class="{{$path=='kegiatan-fisik' ? 'active' : ''}}"><a href="{{url('kegiatan-fisik')}}"><i class="icon-notebook"></i> <span>Kegiatan/Fisik</span></a></li>
								<hr>
								<li class="{{strpos($path,'master')!==false ? 'active' : ''}}"><a href={{url('master')}}><i class="icon-list"></i> <span>Master Data</span></a></li>
								<li><a href={{url('logout')}}><i class="icon-switch"></i> <span>Logout</span></a></li>
								

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
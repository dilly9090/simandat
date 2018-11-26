@extends('layouts.master')
@section('title')
    <title>Master Data</title>
@endsection

@section('head-section')
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
        </div>
        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
            </div>
        </div>
    </div>
@endsection
@section('breadcumb')
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="icon-home2 position-left"></i> Beranda</a></li>
            <li class="active">Master Data</li>
        </ul>
        <ul class="breadcrumb-elements">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    Settings
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{url('logout')}}"><i class="icon-switch"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

@section('konten')
        
	                <div class="row">
						<div class="col-lg-12">

							<!-- Traffic sources -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Master Data</h5>
									
								</div>
							</div>
							<!-- /traffic sources -->

						</div>

                    </div>
                    <div class="row">
                        <a href="{{url('master-unit')}}">
                            <div class="col-lg-2 text-center">
                                <!-- Traffic sources -->
                                <div class="panel panel-flat" style="padding:0 20px 20px 20px;">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Data Unit</h5>	
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn bg-violet-700 btn-float btn-float-lg legitRipple"><i class="icon-library2"></i> <span></span></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{url('master-user')}}">
                            <div class="col-lg-2 text-center">
                                <!-- Traffic sources -->
                                <div class="panel panel-flat" style="padding:0 20px 20px 20px;">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Data User</h5>	
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn bg-purple-700 btn-float btn-float-lg legitRipple"><i class="icon-users"></i> <span></span></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </a>
					</div>
                
@endsection

@section('footscript')
<script>

</script>
@endsection
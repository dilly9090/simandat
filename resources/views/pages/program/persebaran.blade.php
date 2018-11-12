@extends('layouts.master')
@section('title')
    <title>Beranda</title>
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
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Dashboard</li>
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
		<div class="panel panel-flat" style="min-height:350px !important;">
			<div class="panel-heading">
				<h5 class="panel-title">Persebaran Program</h5>
				
			</div>
			<div class="container-fluid">
				<div class="row" style="padding:20px;">
                    <div class="map-container" id="mapsvg" ></div>
                </div>
				<div class="row" style="padding:20px;">
                    <div class="text-center col-md-12">
                        <span class="label" style="background: #004aaa;padding:5px 20px;">Keserasian Sosial</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="label" style="background: #00963e;padding:5px 20px;">Santunan</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="label" style="background: #ffc300;padding:5px 20px;">Kearifan Lokal</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footscript')
    <link href="{{asset('css/mapsvg.css')}}" rel="stylesheet">
    <link href="{{asset('css/nanoscroller.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('js/nanoscroller.js')}}"></script>
    <script src="{{asset('js/map.svg.js')}}"></script>
<script type="text/javascript">
    var APP_URL="{{url('/')}}";
    jQuery(document).ready(function(){
    jQuery("#mapsvg").mapSvg({width: 792.54596,height: 317,colors: {baseDefault: "#000000",background: "#fffff",selected: 40,hover: 21,directory: "#fafafa",status: {},base: "#195fc7"},viewBox: [0,-0.16802999999998747,792.54596,317],cursor: "pointer",tooltips: {mode: "title",on: false,priority: "local",position: "bottom-right"},gauge: {on: false,labels: {low: "low",high: "high"},colors: {lowRGB: {r: 85,g: 0,b: 0,a: 1},highRGB: {r: 238,g: 0,b: 0,a: 1},low: "#550000",high: "#ee0000",diffRGB: {r: 153,g: 0,b: 0,a: 0}},min: 0,max: false},source: APP_URL+"/indonesia.svg",title: "Indonesia",responsive: true});
});
</script>
@endsection
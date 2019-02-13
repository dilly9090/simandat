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
                <h5 class="panel-title" style="float:left;">
                    Peta Persebaran Bencana Sosial</h5>
                    <select name="tahun" id="tahun" palceholder="Tahun" class="selectbox" style="float:left;" onchange="peta(this.value)">
                        <option value=0>- Tahun -</option>
                        @for ($i = (date('Y')-5); $i <= date('Y'); $i++)
                            @if ($tahun!=null)
                                @if ($i==$tahun)
                                    <option selected="selected">{{$i}}</option>
                                @else
                                    <option>{{$i}}</option>
                                @endif

                            @else
                                @if ($i==date('Y'))
                                    <option selected="selected">{{$i}}</option>
                                @else
                                    <option>{{$i}}</option>
                                @endif

                            @endif
                        @endfor
                    </select>
				
			</div>
			<div class="container-fluid">
				<div class="row" style="padding:20px;">
                    <div class="map-container" id="mapsvg"></div>
                </div>
				{{-- <div class="row" style="padding:20px;">
                    <div class="text-center col-md-12">
                        <span class="label bg-pink-400" style="padding:5px 20px;">Konflik Sosial</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="label bg-danger-400" style="padding:5px 20px;">Kebakaran</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="label bg-orange-700" style=";padding:5px 20px;">Teror</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="label bg-info-300" style="padding:5px 20px;">Huru-hara</span>
                    </div>
                </div> --}}
                @if ($tahun!=2017)
                    <div class="row" style="margin-bottom:20px;">
                        <div class="col-md-4">
                            <div style="background:#004aaa;min-height:200px;margin:0 10px 0 20px;">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="color:white"><h3>Jumlah Kejadian Tahun {{$tahun}}</h3></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 text-right" style="color:white">{{number_format($total,0,',','.')}}</div> 
                                    <div class="col-md-7" style="color:white">kejadian </div>
                                </div>
                                @foreach ($jumlah_kejadian as $idx=>$item)   
                                    @if (count($item)!=0)
                                        <div class="row">
                                            <div class="col-md-4 text-right" style="color:white">{{number_format(count($item),0,',','.')}}</div> 
                                            <div class="col-md-7" style="color:white">{{ucwords($idx)}}</div>
                                        </div>
                                    @endif                             
                                @endforeach
                                {{-- <div class="row">
                                    <div class="col-md-5 text-right" style="color:white">5.939</div> 
                                    <div class="col-md-6" style="color:white">konflik sospol </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 text-right" style="color:white">49</div> 
                                    <div class="col-md-6" style="color:white">teror </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 text-right" style="color:white">2452</div> 
                                    <div class="col-md-6" style="color:white">kebakaran</div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background:#00963e;min-height:200px;margin:0 10px 0 10px;">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="color:white"><h3>Jumlah Korban Tahun {{$tahun}}</h3></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 text-right" style="color:white">{{number_format($jumlah_meninggal,0,',','.')}}</div> 
                                    <div class="col-md-6" style="color:white">Meninggal </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 text-right" style="color:white">{{number_format($jumlah_luka,0,',','.')}}</div> 
                                    <div class="col-md-6" style="color:white">Luka-luka</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 text-right" style="color:white">{{number_format($jumlah_pengungsi,0,',','.')}}</div> 
                                    <div class="col-md-6" style="color:white">Jumlah Pengungsi</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background:#ffc300;min-height:200px;margin:0 20px 0 10px;">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="color:white"><h3>Bangunan Rusak Tahun {{$tahun}}</h3></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 text-right" style="color:white">{{number_format($jumlah_kerusakan,0,',','.')}}</div> 
                                    <div class="col-md-6" style="color:white">Jumlah Kerusakan </div>
                                </div>
                            
                            </div>
                        </div>
                        
                    </div>
                @endif
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
        
        loadpeta();


        $(".selectbox").selectBoxIt({
            autoWidth: false
        });
    });

    function loadpeta()
    {
        var tahun=$('#tahun').val();
        $('#mapsvg').load(APP_URL+'/getpeta/'+tahun);
    }
    function peta(tahun)
    {
        location.href=APP_URL+'/sebaran-peta/'+tahun;
    }
</script>
<style>
.selectboxit-container {
    width: 10% !important;
    margin-left:20px;
}

.selectboxit-container .selectboxit {
    width: 100% !important;
}
</style>
@endsection
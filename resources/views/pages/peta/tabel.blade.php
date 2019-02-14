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
                    Tabel Persebaran Bencana Sosial</h5>
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
                    <table class="table table-basic table-striped table-data" id="table">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center">No</th>
                                <th rowspan="2" class="text-center">PROVINSI</th>
                                <th rowspan="2">Jumlah Insiden</th>
                                <th class="text-center" colspan="4">Dampak</th>
                                
                                <th rowspan="2">Detail</th>
                            </tr>
                            <tr>
                                <th class="text-center">Jumlah Korban <br>Meninggal</th>
                                <th class="text-center">Jumlah Korban <br>Luka-luka</th>
                                <th class="text-center">Jumlah <br>Pengungsi</th>
                                <th class="text-center">Jumlah Bangunan<br>Rusak</th>
                            </tr>
                        </thead>
                    @php
                        $no=1;
                    @endphp
                    <tbody>
                    @foreach ($provinsi as $item)
                            <tr>
                                <td class="text-center">{{$no}}</td>
                                <td class="text-left"><div style="width:150px;">{{$item->name}}</div></td>
                                <td>
                                    @if (isset($json[$item->name]))
                                        <div style="font-weight: 600;font-size:14px;">{{count($json[$item->name])}} Kejadian</div>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (isset($json[$item->name]['meninggal']))
                                        <span style="font-weight: 600;font-size:11px;" data-title="Jumlah Korban Meninggal" class="label label-danger tooltips">{{array_sum($json[$item->name]['meninggal'])}}
                                        </span>
                                        <span class="label label-danger"><i class="icon-users"></i></span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (isset($json[$item->name]['luka']))
                                        <span style="font-weight: 600;font-size:11px;" data-title="Jumlah Korban Luka-Luka" class="label label-success tooltips">{{array_sum($json[$item->name]['luka'])}}
                                        </span>
                                        <span class="label label-success"><i class="icon-users"></i></span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (isset($json[$item->name]['jlh_pengungsi']))
                                        <span style="font-weight: 600;font-size:11px;" data-title="Jumlah Pengungsi" class="label label-success tooltips">{{array_sum($json[$item->name]['jlh_pengungsi'])}}
                                        </span>
                                        <span class="label label-success"><i class="icon-users"></i></span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (isset($json[$item->name]['bangunan_rusak']))
                                        <span style="font-weight: 600;font-size:11px;" data-title="Jumlah Bangunan Rusak" class="label label-info tooltips">{{array_sum($json[$item->name]['bangunan_rusak'])}}
                                        </span>
                                        <span class="label label-info"><i class="icon-office"></i></span>
                                    @else
                                        -
                                    @endif
                                </td>
                               
                                <td>
                                    <a href="javascript:detail('{{$item->name}}')" class="btn btn-success btn-xs tooltips"  data-title="Detail Kejadian" data-toogle="tooltip"><i class="icon-eye"></i></a>
                                </td>
                            </tr>
                            @php
                        $no++;
                        @endphp
                    @endforeach
                    </tbody>
                    </table>
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
        
        //loadpeta();
        $('.tooltips').tooltip();

        $(".selectbox").selectBoxIt({
            autoWidth: false
        });
    });

    
    function peta(tahun)
    {
        location.href=APP_URL+'/sebaran-table/'+tahun;
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
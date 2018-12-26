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
<!-- Main charts -->
<div class="row">
                        @if (Session::has('errors'))
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>Oops, terjadi kesalahan. </strong>
                                    <ul style="font-size:12px;margin-top:5px;">
                                        @if ($errors->has('id_iku'))
                                            <li> &nbsp; - {{ $errors->first('id_iku') }}</li>
                                        @endif
                                        @if ($errors->has('kegiatan'))
                                            <li> &nbsp; - {{ $errors->first('kegiatan') }}</li>
                                        @endif
                                        @if ($errors->has('tanggal'))
                                            <li> &nbsp; - {{ $errors->first('tanggal') }}</li>
                                        @endif
                                        @if ($errors->has('jumlah'))
                                            <li> &nbsp; - {{ $errors->first('jumlah') }}</li>
                                        @endif
                                        
                                    </ul>
                                </div>
                            </div>
                        @endif
						<div class="col-lg-5">

							<!-- Traffic sources -->
							<div class="panel panel-flat" style="height:500px;">
								<div class="panel-heading">
									<h5 class="panel-title">Realisasi Anggaran</h5>
									
								</div>

								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12" style="padding:0 20px;">
											<canvas id="myChart1" height="200"></canvas>
										</div>
									</div>
									<div class="row" style="margin-top:20px;">
										<div class="col-md-12">
                                            <b>Total Serapan</b>
                                            @php
                                                $total_serapan=0;
                                            @endphp
                                            @foreach ($unit[0] as $item)
                                                @php
                                                    if(isset($jumlah[$item->id]))
                                                    {
                                                        $jlh=array_sum($jumlah[$item->id]);
                                                    }
                                                    else {
                                                        $jlh=0;
                                                    }
                                                    $total_serapan+=$jlh;
                                                @endphp
                                            @endforeach
											<h2 style="color:#004aaa;margin-top:5px;">Rp. {{rupiah($total_serapan)}},-</h2>
										</div>
										<div class="col-md-12">
											<b>Total Anggaran</b>
											<h2 style="color:#004aaa;margin-top:5px;">Rp. {{rupiah(array_sum($total_anggaran[0]))}},-</h2>
                                        </div>
                                        @php
                                            $tol_ang=isset($total_anggaran[0]) ? array_sum($total_anggaran[0]) : 0 ;
                                            $tol_ser=$total_serapan ;
                                            $sisa_real=$tol_ang-$tol_ser;
                                        @endphp
									</div>
								</div>
							</div>
							<!-- /traffic sources -->

						</div>

						<div class="col-lg-7" >

							<!-- Sales stats -->
							<div class="panel panel-flat" style="height:500px;">
								<div class="panel-heading">
									<h5 class="panel-title">Distribusi (.000.000)</h5>
								</div>

								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12" style="padding:0 20px;">
											<canvas id="barChart" height="400" width="550"></canvas>
										</div>
									</div>
									
								</div>
							</div>
							<!-- /sales stats -->

						</div>
					</div>
					<div class="row">
                        @foreach ($keg as $item)                            
                            <div class="col-md-3">
                                <div class="panel panel-body border-top-info text-center">
                                    <h6 class="no-margin text-semibold">{{$item[0]->kegiatan}}</h6>
                                    
                                    <button type="button" class="btn bg-blue-700 btn-float btn-float-lg legitRipple" style="margin-top:20px;font-size:30px">{{rupiah(count($item))}}</button>
                                    
                                </div>
                            </div>
                        @endforeach
						
					</div>
                    <!-- /main charts -->
                    @php
                        $no=1;
                        // dd($dt_iku[0]);
                        $kat=$angg=array();
                    @endphp
                    @foreach ($unit[0] as $item)
                    @php
                        if(isset($jumlah[$item->id]))
                        {
                            $jlh=array_sum($jumlah[$item->id]);
                        }
                        else {
                            $jlh=0;
                        }
                        $kat[]=$item->singkatan;
                        $angg[]=($jlh/1000000);
                    @endphp
                    @endforeach

@endsection
@section('footscript')
<script type="text/javascript" src="{{asset('assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/pickers/pickadate/legacy.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
<script>
var ctx = document.getElementById("myChart1").getContext('2d');
Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 12;
Chart.defaults.global.defaultFontColor = '#fff';

var dData = {
    labels: ["Belum Terealisasi","Sudah Terealisasi"],
    datasets: [
        {
            data: [{{$sisa_real}}, {{$tol_ser}}],
            backgroundColor: [
                "#ffc300",
                "#004aaa",
            ]
        }]
};

var pieChart = new Chart(ctx, {
  type: 'pie',
  data: dData,
  options: {
        tooltips: false,
        plugins: {
            datalabels: {
                    color: "#000000",
                    formatter: function(value, context) {
                        return 'Rp. '+value.toFixed().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1.');
                    }
                }
            }
        }
});

Chart.defaults.global.defaultFontColor = '#000';
var ctx2 = document.getElementById("barChart");
var myChart = new Chart(ctx2, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($kat);?>,
    datasets: [{
      label: '',
      data: <?php echo json_encode($angg);?>,
      backgroundColor: [
        'rgba(0, 74, 170, 1)',
        'rgba(0, 150, 62, 1)',
        'rgba(255, 195, 0, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)'
      ],
      borderColor: [
        'rgba(0, 74, 170, 1)',
        'rgba(0, 150, 62, 1)',
        'rgba(255, 195, 0, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    tooltips: {
        callbacks: {
            label: function(tooltipItem, data) {
                return "Rp." + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
                });
            }
        }
    },
    legend: {
        display: false
    },
    plugins: {
                    datalabels: {
                            color: "#000000",
                            formatter: function(value, context) {
                                return "Rp."+value.toFixed().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1.');
                            }
                        }
                    },
    responsive: false,
    scales: {
      xAxes: [{
        ticks: {
          maxRotation: 90,
          minRotation: 0
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
            callback: function(value, index, values) {
              if(parseInt(value) >= 1000){
                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
              } else {
                return value;
              }
            }
        }
      }]
    }
  }
});
</script>
@endsection
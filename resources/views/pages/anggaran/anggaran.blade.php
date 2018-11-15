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
            <li><a href="{{url('/')}}"><i class="icon-home2 position-left"></i> Beranda</a></li>
            <li class="active">Anggaran</li>
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
						<div class="col-lg-5">

							<!-- Traffic sources -->
							<div class="panel panel-flat" style="height:450px;">
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
											<h2 style="color:#004aaa;margin-top:5px;">Rp. 31.083.678.500,-</h2>
										</div>
									</div>
								</div>
							</div>
							<!-- /traffic sources -->

						</div>

						<div class="col-lg-7" >

							<!-- Sales stats -->
							<div class="panel panel-flat" style="height:450px;">
								<div class="panel-heading">
									<h5 class="panel-title">Distribusi</h5>
								</div>

								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12" style="padding:0 20px;">
											<canvas id="barChart" height="350" width="550"></canvas>
										</div>
									</div>
									
								</div>
							</div>
							<!-- /sales stats -->

						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
                            <div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title"></h5>
								</div>

								<div class="container-fluid">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kategori</th>
                                                <th class="text-right">Distribusi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>001</td>
                                                <td>Pencegahan Dalam Penanganan Konflik Sosial </td>
                                                <td class="text-right">Rp. 10.567.987.500,-</td>
                                            </tr>
                                            <tr>
                                                <td>002</td>
                                                <td>Penanganan Sosial Korban Bencana Sosial Politik</td>
                                                <td class="text-right">Rp. 567.987.500,-</td>
                                            </tr>
                                            <tr>
                                                <td>003</td>
                                                <td>Penanganan Sosial Korban Bencana Ekonomi </td>
                                                <td class="text-right">Rp. 67.987.500,-</td>
                                            </tr>
                                            <tr>
                                                <td>004</td>
                                                <td>Pemulihan dan Reintegrasi Sosial</td>
                                                <td class="text-right">Rp. 567.987.500,-</td>
                                            </tr>
                                            <tr>
                                                <td>005</td>
                                                <td>Layanan Tata Usaha</td>
                                                <td class="text-right">Rp. 67.987.500,-</td>
                                            </tr>
                                        </tbody>
                                    </table>
						        </div>
						    </div>
						</div>
					</div>
                
@endsection

@section('footscript')
<script>
var ctx = document.getElementById("myChart1").getContext('2d');
Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 12;
Chart.defaults.global.defaultFontColor = '#fff';

var dData = {
    
    datasets: [
        {
            data: [133.3, 300.2],
            backgroundColor: [
                "#ffc300",
                "#004aaa",
            ]
        }]
};

var pieChart = new Chart(ctx, {
  type: 'pie',
  data: dData
});

Chart.defaults.global.defaultFontColor = '#000';
var ctx2 = document.getElementById("barChart");
var myChart = new Chart(ctx2, {
  type: 'bar',
  data: {
    labels: ["Pencegahan", "PSKB-SP", "PSKB-E", "Pemulihan", "TU"],
    datasets: [{
      label: 'DISTRIBUSI',
      data: [53.18, 17.40, 10.69, 12.88, 5.19],
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
          beginAtZero: true
        }
      }]
    }
  }
});
</script>
@endsection
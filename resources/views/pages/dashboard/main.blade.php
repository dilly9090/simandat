<!-- Main charts -->
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
									<h5 class="panel-title">Realisasi Kegiatan/Fisik</h5>
								</div>

								<div class="container-fluid">
									<div class="row">
										<div class="col-md-10">
											<div class="progress progress-lg" style="height:50px;">
												<div class="progress-bar" style="width: 22.7%;background:#004aaa;line-height:50px;">
													<i class="icon-user"></i>
													<span>1.500 Jiwa</span>
												</div>
											</div>
										</div>
										<div class="col-md-2 text-right">
											<h3 style="color:#004aaa;margin-top:10px;">22,07 %</h3>
										</div>
									</div>
									<div class="row" style="margin-top:40px;">
										<div class="col-md-10">
											<div class="progress progress-lg" style="height:50px;">
												<div class="progress-bar" style="width: 40.26%;background:#00963e;line-height:50px;">
													<i class="icon-user"></i>
													<span>1.856 Jiwa</span>
												</div>
											</div>
										</div>
										<div class="col-md-2 text-right">
											<h3 style="color:#00963e;margin-top:10px;">40,26 %</h3>
										</div>
									</div>
									<div class="row" style="margin-top:40px;">
										<div class="col-md-10">
											<div class="progress progress-lg" style="height:50px;">
												<div class="progress-bar" style="width: 29.58%;background:#ffc300;line-height:50px;">
													<i class="icon-user"></i>
													<span>113 Lokasi</span>
												</div>
											</div>
										</div>
										<div class="col-md-2 text-right">
											<h3 style="color:#ffc300;margin-top:10px;">29,58 %</h3>
										</div>
									</div>
									<div class="row" style="margin-top:40px;">
										<div class="col-md-12">
											<b>Indikator Kinerja Utama</b>
											<h2 style="color:#004aaa;margin-top:5px;">30,64 %</h2>
										</div>
									</div>
								</div>
							</div>
							<!-- /sales stats -->

						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="panel panel-body border-top-info text-center">
								<h6 class="no-margin text-semibold">Bantuan Darurat</h6>
								
								<button type="button" class="btn bg-blue-700 btn-float btn-float-lg legitRipple" style="margin-top:20px;font-size:30px">1.245</button>
								
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-body border-top-info text-center">
								<h6 class="no-margin text-semibold">Pemulihan Integrasi Sosial</h6>
								
								<button type="button" class="btn bg-teal-700 btn-float btn-float-lg legitRipple" style="margin-top:20px;font-size:30px">345</button>
								
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-body border-top-info text-center">
								<h6 class="no-margin text-semibold">Keserasian Sosial</h6>
								
								<button type="button" class="btn bg-indigo-400 btn-float btn-float-lg legitRipple" style="margin-top:20px;font-size:30px">135</button>
								
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-body border-top-info text-center">
								<h6 class="no-margin text-semibold">Kearifan Lokal</h6>
								
								<button type="button" class="btn bg-purple-400 btn-float btn-float-lg legitRipple" style="margin-top:20px;font-size:30px">323</button>
								
							</div>
						</div>
					</div>
					<!-- /main charts -->
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
</script>
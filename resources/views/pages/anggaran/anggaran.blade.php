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
        <div class="col-md-12">
            <a href="" class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#modaltambah">+ Tambah Data</a>
        </div>
    </div>
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
                                                <tr>
                                                    <td>00{{$no}}</td>
                                                    <td>{{$item->nama_unit}} </td>
                                                    <td class="text-right">Rp. {{rupiah($jlh)}},-</td>
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
                
@endsection
@section('modal')
	<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Data Realisasi</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('data-anggaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Data Unit</label>
                                    <select name="id_unit" palceholder="Nama Unit" class="selectbox" style="" onchange="pilihiku(this.value,'iku_add')">
                                        <option>- Pilih -</option>
                                        @foreach ($unit[0] as $item)
                                            <option value="{{$item->id}}">{{$item->nama_unit}}</option>
                                            @if (isset($unit[$item->id]))
                                                @foreach ($unit[$item->id] as $im)
                                                    <option value="{{$im->id}}">- {{$im->nama_unit}}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Data IKU</label>
                                    <div id="iku_add">
                                        <select name="id_iku" palceholder="IKU" class="selectbox" style="">
                                            <option>- Pilih -</option>
                                            @foreach ($iku as $item)
                                                <option value="{{$item->id}}">{{$item->sasaran}} [ {{$item->target}} - {{$item->satuan}}]</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>   
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Kegiatan</label>
                                    <textarea name="kegiatan" class="form-control" placeholder="Kegiatan"></textarea>
                                </div> 
                            </div>
                        </div> 
                        <div class="form-group">	
                                    <label>Tanggal</label>
                                    <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar5"></i></span>
										<input type="text" name="tanggal" class="form-control pickadate" placeholder="Tanggal">
									</div>
                        </div> 
						<div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">	
                                    <label>Jumah</label>
                                    <input type="text" name="jumlah" class="form-control" placeholder="Rp. xxx.xxx.xxx.xxx">
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
                                </div> 
                            </div>
                        </div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<input type="submit" class="btn btn-success" value="Simpan">
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalubah" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Ubah Data Realisasi</h4>
				</div>
				<div class="modal-body">
					<form id="form-update" method="POST" enctype="multipart/form-data">
						@csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Data IKU</label>
                                    <select name="id_iku" id="id_iku" palceholder="IKU" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        @foreach ($iku as $item)
                                            <option value="{{$item->id}}">{{$item->sasaran}}</option>
                                        @endforeach
                                    </select>
                                </div>   
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Kegiatan</label>
                                    <textarea name="kegiatan" id="kegiatan" class="form-control" placeholder="Kegiatan"></textarea>
                                </div> 
                            </div>
                        </div> 
                        <div class="form-group">	
                                    <label>Tanggal</label>
                                    <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar5"></i></span>
										<input type="text" name="tanggal" id="tanggal" class="form-control pickadate" placeholder="Tanggal">
									</div>
                        </div> 
						<div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">	
                                    <label>Jumah</label>
                                    <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Rp. xxx.xxx.xxx.xxx">
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan"></textarea>
                                </div> 
                            </div>
                        </div>  
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<input type="submit" class="btn btn-success" value="Simpan Perubahan">
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Hapus Data Realisasi</h4>
				</div>
				<div class="modal-body">
					<h5>Apakah anda yakin akan menghapus data ini?</h5>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form-delete').submit();" style="cursor:pointer;">Ya, Saya Yakin</a>
					<form id="form-delete" method="POST" style="display: none;">
						@csrf
						@method('DELETE')
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footscript')
    <script type="text/javascript" src="{{asset('assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/pickers/pickadate/legacy.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
<script>
    function pilihiku(val,selector)
    {
        $('#'+selector).load('{{url("/")}}/iku-by-unit/'+val,function(){
            $(".selectbox").selectpicker();
        });
    }

        $(".pickadate").pickadate({
            format : 'dd-mm-yyyy',
            formatSubmit: 'yyyy-mm-dd',
            selectMonths: true,
            selectYears: true
        });
        $(".selectbox").selectpicker({
            
        });
        // $('#table').DataTable();
		// binding data to modal edit
        $('#table').on('click', '.btn-edit', function(){
            var id = $(this).data('value')
			
            $.ajax({
                url: "{{ url('data-realisasi') }}/"+id+"/edit",
                success: function(res) {
					$('#form-update').attr('action', "{{ url('data-realisasi') }}/"+id)
					$('#id_iku').val(res.id_iku)
                    $('#kegiatan').val(res.kegiatan);
                    $('#tanggal').val(res.tanggal);
                    $('#jumlah').val(res.jumlah);
                    $('#keterangan').val(res.keterangan);
                    $("#tanggal").pickadate({
                        format : 'dd-mm-yyyy',
                        formatSubmit: 'yyyy-mm-dd',
                        selectMonths: true,
                        selectYears: true
                    });

                    if(res.tanggal!=null)
                    {
                        var tgl=(res.tanggal).split('-');
                        $('#tanggal').val(tgl[2]+'-'+tgl[1]+'-'+tgl[0]);
                    }
                }
            })
        })

		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('data-realisasi') }}/"+id)			
        })

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
<style>
.selectbox {
    width: 100% !important;
}

</style>
@endsection
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
            <li class="active">Kegiatan/Fisik</li>
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
						
						<div class="col-lg-12" >

							<!-- Sales stats -->
							<div class="panel panel-flat" style="height:450px;">
								<div class="panel-heading">
									<h5 class="panel-title">Realisasi Kegiatan/Fisik</h5>
								</div>

                                <div class="container-fluid" style="padding:0 20px;">
                                    @php
                                        $color=array('#004aaa','#00963e','#ffc300','#96F','#03C','#639');
                                    @endphp
                                    @foreach ($dt_iku[0] as $satuan=> $item)
                                        @php
                                            $tot=array_sum($item);
                                            // echo $tot;
                                            $real=isset($jumlah[0][$satuan]) ? array_sum($jumlah[0][$satuan]) : 0;
                                            $persen=number_format($real/$tot * 100,2);
                                        @endphp
                                        <div class="row" style="margin-bottom:40px;">
                                            <div class="col-md-10">
                                                <div class="progress progress-lg" style="height:50px;">
                                                    <div class="progress-bar" style="width: {{$persen}}%;background:{{$color[array_rand($color)]}};line-height:50px;">
                                                        <i class="icon-user"></i>
                                                        <span>1.500 {{$satuan}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-right">
                                                <h3 style="color:#004aaa;margin-top:10px;">{{$satuan}} - {{$persen}} %</h3>
                                            </div>
                                        </div>
									@endforeach
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
					<form action="{{ route('data-kegiatan-fisik.store') }}" method="POST" enctype="multipart/form-data">
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
                                            <option value="{{$item->id}}">{{$item->sasaran}}</option>
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
                            <div class="col-sm-3">
                                <div class="form-group">	
                                    <label>Jumah Reaalisasi</label>
                                    <input type="text" name="jumlah" class="form-control" placeholder="">
                                </div> 
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">	
                                    <label>Satuan</label>
                                    <input type="text" name="satuan" class="form-control" placeholder="">
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
                            <div class="col-sm-3">
                                <div class="form-group">	
                                    <label>Jumah Realisasi</label>
                                    <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="">
                                </div> 
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">	
                                    <label>Satuan</label>
                                    <input type="text" name="satuan" id="satuan" class="form-control" placeholder="">
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




</script>
<style>
.selectbox {
    width: 100% !important;
}

</style>
@endsection
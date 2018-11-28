@extends('layouts.master')
@section('title')
    <title>IKU - SIMANDAT</title>
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
    
    @if (Session::has('errors'))
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Oops, terjadi kesalahan. </strong>
				<ul style="font-size:12px;margin-top:5px;">
					@if ($errors->has('tahun'))
						<li> &nbsp; - {{ $errors->first('tahun') }}</li>
					@endif
					@if ($errors->has('id_unit'))
						<li> &nbsp; - {{ $errors->first('id_unit') }}</li>
					@endif
					@if ($errors->has('sasaran'))
						<li> &nbsp; - {{ $errors->first('sasaran') }}</li>
					@endif
					@if ($errors->has('indikator'))
						<li> &nbsp; - {{ $errors->first('indikator') }}</li>
					@endif
					@if ($errors->has('target'))
						<li> &nbsp; - {{ $errors->first('target') }}</li>
					@endif
					@if ($errors->has('anggaran'))
						<li> &nbsp; - {{ $errors->first('anggaran') }}</li>
					@endif
				</ul>
			</div>
		</div>
    @endif
    <div class="col-md-12">
        <a href="" class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#modaltambah">+ Tambah Data</a>
    </div>
	<div class="col-lg-12">
		<!-- Traffic sources -->
        <h6 class="content-group text-semibold">Data IKU</h6>
    </div>
    <div class="col-lg-12">
        
        <div class="panel-group panel-group-control panel-group-control-left content-group-lg" id="accordion-control-left">
                    @foreach ($unit as $item)
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-control-right" href="#accordion-control-right-group1">{{$item->nama_unit}}</a>
                                </h6>
                            </div>
                            <div id="accordion-control-right-group1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <table class="table table-basic table-striped table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tahun</th>
                                                <th>Sasaran</th>
                                                <th>Indikator Kinerja</th>
                                                <th>Target</th>
                                                <th>Anggaran</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                    @php
                                        $no=1;
                                    @endphp
                                    @if ( !isset($iku[str_slug($item->nama_unit)]) )
                                        <tbody>
                                            <tr>
                                                <td colspan="7" class="text-center">Data Belum Tersedia</td>
                                            </tr>
                                        </tbody>
                                    @else
                                        @foreach ($iku[str_slug($item->nama_unit)] as $tm)
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">{{$no}}</td>
                                                    <td class="text-center">{{$tm->tahun}}</td>
                                                    <td>{{$tm->sasaran}}</td>
                                                    <td>{{$tm->indikator}}</td>
                                                    <td>{{rupiah($tm->target)}} {{$tm->satuan}}</td>
                                                    <td class="text-right">Rp.{{rupiah($tm->anggaran)}}</td>
                                                    <td>
                                                        <div style="width:100px;">
                                                            <a class="btn btn-xs btn-info btn-edit" data-toggle="modal" data-target="#modalubah" data-value="{{ $tm->id }}">
                                                                <i class="icon-pencil"></i>
                                                            </a>
                                                            <a href="javascript:modalhapus({{$tm->id}})" class="btn btn-xs btn-danger btn-delete">
                                                                <i class="icon-trash"></i>
                                                            </a> 
                                                        </div>  
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @php
                                            $no++;
                                        @endphp
                                        @endforeach
                                    @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
        </div>
        
    </div>
@endsection
@section('modal')
	<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Data IKU</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('data-iku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">	
                                    <label>Tahun</label>
                                    <input type="text" name="tahun" class="form-control" placeholder="Tahun">
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Unit Kerja</label>
                                    <select name="id_unit" id="" palceholder="Unit" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        @foreach ($unit as $item)
                                            <option value="{{$item->nama_unit}}">{{$item->nama_unit}}</option>
                                        @endforeach
                                    </select>
                                </div>  
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Sasaran</label>
                                    <textarea name="sasaran" class="form-control" placeholder="Sasaran"></textarea>
                                </div> 
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Indikator Kinerja</label>
                                    <textarea name="indikator" class="form-control" placeholder="Indikator Kinerja"></textarea>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">	
                                    <label>Target</label>
                                    <input type="text" name="target" class="form-control" placeholder="Target">
                                </div>  
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">	
                                    <label>Satuan</label>
                                    <input type="text" name="satuan" class="form-control" placeholder="Ex : Jiwa, Rumah, Dll">
                                </div>  
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">	
                                    <label>Anggaran</label>
                                    <input type="text" name="anggaran" class="form-control" placeholder="Rp. xxx.xxx.xxx.xxx">
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
					<h4 class="modal-title">Ubah Data IKU</h4>
				</div>
				<div class="modal-body">
					<form id="form-update" method="POST" enctype="multipart/form-data">
						@csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Unit Kerja</label>
                                    <select name="id_unit" id="id_unit" palceholder="Unit" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        @foreach ($unit as $item)
                                            <option value="{{$item->nama_unit}}">{{$item->nama_unit}}</option>
                                        @endforeach
                                    </select>
                                </div>  
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">	
                                    <label>Tahun</label>
                                    <input type="text" id="tahun" name="tahun" class="form-control" placeholder="Tahun">
                                </div>  
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Sasaran</label>
                                    <textarea name="sasaran" id="sasaran" class="form-control" placeholder="Sasaran"></textarea>
                                </div> 
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">	
                                    <label>Indikator Kinerja</label>
                                    <textarea name="indikator" id="indikator" class="form-control" placeholder="Indikator Kinerja"></textarea>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">	
                                    <label>Target</label>
                                    <input type="text" id="target" name="target" class="form-control" placeholder="Target">
                                </div>  
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">	
                                    <label>Satuan</label>
                                    <input type="text" id="satuan" name="satuan" class="form-control" placeholder="Ex : Jiwa, Rumah, Dll">
                                </div>  
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">	
                                    <label>Anggaran</label>
                                    <input type="text" id="anggaran" name="anggaran" class="form-control" placeholder="Rp. xxx.xxx.xxx.xxx">
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
					<h4 class="modal-title">Konfirmasi Hapus Data IKU</h4>
				</div>
				<div class="modal-body">
                    <h5>Apakah anda yakin akan menghapus data ini?</h5>
                    <input type="hidden" name="iddeleted" id="iddeleted">
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<a class="btn btn-danger btn-hapus" onclick="hapus()" style="cursor:pointer;">Ya, Saya Yakin</a>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footscript')
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
    <script>
        var APP_URL='{{url("/")}}';
        $(".selectbox").selectpicker({
            
        });
        // $('#table').DataTable();
		// binding data to modal edit
        $('#table').on('click', '.btn-edit', function(){
            var id = $(this).data('value')
			var id_unit = $("select#id_unit").selectpicker();
            $.ajax({
                url: "{{ url('data-iku') }}/"+id+"/edit",
                success: function(res) {
					$('#form-update').attr('action', "{{ url('data-iku') }}/"+id)
					$('#tahun').val(res.tahun)
                    $('#sasaran').val(res.sasaran);
                    $('#indikator').val(res.indikator);
                    $('#target').val(res.target);
                    $('#kegiatan').val(res.kegiatan);
                    $('#anggaran').val(res.anggaran);
                    $('#satuan').val(res.satuan);
                    id_unit.selectpicker('val', res.id_unit);
                }
            })
        })

		// delete action
        // $('#table').on('click', '.btn-delete', function(){
        //     var id = $(this).data('value')
        //     // alert(id);
        //     $('#iddeleted').val(2);
		// 	// $('#form-delete').attr('action', "{{ url('data-iku') }}/"+id)			
        // })
        function modalhapus(id)
        {
            $('#modalhapus').modal('show');
            $('#iddeleted').val(id);
        }
        function hapus()
        {
            var id=$('#iddeleted').val();
            location.href=APP_URL+'/data-iku-delete/'+id;
            // alert(id);
        }
    </script>
<style>
.selectbox {
    width: 100% !important;
}

</style>
@endsection
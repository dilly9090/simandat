@extends('layouts.master')
@section('title')
    <title>SDM - SIMANDAT</title>
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
					@if ($errors->has('golongan'))
						<li> &nbsp; - {{ $errors->first('golongan') }}</li>
					@endif
					@if ($errors->has('eselon'))
						<li> &nbsp; - {{ $errors->first('eselon') }}</li>
					@endif
					@if ($errors->has('pangkat'))
						<li> &nbsp; - {{ $errors->first('pangkat') }}</li>
					@endif
					@if ($errors->has('jabatan'))
						<li> &nbsp; - {{ $errors->first('jabatan') }}</li>
					@endif
					@if ($errors->has('nip'))
						<li> &nbsp; - {{ $errors->first('nip') }}</li>
					@endif
					@if ($errors->has('nama_lengkap'))
						<li> &nbsp; - {{ $errors->first('nama_lengkap') }}</li>
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
		<div class="panel panel-flat" style="min-height:350px !important;">
			<div class="panel-heading">
                <h3 class="panel-title">Daftar SDM</h3>   
                
            </div>
            <div class="container-fluid">
                <table class="table table-basic table-striped table-data" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Golongan</th>
                            <th>Pangkat</th>
                            <th>Jabatan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                @php
                    $no=1;
                @endphp
                <tbody>
				@foreach ($sdm as $item)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="text-center"><div style="width:150px;">{{$item->nip}}</div></td>
                            <td><div style="font-weight: 600;font-size:14px;">{{$item->nama_lengkap}}</div></td>
                            <td><div style="font-weight: 600;font-size:14px;">{{$item->golongan}}</div></td>
                            <td><div style="font-weight: 600;font-size:14px;">{{$item->pangkat}}</div></td>
                            <td><div style="font-weight: 600;font-size:14px;">{{$item->jabatan}}</div></td>
                            <td>
                                <div style="width:100px">
                                    <a class="btn btn-xs btn-info btn-edit" data-toggle="modal" data-target="#modalubah" data-value="{{ $item->id }}">
                                        <i class="icon-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-target="#modalhapus" data-value="{{ $item->id }}">
                                        <i class="icon-trash"></i>
                                    </a> 
                                </div>  
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
@endsection
@section('modal')
	<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Data SDM</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('sdm.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">	
                                    <label>NIP</label>
                                    <input type="text" name="nip" class="form-control" placeholder="NIP">
                                </div>  
                                <div class="form-group">	
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                </div>  
                                <div class="form-group">	
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                </div>  
                                <div class="form-group">	
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar5"></i></span>
										<input type="text" name="tanggal_lahir" class="form-control pickadate" placeholder="Tanggal Lahir">
									</div>
                                </div>  
                                <div class="form-group">	
                                    <label>Gender</label>
                                    <select name="jenis_kelamin" id="" palceholder="Gender" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="0">Perempuan</option>
                                        
                                    </select>
                                </div>  
                                <div class="form-group">	
                                    <label>Agama</label>
                                    <select name="agama" id="" palceholder="Agama" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghuchu">Konghuchu</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div> 
                                <div class="form-group">	
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">	
                                    <label>Eselon</label>
                                    <select name="eselon" id="" palceholder="Eselon" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        
                                    </select>
                                </div>  
                                <div class="form-group">	
                                    <label>Golongan</label>
                                    <input type="text" name="golongan" class="form-control" placeholder="Golongan">
                                </div>
                                <div class="form-group">	
                                    <label>Pangkat</label>
                                    <input type="text" name="pangkat" class="form-control" placeholder="Pangkat">
                                </div>
                                <div class="form-group">	
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                                </div>
                                
                                <div class="form-group">	
                                    <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="icon-search4"></i>
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="foto">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                                <div class="form-group">	
                                    <label>Status Pegawai</label>
                                    <input type="text" name="status_pegawai" class="form-control" placeholder="Status Pegawai">
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
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Ubah Data SDM</h4>
				</div>
				<div class="modal-body">
					<form id="form-update" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">	
                                    <label>NIP</label>
                                    <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP">
                                </div>  
                                <div class="form-group">	
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                </div>  
                                <div class="form-group">	
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                </div>  
                                <div class="form-group">	
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar5"></i></span>
										<input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control pickadate" placeholder="Tanggal Lahir">
									</div>
                                </div>  
                                <div class="form-group">	
                                    <label>Gender</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" palceholder="Gender" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="0">Perempuan</option>
                                        
                                    </select>
                                </div>  
                                <div class="form-group">	
                                    <label>Agama</label>
                                    <select name="agama" id="agama" palceholder="Agama" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghuchu">Konghuchu</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>  
                                <div class="form-group">	
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">	
                                    <label>Eselon</label>
                                    <select name="eselon" id="eselon" palceholder="Eselon" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        
                                    </select>
                                </div> 
                                <div class="form-group">	
                                    <label>Golongan</label>
                                    <input type="text" name="golongan" id="golongan" class="form-control" placeholder="Golongan">
                                </div>
                                <div class="form-group">	
                                    <label>Pangkat</label>
                                    <input type="text" name="pangkat" id="pangkat" class="form-control" placeholder="Pangkat">
                                </div>
                                <div class="form-group">	
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan">
                                </div>
                                
                                <div class="form-group">	
                                    <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm_id" data-input="thumbnail_id" data-preview="holder_id" class="btn btn-primary">
                                        <i class="icon-search4"></i>
                                        </a>
                                    </span>
                                    <input id="thumbnail_id" class="form-control" type="text" name="foto">
                                    </div>
                                    <img id="holder_id" style="margin-top:15px;max-height:100px;">
                                </div>
                                <div class="form-group">	
                                    <label>Status Pegawai</label>
                                    <input type="text" name="status_pegawai" id="status_pegawai" class="form-control" placeholder="Status Pegawai">
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
					<h4 class="modal-title">Konfirmasi Hapus Data SDM</h4>
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
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
    <script>
    $(document).ready(function(){
        $('#lfm').filemanager('image', {prefix: '{{url("/")}}/laravel-filemanager'});
        $('#lfm_id').filemanager('image', {prefix: '{{url("/")}}/laravel-filemanager'});
        
        $('#table').DataTable();
        $(".selectbox").selectpicker({
            
        });
        $(".pickadate").pickadate({
            format : 'dd-mm-yyyy',
            formatSubmit: 'yyyy-mm-dd',
            selectMonths: true,
            selectYears: true,
            min: [1950,1,1],
            max: [2010,12,31],
            selectYears: 40
        });
		// binding data to modal edit
        $('#table').on('click', '.btn-edit', function(){
            var id = $(this).data('value')
			var jk = $("select#jenis_kelamin").selectpicker();
			var agm = $("select#agama").selectpicker();
			var eselon = $("select#eselon").selectpicker();
            $.ajax({
                url: "{{ url('sdm') }}/"+id+"/edit",
                success: function(res) {
					$('#form-update').attr('action', "{{ url('sdm') }}/"+id)
					$('#nip').val(res.nip);
                    $('#nama_lengkap').val(res.nama_lengkap);
                    $('#tempat_lahir').val(res.tempat_lahir);
                    if(res.tanggal_lahir!=null)
                    {
                        var tgl=(res.tanggal_lahir).split('-');
                        $('#tanggal_lahir').val(tgl[2]+'-'+tgl[1]+'-'+tgl[0]);
                    }
                    
                    $('#thumbnail_id').val(res.foto);
                    $('#holder_id').attr('src','{{url("/")}}'+res.foto);
                    
                    jk.selectpicker('val', res.jenis_kelamin);
                    agm.selectpicker('val', res.agama);
                    eselon.selectpicker('val', res.eselon);
                    
                    $('#golongan').val(res.golongan);
                    $('#pangkat').val(res.pangkat);
                    $('#jabatan').val(res.jabatan);
                    $('#status_pegawai').val(res.status_pegawai);
                    $('#alamat').val(res.alamat);

                    $("#tanggal_lahir").pickadate({
                        format : 'dd-mm-yyyy',
                        formatSubmit: 'yyyy-mm-dd',
                        selectMonths: true,
                        selectYears: true,
                        min: [1950,1,1],
                        max: [2010,12,31],
                        selectYears: 40
                    });
                }
            })
        })

		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('sdm') }}/"+id)			
        })
        
    });
    </script>
<style>
.selectbox {
    width: 100% !important;
}

</style>
@endsection
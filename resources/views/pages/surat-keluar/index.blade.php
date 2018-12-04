@extends('layouts.master')
@section('title')
    <title>Surat Keluar - SIMANDAT</title>
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
            <li><a href="{{url('/')}}"><i class="icon-home2 position-left"></i> Home</a></li>
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
                <h3 class="panel-title">Daftar Surat Keluar</h3>   
                
            </div>
            <div class="container-fluid">
                <table class="table table-basic table-striped table-data" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Agenda</th>
                            <th>Nomor Surat</th>
                            <th>Perihal</th>
                            <th>Tanggal Keluar</th>
                            <th>Tanggal Surat</th>
                            <th>Asal/Tujuan</th>
                            <th>Isi Ringkas</th>
                            <th>#</th>
                        </tr>
                    </thead>
                @php
                    $no=1;
                @endphp
                <tbody>
				@foreach ($data as $item)
                        <tr>
                            <td class="">{{$no}}</td>
                            <td class="">{{$item->no_agenda}}</td>
                            <td class="">{{$item->no_surat}}</td>
                            <td class="">{{$item->perihal}}</td>
                            <td class="">{{date('d/m/Y',strtotime($item->tgl_keluar))}}</td>
                            <td class="">{{date('d/m/Y',strtotime($item->tgl_surat))}}</td>
                            <td class="">Asal : {{$item->asal_surat}}<br>Tujuan : {{$item->tujuan}}</td>
                            <td class="">{{$item->isi_ringkas}}</td>
                            <td class="">
                                
                                    <div style="width:150px">
                                    <a href="{{url('surat-keluar/'.$item->id)}}" class="btn btn-xs btn-flat border-info text-info btn-delete btn-rounded btn-icon">
                                        <i class="icon-share2"></i>
                                    </a> 
                                    <a href="{{url('unduh-file/'.$item->file)}}" class="btn btn-success btn-xs btn-rounded btn-icon"><i class="icon-search4"></i></a>    
                                    <a class="btn btn-xs btn-info btn-edit btn-rounded btn-icon" data-toggle="modal" data-target="#modalubah" data-value="{{ $item->id }}">
                                        <i class="icon-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-xs btn-danger btn-delete btn-rounded btn-icon" data-toggle="modal" data-target="#modalhapus" data-value="{{ $item->id }}">
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
					<form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">	
                                    <label>Nomor Agenda</label>
                                    <input type="text" value="{{$no_agenda}}" name="no_agenda" id="" class="form-control" placeholder="Nomor Agenda">
                                </div>  
                                <div class="form-group">	
                                    <label>Nomor Surat</label>
                                    <input type="text" name="no_surat" class="form-control" placeholder="Nomor Surat">
                                </div>  
                                <div class="form-group">	
                                    <label>Perihal</label>
                                    <input type="text" name="perihal" class="form-control" placeholder="Perihal">
                                </div>  
                                <div class="form-group">	
                                    <label>Asal Surat</label>
                                    <input type="text" name="asal_surat" class="form-control" placeholder="Asal Surat">
                                </div>  
                                <div class="form-group">	
                                    <label>Tanggal Surat</label>
                                    <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar5"></i></span>
										<input type="text" name="tgl_surat" class="form-control pickadate" placeholder="Tanggal Surat">
									</div>
                                </div>  
                                <div class="form-group">	
                                    <label>Tanggal Keluar</label>
                                    <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar5"></i></span>
                                        <input type="text" name="tgl_keluar" class="form-control pickadate" value="{{date('d-m-Y')}}" placeholder="Tanggal Keluar">
									</div>
                                </div>  
                               
                               
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">	
                                    <label>Isi Ringkas</label>
                                    <textarea name="isi_ringkas" class="form-control" placeholder="Isi Ringkas"></textarea>
                                </div>  
                                <div class="form-group">	
                                    <label>Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control" placeholder="Tujuan">
                                </div>
                                <div class="form-group">	
                                    <label>Upload File</label>
                                    <input type="file" name="file" class="form-control" placeholder="Upload">
                                </div>
                                <div class="form-group">	
                                    <label>Lampiran</label>
                                    <textarea name="lampiran" class="form-control" placeholder="Lampiran"></textarea>
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
                                    <label>Nomor Agenda</label>
                                    <input type="text" readonly name="no_agenda" id="no_agenda" class="form-control" placeholder="Nomor Agenda">
                                </div>  
                                <div class="form-group">	
                                    <label>Nomor Surat</label>
                                    <input type="text" name="no_surat" id="no_surat" class="form-control" placeholder="Nomor Surat">
                                </div>  
                                <div class="form-group">	
                                    <label>Perihal</label>
                                    <input type="text" name="perihal"  id="perihal" class="form-control" placeholder="Perihal">
                                </div>  
                                <div class="form-group">	
                                    <label>Asal Surat</label>
                                    <input type="text" name="asal_surat" id="asal_surat" class="form-control" placeholder="Asal Surat">
                                </div>  
                                <div class="form-group">	
                                    <label>Tanggal Surat</label>
                                    <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar5"></i></span>
										<input type="text" name="tgl_surat" id="tgl_surat" class="form-control pickadate" placeholder="Tanggal Surat">
									</div>
                                </div>  
                                <div class="form-group">	
                                    <label>Tanggal Keluar</label>
                                    <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar5"></i></span>
										<input type="text" name="tgl_keluar" id="tgl_keluar" class="form-control pickadate" placeholder="Tanggal Keluar">
									</div>
                                </div>  
                               
                               
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">	
                                    <label>Isi Ringkas</label>
                                    <textarea name="isi_ringkas" id="isi_ringkas" class="form-control" placeholder="Isi Ringkas"></textarea>
                                </div>  
                                <div class="form-group">	
                                    <label>Tujuan</label>
                                    <input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Tujuan">
                                </div>
                                <div class="form-group">	
                                    <label>Upload File</label>
                                    <input type="file" name="file" id="file" class="form-control" placeholder="Upload">
                                </div>
                                <div class="form-group">
                            	
                                    <label>Lampiran</label>
                                    <textarea name="lampiran" id="lampiran" class="form-control" placeholder="Lampiran"></textarea>
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
        });
		// binding data to modal edit
        $('#table').on('click', '.btn-edit', function(){
            var id = $(this).data('value')
			$.ajax({
                url: "{{ url('surat-keluar') }}/"+id+"/edit",
                success: function(res) {
					$('#form-update').attr('action', "{{ url('surat-keluar') }}/"+id)
					$('#nip').val(res.nip);
                    if(res.tgl_keluar!=null)
                    {
                        var tgl=(res.tgl_keluar).split('-');
                        $('#tgl_keluar').val(tgl[2]+'-'+tgl[1]+'-'+tgl[0]);
                    }
                    if(res.tgl_surat!=null)
                    {
                        var tgl=(res.tgl_surat).split('-');
                        $('#tgl_surat').val(tgl[2]+'-'+tgl[1]+'-'+tgl[0]);
                    }
                    
                    $('#no_surat').val(res.no_surat);
                    $('#perihal').val(res.perihal);
                    $('#asal_surat').val(res.asal_surat);
                    $('#tgl_surat').val(res.tgl_surat);
                    $('#tgl_keluar').val(res.tgl_keluar);
                    $('#isi_ringkas').val(res.isi_ringkas);
                    $('#tujuan').val(res.tujuan);
                    $('#lampiran').val(res.lampiran);
                    $('#no_agenda').val(res.no_agenda);

                    $("#tgl_surat").pickadate({
                        format : 'dd-mm-yyyy',
                        formatSubmit: 'yyyy-mm-dd',
                        selectMonths: true,
                        selectYears: true,
                    });
                    $("#tgl_keluar").pickadate({
                        format : 'dd-mm-yyyy',
                        formatSubmit: 'yyyy-mm-dd',
                        selectMonths: true,
                        selectYears: true,
                    });
                }
            })
        })

		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('surat-keluar') }}/"+id)			
        })
        
    });
    </script>
<style>
.selectbox {
    width: 100% !important;
}

</style>
@endsection
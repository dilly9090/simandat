@extends('layouts.master')
@section('title')
    <title>Sarana Prasarana - SIMANDAT</title>
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
					@if ($errors->has('jenis'))
						<li> &nbsp; - {{ $errors->first('jenis') }}</li>
					@endif
					@if ($errors->has('kode'))
						<li> &nbsp; - {{ $errors->first('kode') }}</li>
					@endif
					@if ($errors->has('satuan'))
						<li> &nbsp; - {{ $errors->first('satuan') }}</li>
					@endif
					@if ($errors->has('jumlah'))
						<li> &nbsp; - {{ $errors->first('jumlah') }}</li>
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
                <h3 class="panel-title">Daftar Sarana Prasarana</h3>   
                
            </div>
            <div class="container-fluid">
                <table class="table table-basic table-striped" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode</th>
                            <th>Jenis Sarana Prasarana</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                @php
                    $no=1;
                @endphp
				@foreach ($sarpras as $item)
                    <tbody>
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="text-center">{{$item->kode}}</td>
                            <td><div style="font-weight: 600;font-size:14px;">{{$item->jenis}}</div></td>
                            <td><div style="font-weight: 600;font-size:14px;">{{$item->jumlah}}</div></td>
                            <td><div style="font-weight: 600;font-size:14px;">{{$item->satuan}}</div></td>
                            <td>
                                <a class="btn btn-xs btn-info btn-edit" data-toggle="modal" data-target="#modalubah" data-value="{{ $item->id }}">
									<i class="icon-pencil"></i>
								</a>
								<a href="#" class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-target="#modalhapus" data-value="{{ $item->id }}">
									<i class="icon-trash"></i>
								</a>   
                            </td>
                        </tr>
                    </tbody>
                @php
                    $no++;
                @endphp
                @endforeach
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
					<h4 class="modal-title">Tambah Data Sarana Prasarana</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('sarpras.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">	
                            <label>Kode</label>
                            <input type="text" name="kode" class="form-control" placeholder="Kode">
                        </div>  
						<div class="form-group">	
                            <label>Jenis Sarpras</label>
                            <input type="text" name="jenis" class="form-control" placeholder="Sarana Prasarana">
                        </div>  
						<div class="form-group">	
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah">
                        </div>  
						<div class="form-group">	
                            <label>Satuan</label>
                            <input type="text" name="satuan" class="form-control" placeholder="Satuan">
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
					<h4 class="modal-title">Ubah Data Sarana Prasarana</h4>
				</div>
				<div class="modal-body">
					<form id="form-update" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">	
                            <label>Kode</label>
                            <input type="text" name="kode" class="form-control" placeholder="Kode" id="kode_id">
                        </div>  
						<div class="form-group">	
                            <label>Jenis Sarpras</label>
                            <input type="text" name="jenis" class="form-control" placeholder="Sarana Prasarana" id="jenis_id">
                        </div>  
						<div class="form-group">	
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" id="jumlah_id">
                        </div>  
						<div class="form-group">	
                            <label>Satuan</label>
                            <input type="text" name="satuan" class="form-control" placeholder="Satuan" id="satuan_id">
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
					<h4 class="modal-title">Konfirmasi Hapus Data Sarana Prasarana</h4>
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
    <script>
        $('#table').DataTable();
		// binding data to modal edit
        $('#table').on('click', '.btn-edit', function(){
            var id = $(this).data('value')
			
            $.ajax({
                url: "{{ url('sarpras') }}/"+id+"/edit",
                success: function(res) {
					$('#form-update').attr('action', "{{ url('sarpras') }}/"+id)
					$('#deskripsi').val(res.deskripsi)
					$('#kode_id').val(res.kode);
                    $('#jenis_id').val(res.jenis);
                    $('#jumlah_id').val(res.jumlah);
                    $('#satuan_id').val(res.satuan);
                }
            })
        })

		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('sarpras') }}/"+id)			
        })
	</script>
@endsection
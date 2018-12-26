@extends('layouts.master')
@section('title')
    <title>Regulasi - SIMANDAT</title>
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
                <h3 class="panel-title">
                    Daftar Regulasi</h3>      
            </div>
            <div class="container-fluid">
                <table class="table table-basic">
                    <thead>
                        <tr>
                            <th class="text-center">Kode</th>
                            <th>#</th>
                            <th>Jenis Regulasi</th>
                            <th>Urutan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
				@foreach ($regulasi as $item)
                    <tbody>
                        <tr>
                            <td class="text-center">{{$item->code}}</td>
                            <td class="text-left"><a href="{{url('unduh-file/'.$item->file)}}"><i class="icon-download" style="cursor:pointer"></i></a></td>
                            <td><div style="font-weight: 600;font-size:14px;">{{$item->title}}</div></td>
                            <td>
                                <div style="font-weight: 600;font-size:14px;cursor:pointer;color:blue" onclick="urutan({{$item->id}},{{$item->urutan}})">{{$item->urutan}}</div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-target="#modalhapus" data-value="{{ $item->id }}">
                                        <i class="icon-trash"></i>
                                    </a> 
                            </td>
                        </tr>
                    </tbody>
                @endforeach
                </table>
            </div>
        </div>
    </div>
	

</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-flat">	
            <div class="container-fluid" style="padding-top:20px;">
                <div class="row">
                    <form class="form-vertical" action="{{url('regulasi')}}" method="POST" enctype="multipart/form-data">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Kode:</label>
                                <input type="text" name="kode" class="form-control" placeholder="Kode" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nama Regulasi:</label>
                                <input type="text" name="title" class="form-control" placeholder="Nama Regulasi" required>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label>Urutan:</label>
                                <input type="text" name="urutan" class="form-control" placeholder="Urutan">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>File:</label>
                                <div>
                                    <input type="file" class="form-control" name="file">
                                </div>
                            </div>
                        </div>
                        @csrf
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>&nbsp;<br></label>
                                <button type="submit" class="form-control btn bg-teal-400 btn-labeled btn-rounded legitRipple"><b><i class="icon-floppy-disk"></i></b> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footscript')
<div class="modal fade" id="modalurutan" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Hapus Data SDM</h4>
				</div>
				<div class="modal-body">
					<form id="form-update" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
                            <div class="col-md-6">
                                
                                <div class="form-group">	
                                    <label>Urutan</label>
                                    <input type="text" name="urutan" id="urutan" class="form-control" placeholder="urutan">
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
					<h5>Apakah anda yakin akan menghapus data Regulasi ini?</h5>
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
<script>
    function urutan(id,urutan)
    {
        $('#form-update').attr('action', "{{ url('editurutan') }}/"+id)
        $('#urutan').val(urutan);
        $('#modalurutan').modal('show');
    }
    $(document).ready(function(){
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('regulasi') }}/"+id)			
        })
    });
</script>
@endsection
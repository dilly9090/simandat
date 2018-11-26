@extends('layouts.master')
@section('title')
    <title>Data User - SIMANDAT</title>
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
            <li class="active">Master Data User</li>
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
					@if ($errors->has('name'))
						<li> &nbsp; - {{ $errors->first('name') }}</li>
					@endif
					@if ($errors->has('email'))
						<li> &nbsp; - {{ $errors->first('email') }}</li>
					@endif
					@if ($errors->has('flag'))
						<li> &nbsp; - {{ $errors->first('flag') }}</li>
					@endif
					@if ($errors->has('level'))
						<li> &nbsp; - {{ $errors->first('level') }}</li>
					@endif
					@if ($errors->has('password'))
						<li> &nbsp; - {{ $errors->first('password') }}</li>
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
                <h3 class="panel-title">Daftar Unit</h3>   
                
            </div>
            <div class="container-fluid">
                <table class="table table-basic table-striped" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>
                @php
                    $no=1;
                @endphp
				@foreach ($user as $item)
                    <tbody>
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="text-center">{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$level[$item->level]}}</td>
                            <td>
                            @if ($item->flag==1)
                                <span class="label label-info">Aktif</span>
                            @else
                                <span class="label label-danger">Tidak Aktif</span>
                            @endif    
                            </td>
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
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Data User</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('master-user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">	
                                    <label>Nama</label>
                                    <select name="name" id="" palceholder="Nama" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        @foreach($sdm  as $k =>$v)
                                            <option value="{{$v->nama_lengkap}}">{{$v->nip}} - {{$v->nama_lengkap}}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="form-group">	
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>  
                                <div class="form-group">	
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control" placeholder="Password">
                                </div>  
                                <div class="form-group">	
                                    <label>Status</label>
                                    <select name="flag" id="" palceholder="Status" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                        
                                    </select>
                                </div>  
                                <div class="form-group">	
                                    <label>Level</label>
                                    <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar5"></i></span>
										<select name="level" id="" palceholder="Level" class="selectbox" style="">
                                            <option>- Pilih -</option>
                                            @foreach($level  as $k =>$v)
                                                <option value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
									</div>
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
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Ubah Data User</h4>
				</div>
				<div class="modal-body">
					<form id="form-update" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">	
                                    <label>Nama</label>
                                    <select name="name" id="name" palceholder="Nama" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        @foreach($sdm  as $k =>$v)
                                            <option value="{{$v->nama_lengkap}}">{{$v->nip}} - {{$v->nama_lengkap}}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="form-group">	
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                </div>  
                                <div class="form-group">	
                                    <label>Password (* Kosongkan jika tidak diganti)</label>
                                    <input type="text" name="password" class="form-control" placeholder="Password">
                                </div> 
                                <div class="form-group">	
                                    <label>Status</label>
                                    <select name="flag" id="flag" palceholder="Status" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                        
                                    </select>
                                </div>  
                                <div class="form-group">	
                                    <label>Level</label>
                                    <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar5"></i></span>
										<select name="level" id="level" palceholder="Level" class="selectbox" style="">
                                            <option>- Pilih -</option>
                                            @foreach($level  as $k =>$v)
                                                <option value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
									</div>
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
					<h4 class="modal-title">Konfirmasi Hapus Data User</h4>
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
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
    <script>
    $(document).ready(function(){
        $('#table').DataTable();
        $(".selectbox").selectpicker({
            
        });
    	// binding data to modal edit
        $('#table').on('click', '.btn-edit', function(){
            var id = $(this).data('value')
			var name = $("select#name").selectpicker();
			var flag = $("select#flag").selectpicker();
			var level = $("select#level").selectpicker();
            $.ajax({
                url: "{{ url('master-user') }}/"+id+"/edit",
                success: function(res) {
					$('#form-update').attr('action', "{{ url('master-user') }}/"+id)
					$('#email').val(res.email);
                    name.selectpicker('val', res.name);
                    flag.selectpicker('val', res.flag);
                    level.selectpicker('val', res.level);
                   
                }
            })
        })

		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('master-user') }}/"+id)			
        })
        
    });
    </script>
<style>
.selectbox {
    width: 100% !important;
}

</style>
@endsection
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
                        </tr>
                    </thead>
				@foreach ($regulasi as $item)
                    <tbody>
                        <tr>
                            <td class="text-center">{{$item->code}}</td>
                            <td class="text-left"><a href="{{url('unduh-file/'.$item->file)}}"><i class="icon-download" style="cursor:pointer"></i></a></td>
                            <td><div style="font-weight: 600;font-size:14px;">{{$item->title}}</div></td>
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
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Nama Regulasi:</label>
                                <input type="text" name="title" class="form-control" placeholder="Nama Regulasi" required>
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
@endsection
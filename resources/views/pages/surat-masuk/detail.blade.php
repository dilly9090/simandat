@extends('layouts.master')
@section('title')
    <title>Detail Surat Masuk - SIMANDAT</title>
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
			<div class="alert alert-danger alert-dismissible" role="alert" style="padding-right:20px;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Oops, terjadi kesalahan. </strong>
				<ul style="font-size:12px;margin-top:5px;">
						<li> &nbsp; - {{ Session::get('errors') }}</li>
				</ul>
			</div>
		</div>
    @endif
    @if (Session::has('success'))
		<div class="col-md-12">
			<div class="alert alert-info alert-dismissible" role="alert" style="padding-right:20px;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Berhasil. </strong>
				 &nbsp; - {{ Session::get('success') }}</li>
				
			</div>
		</div>
    @endif
    <div class="col-md-12">
        <a href="{{url('surat-masuk')}}" class="btn btn-xs btn-success pull-right">< Kembali</a>
    </div>
	<div class="col-lg-12">
		<!-- Traffic sources -->
		<div class="panel panel-flat" style="min-height:350px !important;">
			<div class="panel-heading">
                <h3 class="panel-title">Detail Surat Masuk</h3>    
            </div>
            <div class="container-fluid" style="padding:0 20px;">
                <form action="#">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">	
                                    <label>Nomor Agenda</label>
                                    <input type="text" readonly value="{{$surat->no_agenda}}" name="no_agenda" id="" class="form-control" placeholder="Nomor Agenda">
                                </div>  
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">	
                                    <label>Nomor Surat</label>
                                    <input type="text" readonly value="{{$surat->no_surat}}" name="no_surat" id="" class="form-control" placeholder="Nomor Surat">
                                </div>  
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">	
                                    <label>Tanggal Surat</label>
                                    <input type="text" readonly value="{{date('d/m/Y/',strtotime($surat->tgl_surat))}}" name="tgl_surat" id="" class="form-control" placeholder="Tanggal Surat">
                                </div>  
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">	
                                    <label>Tanggal Masuk</label>
                                    <input type="text" readonly value="{{date('d/m/Y/',strtotime($surat->tgl_masuk))}}" name="tgl_masuk" id="" class="form-control" placeholder="Tanggal Masuk">
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">	
                                    <label>Perihal</label>
                                    <input type="text" readonly value="{{$surat->perihal}}" name="perihal" id="" class="form-control" placeholder="Perihal">
                                </div>  
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">	
                                    <label>Asal Surat</label>
                                    <input type="text" readonly value="{{$surat->asal_surat}}" name="asal_surat" id="" class="form-control" placeholder="Asal Surat">
                                </div>  
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">	
                                    <label>Tujuan Surat</label>
                                    <input type="text" readonly value="{{($surat->tujuan)}}" name="tujuan" id="" class="form-control" placeholder="Tujuan Surat">
                                </div>  
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">	
                                    <label>Lampiran</label>
                                    <input type="text" readonly value="{{($surat->lampiran)}}" name="lampiran" id="" class="form-control" placeholder="Lampiran">
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">	
                                    <label>Isi Ringkas</label>
                                    <input type="text" readonly value="{{$surat->isi_ringkas}}" name="isi_ringkas" id="" class="form-control" placeholder="Isi Ringkas">
                                </div>  
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">	
                                    <label>File</label>
                                    <br>
                                    <a href="{{url('unduh-file/'.$surat->file)}}" class="btn btn-success btn-xs btn-rounded btn-icon"><i class="icon-search4"></i></a>
                                </div>  
                            </div>
                        </div>
                </form>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title">Disposisi</h3>    
            </div>
            <div class="container-fluid" style="padding:0 20px;">
                <form action="{{url("disposisi-surat-masuk")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <input type="hidden" name="idsurat" value="{{$id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">	
                                    <label>Disposisi Direktur</label>
                                    <textarea name="disposisi_direktur" class="form-control" placeholder="Disposisi Direktur">{{isset($disposisi['direktur']) ? $disposisi['direktur']->instruksi : ''}}</textarea>
                                </div> 
                                 <div class="form-group">	
                                    <label>File Disposisi</label>
                                    <input type="file" name="file_disposisi_direktur">
                                    @if (isset($disposisi['direktur']))
                                        <br>
                                        <a href="{{url('unduh-file/'.$disposisi['direktur']->indeks)}}" class="btn btn-info btn-xs btn-rounded btn-icon"><i class="icon-search4"></i> Lihat File Disposisi</a>
                                    @endif
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">	
                                    <label>Disposisi Kasubdit</label>
                                    <textarea name="disposisi_kasubdit" class="form-control" placeholder="Disposisi Kasubdit">{{isset($disposisi['kasubdit']) ? $disposisi['kasubdit']->instruksi : ''}}</textarea>
                                </div>
                                <div class="form-group">	
                                    <label>File Disposisi</label>
                                    <input type="file" name="file_disposisi_kasubdit">
                                    @if (isset($disposisi['kasubdit']))
                                        <br>
                                        <a href="{{url('unduh-file/'.$disposisi['kasubdit']->indeks)}}" class="btn btn-info btn-xs btn-rounded btn-icon"><i class="icon-search4"></i>Lihat File Disposisi</a>
                                    @endif
                                </div> 
                            </div>
                            <div class="row form-actions" style="padding:20px;">
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-success" value="Simpan Disposisi">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
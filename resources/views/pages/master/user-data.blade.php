<form id="form-update-detail" method="POST" enctype="multipart/form-data" action="{{url('user-data-detail-simpan/'.$id)}}">
    @csrf
	<div class="row">
        <div class="col-md-6">
            <div class="form-group">	
                <label>NIP</label>
                <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP" value="{{$id!=-1 ? $detail->nip : ''}}">
                <input type="hidden" name="id_user" id="id_user" class="form-control" placeholder="NIP" value="{{$user->id}}">
            </div>  
            <div class="form-group">	
                <label>Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{$user->email}}">
            </div>  
            <div class="form-group">	
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{$user->name}}">
            </div>  
            <div class="form-group">	
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="{{$id!=-1 ? $detail->tempat_lahir : ''}}">
            </div>  
            <div class="form-group">	
                <label>Tanggal Lahir</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                    <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control pickadate" placeholder="Tanggal Lahir" value="{{$id!=-1 ? date('d-m-Y',strtotime($detail->tanggal_lahir)) : ''}}">
                </div>
            </div>  
            <div class="form-group">	
                <label>Gender</label>
                <select name="jenis_kelamin" id="jenis_kelamin" palceholder="Gender" class="selectbox" style="">
                    <option>- Pilih -</option>
                    <option value="1" {{$id!=-1 ? ($detail->jenis_kelamin==1 ? 'selected="selected"' : '') :''}}>Laki-Laki</option>
                    <option value="0" {{$id!=-1 ? ($detail->jenis_kelamin==0 ? 'selected="selected"' : '') :''}}>Perempuan</option>
                    
                </select>
            </div>  
            <div class="form-group">	
                <label>Agama</label>
                <select name="agama" id="agama" palceholder="Agama" class="selectbox" style="">
                    <option>- Pilih -</option>
                    <option {{$id!=-1 ? ($detail->agama=='Islam' ? 'selected="selected"' : '') : ''}} value="Islam">Islam</option>
                    <option {{$id!=-1 ? ($detail->agama=='Katolik' ? 'selected="selected"' : '') : ''}} value="Katolik">Katolik</option>
                    <option {{$id!=-1 ? ($detail->agama=='Protestan' ? 'selected="selected"' : '') : ''}} value="Protestan">Protestan</option>
                    <option {{$id!=-1 ? ($detail->agama=='Budha' ? 'selected="selected"' : '') : ''}} value="Budha">Budha</option>
                    <option {{$id!=-1 ? ($detail->agama=='Hindu' ? 'selected="selected"' : '') : ''}} value="Hindu">Hindu</option>
                    <option {{$id!=-1 ? ($detail->agama=='Konghuchu' ? 'selected="selected"' : '') : ''}} value="Konghuchu">Konghuchu</option>
                    <option {{$id!=-1 ? ($detail->agama=='Lainnya' ? 'selected="selected"' : '') : ''}} value="Lainnya">Lainnya</option>
                </select>
            </div>  
            <div class="form-group">	
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat">{{$id!=-1 ? $detail->alamat : ''}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">	
                <label>Eselon</label>
                <select name="eselon" id="eselon" palceholder="Eselon" class="selectbox" style="">
                    <option>- Pilih -</option>
                    <option value="1" {{$id!=-1 ? ($detail->eselon==1 ? 'selected="selected"' : '') : ''}}>1</option>
                    <option value="2" {{$id!=-1 ? ($detail->eselon==2 ? 'selected="selected"' : '') : ''}}>2</option>
                    <option value="3" {{$id!=-1 ? ($detail->eselon==3 ? 'selected="selected"' : '') : ''}}>3</option>
                    <option value="4" {{$id!=-1 ? ($detail->eselon==4 ? 'selected="selected"' : '') : ''}}>4</option>
                    
                </select>
            </div> 
            <div class="form-group">	
                <label>Golongan</label>
                <input type="text" name="golongan" id="golongan" class="form-control" placeholder="Golongan" value="{{$id!=-1 ? $detail->golongan : ''}}">
            </div>
            <div class="form-group">	
                <label>Pangkat</label>
                <input type="text" name="pangkat" id="pangkat" class="form-control" placeholder="Pangkat" value="{{$id!=-1 ? $detail->pangkat : ''}}">
            </div>
            <div class="form-group">	
                <label>Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan" value="{{$id!=-1 ? $detail->jabatan : ''}}">
            </div>
            <div class="form-group">	
                <label>Asal Instansi</label>
                <input type="text" name="kedudukan" id="kedudukan" class="form-control" placeholder="Asal Instansi" value="{{$id!=-1 ? $detail->kedudukan : ''}}">
            </div>
            <div class="form-group">	
                <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="icon-search4"></i>
                    </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="foto" value="{{$id!=-1 ? $detail->foto : ''}}">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$id!=-1 ? asset($detail->foto) : ''}}">
            </div>
            <div class="form-group">	
                <label>Status Pegawai</label>
                <input type="text" name="status_pegawai" id="status_pegawai" class="form-control" placeholder="Status Pegawai" value="{{$id!=-1 ? $detail->status_pegawai : ''}}">
            </div>
            
        </div>
    </div> 
</form>
				

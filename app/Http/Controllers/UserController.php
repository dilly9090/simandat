<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Sdm;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::where('flag',1)->with('sdm')->get();
        $us=array();
        foreach($user as $k=>$v)
        {
            $us[]=$v->email;
        }
        $sdm=Sdm::orderBy('nama_lengkap')->get();
        $level=level();
        return view('pages.master.user')->with('user',$user)->with('sdm',$sdm)->with('level',$level)->with('us',$us);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'flag' => 'required',
            'level' => 'required'
        ])->validate();

        $sdm=Sdm::where('nama_lengkap','=',$request->name)->first();

        $insert=new User;
        $insert->name = $request->name;
        $insert->id_sdm = $sdm->id;
        $insert->email = $request->email;
        $insert->password = bcrypt($request->password);
        $insert->flag = $request->flag;
        $insert->level = $request->level;
        $insert->save();

        return redirect('master-user')->with('success','Data User Berhasil Di Tambah');
    }

    
    public function edit($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'flag' => 'required',
            'level' => 'required'
        ])->validate();

        $sdm=Sdm::where('nama_lengkap','=',$request->name)->first();

        $insert=User::find($id);
        $insert->name = $request->name;
        $insert->email = $request->email;
        
        if(!is_null)
            $insert->id_sdm = $sdm->id;

        if($request->password!='')
            $insert->password = bcrypt($request->password);
        
        $insert->flag = $request->flag;
        $insert->level = $request->level;
        $insert->save();

        return redirect('master-user')->with('success','Data User Berhasil Di Perbaharui');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('master-user.index')
            ->with('success', 'Anda telah menghapus data.');
    }

    public function user_data_detail($iduser)
    {
        $user=User::find($iduser);
        $detail=Sdm::where('id',$user->id_sdm)->orWhere('email',$user->email)->first();
        if($detail)
            $id=$detail->id;
        else
            $id=-1;
        
        // dd($id);
        return view('pages.master.user-data')->with('user',$user)->with('detail',$detail)->with('id',$id);
    }
    public function user_data_detail_simpan(Request $request,$id)
    {
        if($id==-1)
        {
            

            $insert=new Sdm;
            $insert->nip = $request->nip;
            $insert->nama_lengkap = $request->nama_lengkap;
            $insert->tempat_lahir = $request->tempat_lahir;
            $insert->tanggal_lahir = $request->tanggal_lahir_submit;
            $insert->jenis_kelamin = $request->jenis_kelamin;
            $insert->agama = $request->agama;
            $insert->status_pegawai = $request->status_pegawai;
            $insert->alamat = $request->alamat;
            $insert->golongan = $request->golongan;
            $insert->pangkat = $request->pangkat;
            $insert->jabatan = $request->jabatan;
            $insert->foto = $request->foto;
            $insert->eselon = $request->eselon;
            $insert->email = $request->email;
            $insert->kedudukan = $request->kedudukan;
            $insert->save();

            $user=User::find($request->id_user);
            $user->name=$request->nama_lengkap;
            $user->email=$request->email;
            $user->id_sdm=$insert->id;
            $user->save();

            return redirect('master-user')->with('success','Data Detail User Berhasil Di Tambah');
        }
        else
        {
            $user=User::find($request->id_user);
            $user->name=$request->nama_lengkap;
            $user->email=$request->email;
            $user->save();

            $insert=Sdm::find($id);
            $insert->nip = $request->nip;
            $insert->nama_lengkap = $request->nama_lengkap;
            $insert->tempat_lahir = $request->tempat_lahir;
            $insert->tanggal_lahir = $request->tanggal_lahir_submit;
            $insert->jenis_kelamin = $request->jenis_kelamin;
            $insert->agama = $request->agama;
            $insert->status_pegawai = $request->status_pegawai;
            $insert->alamat = $request->alamat;
            $insert->golongan = $request->golongan;
            $insert->pangkat = $request->pangkat;
            $insert->kedudukan = $request->kedudukan;
            $insert->jabatan = $request->jabatan;
            $insert->foto = $request->foto;
            $insert->eselon = $request->eselon;
            $insert->email = $request->email;
            $insert->save();

            return redirect('master-user')->with('success','Data Detail User Berhasil Di Perbaharui');
        }
    }
}

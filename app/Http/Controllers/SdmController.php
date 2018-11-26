<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sdm;
use Validator;
class SdmController extends Controller
{
    public function index()
    {
        $sdm=Sdm::orderBy('nama_lengkap')->get();
        return view('pages.sdm.index')->with('sdm',$sdm);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'golongan' => 'required',
            'eselon' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'nama_lengkap' => 'required',
            'nip' => 'required'
        ])->validate();

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
        $insert->save();

        return redirect('sdm')->with('success','Data SDM Berhasil Di Tambah');
    }
    public function update(Request $request,$id)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'golongan' => 'required',
            'eselon' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'nama_lengkap' => 'required',
            'nip' => 'required'
        ])->validate();

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
        $insert->jabatan = $request->jabatan;
        $insert->foto = $request->foto;
        $insert->eselon = $request->eselon;
        $insert->save();

        return redirect('sdm')->with('success','Data SDM Berhasil Di Perbaharui');
    }

    public function destroy($id)
    {
        Sdm::destroy($id);

        return redirect()->route('sdm.index')
            ->with('success', 'Anda telah menghapus data.');
    }

    public function edit($id)
    {
        return Sdm::find($id);
    }
}

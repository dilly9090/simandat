<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealisasiAnggaran;
use Validator;
class RealisasiAnggaranController extends Controller
{
    public function index()
    {
        //
    }

    
    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'id_iku' => 'required',
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ])->validate();

        $insert=new RealisasiAnggaran;
        $insert->id_iku=$request->id_iku;
        $insert->tanggal=$request->tanggal_submit;
        $insert->kegiatan=$request->kegiatan;
        $insert->jumlah=$request->jumlah;
        $insert->keterangan=$request->keterangan;
        $insert->save();
        return redirect('anggaran')->with('success','Data Realisasi Anggaran Berhasil Di Tambah');
    }

   
    public function edit($id)
    {
        return RealisasiAnggaran::find($id);
    }

   
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'id_iku' => 'required',
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ])->validate();

        $insert=RealisasiAnggaran::find($id);
        $insert->id_iku=$request->id_iku;
        $insert->tanggal=$request->tanggal_submit;
        $insert->kegiatan=$request->kegiatan;
        $insert->jumlah=$request->jumlah;
        $insert->keterangan=$request->keterangan;
        $insert->save();
        return redirect('anggaran')->with('success','Data Realisasi Anggaran Berhasil Di Perbaharui');
    }

    
    public function destroy($id)
    {
        RealisasiAnggaran::destroy($id);

        return redirect('anggaran')
            ->with('success', 'Anda telah menghapus data.');
    }
}

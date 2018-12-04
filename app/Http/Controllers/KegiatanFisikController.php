<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanFisik;
use Validator;
class KegiatanFisikController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'id_iku' => 'required',
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ])->validate();

        $insert=new KegiatanFisik;
        $insert->id_iku=$request->id_iku;
        $insert->tanggal=$request->tanggal_submit;
        $insert->kegiatan=$request->kegiatan;
        $insert->jumlah=$request->jumlah;
        $insert->keterangan=$request->keterangan;
        $insert->save();
        return redirect('kegiatan-fisik')->with('success','Data Realisasi Kegiatan/Fisik Berhasil Di Tambah');
    }

   
    public function edit($id)
    {
        return KegiatanFisik::find($id);
    }
    public function destroy($id)
    {
        KegiatanFisik::destroy($id);

        return redirect('anggaran')
            ->with('success', 'Anda telah menghapus data.');
    }
}

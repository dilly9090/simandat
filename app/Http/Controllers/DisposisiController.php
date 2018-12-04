<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disposisi;
class DisposisiController extends Controller
{
    public function diposisi_surat_masuk(Request $request)
    {
        $insert=new Disposisi;
        $insert->id_surat_masuk=$request->idsurat;
        $insert->from_eselon_2=1;
        $insert->instruksi=$request->disposisi_direktur;
        
        $dir=null;
        if(isset($request->file_disposisi_direktur))
        {
            $val=$request->file_disposisi_direktur;
            $val->storeAs('dokumen',$val->getClientOriginalName());
            $dir='dokumen/'.$val->getClientOriginalName(); 
        }
        $insert->indeks=$dir;
        $insert->kode='direktur';
        $insert->save();
        
        $insert=new Disposisi;
        $insert->id_surat_masuk=$request->idsurat;
        $insert->from_eselon_2=1;
        $insert->from_eselon_3=1;
        $insert->instruksi=$request->disposisi_kasubdit;
        
        $dir=null;
        if(isset($request->file_disposisi_kasubdit))
        {
            $val=$request->file_disposisi_kasubdit;
            $val->storeAs('dokumen',$val->getClientOriginalName());
            $dir='dokumen/'.$val->getClientOriginalName(); 
        }
        $insert->indeks=$dir;
        $insert->kode='kasubdit';
        $insert->save();

        return redirect('surat-masuk/'.$request->idsurat)->with('success','DIsposisi Berhasil Di Simpan');
    }
    public function diposisi_surat_keluar(Request $request)
    {
        $insert=new Disposisi;
        $insert->id_surat_keluar=$request->idsurat;
        $insert->from_eselon_2=1;
        $insert->instruksi=$request->disposisi_direktur;
        
        $dir=null;
        if(isset($request->file_disposisi_direktur))
        {
            $val=$request->file_disposisi_direktur;
            $val->storeAs('dokumen',$val->getClientOriginalName());
            $dir='dokumen/'.$val->getClientOriginalName(); 
        }
        $insert->indeks=$dir;
        $insert->kode='direktur';
        $insert->save();
        
        

        return redirect('surat-keluar/'.$request->idsurat)->with('success','DIsposisi Berhasil Di Simpan');
    }
}

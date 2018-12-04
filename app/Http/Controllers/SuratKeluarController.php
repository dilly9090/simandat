<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use App\Models\Disposisi;
class SuratKeluarController extends Controller
{
    public function index()
    {
        $data=SuratKeluar::orderBy('tgl_surat')->get();
        $no_agenda=date('Ymd').'-'.autonumber($data->count()+1);
        return view('pages.surat-keluar.index')->with('data',$data)->with('no_agenda',$no_agenda);
    }
    public function show($id)
    {
        $disposisi=Disposisi::where('id_surat_keluar',$id)->get();
        $disp=array();
        foreach($disposisi as $k=>$v)
        {
            $disp[$v->kode]=$v;
        }
        $surat=SuratKeluar::find($id);
        return view('pages.surat-keluar.detail')->with('surat',$surat)->with('id',$id)->with('disposisi',$disp);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $val=$request->file;
        $val->storeAs('dokumen',$val->getClientOriginalName());
        $dir='dokumen/'.$val->getClientOriginalName(); 

        $insert=new SuratKeluar;
        $insert->tgl_keluar =  $request->tgl_masuk_submit;
        $insert->tujuan =  $request->tujuan;
        $insert->no_agenda =  $request->no_agenda;
        $insert->lampiran =  $request->lampiran;
        $insert->no_agenda =  $request->no_agenda;
        $insert->asal_surat =  $request->asal_surat;
        $insert->isi_ringkas =  $request->isi_ringkas;
        $insert->no_surat =  $request->no_surat;
        $insert->tgl_surat =  $request->tgl_surat_submit;
        $insert->perihal =  $request->perihal;
        $insert->file =  $dir;
        $insert->save();

        return redirect('surat-keluar')->with('success','Data Surat Masuk Berhasil Di Tambah');
    }
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $dir=null;
        if(isset($request->file))
        {
            $val=$request->file;
            $val->storeAs('dokumen',$val->getClientOriginalName());
            $dir='dokumen/'.$val->getClientOriginalName(); 
        }

        $insert= SuratKeluar::find($id);
        $insert->tgl_keluar =  $request->tgl_masuk_submit;
        $insert->tujuan =  $request->tujuan;
        $insert->no_agenda =  $request->no_agenda;
        $insert->lampiran =  $request->lampiran;
        $insert->no_agenda =  $request->no_agenda;
        $insert->asal_surat =  $request->asal_surat;
        $insert->isi_ringkas =  $request->isi_ringkas;
        $insert->no_surat =  $request->no_surat;
        $insert->tgl_surat =  $request->tgl_surat_submit;
        $insert->perihal =  $request->perihal;
        $insert->file =  $dir;
        $insert->save();

        return redirect('surat-keluar')->with('success','Data Surat Masuk Berhasil Di Perbaharui');
    }

    public function edit($id)
    {
        return SuratKeluar::find($id);
    }

    public function destroy($id)
    {
        SuratKeluar::destroy($id);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Anda telah menghapus data.');
    }
}

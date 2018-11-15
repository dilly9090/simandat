<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regulasi;
class RegulasiController extends Controller
{
    public function index()
    {
        $regulasi=Regulasi::orderBy('code')->get();
        return view('pages.regulasi.index')->with('regulasi',$regulasi);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $val=$request->file;
        $val->storeAs('dokumen',$val->getClientOriginalName());
        $dir='dokumen/'.$val->getClientOriginalName(); 

        $insert=new Regulasi;
        $insert->code = $request->kode;
        $insert->title = $request->title;
        $insert->file = $dir;
        $insert->save();
        return redirect('regulasi')->with('status','Data Regulasi Berhasil Di Tambah');
    }
}

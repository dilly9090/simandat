<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaranaPrasarana;
use Validator;
class SaranaPrasaranaController extends Controller
{
    public function index()
    {
        $sarpras=SaranaPrasarana::orderBy('kode')->get();
        return view('pages.sarana-prasarana.index')->with('sarpras',$sarpras);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'jenis' => 'required',
            'kode' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required'
        ])->validate();

        $insert=new SaranaPrasarana;
        $insert->jenis = $request->jenis;
        $insert->kode = $request->kode;
        $insert->satuan = $request->satuan;
        $insert->jumlah = $request->jumlah;
        $insert->save();

        return redirect('sarpras')->with('success','Data Sarana Prasarana Berhasil Di Tambah');
    }
    public function update(Request $request,$id)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'jenis' => 'required',
            'kode' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required'
        ])->validate();

        $insert=SaranaPrasarana::find($id);
        $insert->jenis = $request->jenis;
        $insert->kode = $request->kode;
        $insert->satuan = $request->satuan;
        $insert->jumlah = $request->jumlah;
        $insert->save();

        return redirect('sarpras')->with('success','Data Sarana Prasarana Berhasil Di Perbaharui');
    }

    public function destroy($id)
    {
        SaranaPrasarana::destroy($id);

        return redirect()->route('sarpras.index')
            ->with('success', 'Anda telah menghapus data.');
    }

    public function edit($id)
    {
        return SaranaPrasarana::find($id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IKU;
use App\Models\Unit;
use App\Models\Sdm;
use Validator;
class IKUController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'tahun' => 'required',
            'id_unit' => 'required',
            'sasaran' => 'required',
            'indikator' => 'required',
            'target' => 'required',
            'anggaran' => 'required'
        ])->validate();

        $insert=new IKU;
        $insert->tahun = $request->tahun;
        $insert->id_unit = $request->id_unit;
        $insert->sasaran = $request->sasaran;
        $insert->indikator = $request->indikator;
        $insert->target = str_replace(array(',','.'),'',$request->target);
        $insert->anggaran = str_replace(array(',','.'),'',$request->anggaran);
        $insert->satuan = $request->satuan;
        $insert->save();

        return redirect('iku')->with('success','Data IKU Berhasil Di Tambah');
    }
    public function update(Request $request,$id)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'tahun' => 'required',
            'id_unit' => 'required',
            'sasaran' => 'required',
            'indikator' => 'required',
            'target' => 'required',
            'anggaran' => 'required'
        ])->validate();

        $insert=IKU::find($id);
        $insert->tahun = $request->tahun;
        $insert->id_unit = $request->id_unit;
        $insert->sasaran = $request->sasaran;
        $insert->indikator = $request->indikator;
        $insert->target = str_replace(array(',','.'),'',$request->target);
        $insert->anggaran = str_replace(array(',','.'),'',$request->anggaran);
        $insert->satuan = $request->satuan;
        $insert->save();

        return redirect('iku')->with('success','Data IKU Berhasil Di Perbaharui');
    }
    public function destroy($id)
    {
        // dd($id);
        IKU::destroy($id);

        return redirect('iku')
            ->with('success', 'Anda telah menghapus data.');
    }
    public function edit($id)
    {
        return IKU::find($id);
    }
}

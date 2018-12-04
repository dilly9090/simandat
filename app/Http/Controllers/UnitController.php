<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Sdm;
use Validator;
class UnitController extends Controller
{
    public function index()
    {
        $unit=Unit::where('status',1)->with('sdm')->orderBy('id_parent')->get();
        $d_unit=array();
        foreach($unit as $k=>$v)
        {
            $d_unit[$v->id_parent][$v->id]=$v;
        }
        $sdm=Sdm::orderBy('nama_lengkap')->get();
        return view('pages.master.unit')->with('d_unit',$d_unit)->with('unit',$unit)->with('sdm',$sdm);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'nama_unit' => 'required',
            'nama_jabatan' => 'required',
            'eselon' => 'required',
            'singkatan' => 'required',
            'id_eselon' => 'required'
        ])->validate();

        // $unit=Unit::where('nama_unit','like',"%$request->nama_unit%")->where('sub_unit','-')->first();

        $insert=new Unit;
        $insert->nama_unit = $request->nama_unit;
        $insert->nama_jabatan = $request->nama_jabatan;
        $insert->eselon = $request->eselon;
        $insert->id_eselon = $request->id_eselon;
        // $insert->sub_unit = $request->sub_unit;
        $insert->id_parent = $request->id_parent;
        $insert->singkatan = $request->singkatan;
        $insert->status = 1;
        $insert->save();

        return redirect('master-unit')->with('success','Data Unit Berhasil Di Tambah');
    }
    public function update(Request $request,$id)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'nama_unit' => 'required',
            'nama_jabatan' => 'required',
            'eselon' => 'required',
            'singkatan' => 'required',
            'id_eselon' => 'required'
        ])->validate();

        $u=Unit::find($id);

        // $unit=Unit::where('nama_unit','like',"%$request->nama_unit%")->where('sub_unit','-')->first();

        if($u->id_eselon==$request->id_eselon)
        {
            $u->nama_unit = $request->nama_unit;
            $u->nama_jabatan = $request->nama_jabatan;
            $u->eselon = $request->eselon;
            // $u->sub_unit = $request->sub_unit;
            $u->id_eselon = $request->id_eselon;
            $u->id_parent = $request->id_parent;
            $u->singkatan = $request->singkatan;
            $u->save();
        }
        else
        {   
            $u->status=0;
            $u->save();
            
            $insert=new Unit;
            $insert->nama_unit = $request->nama_unit;
            $insert->nama_jabatan = $request->nama_jabatan;
            $insert->eselon = $request->eselon;
            // $insert->sub_unit = $request->sub_unit;
            $insert->id_eselon = $request->id_eselon;
            $insert->id_parent = $request->id_parent;
            $insert->singkatan = $request->singkatan;
            $insert->status = 1;
            $insert->save();
        }


        return redirect('master-unit')->with('success','Data Unit Berhasil Di Perbaharui');
    }

    public function destroy($id)
    {
        Unit::destroy($id);

        return redirect()->route('master-unit.index')
            ->with('success', 'Anda telah menghapus data.');
    }

    public function edit($id)
    {
        return Unit::find($id);
    }

}

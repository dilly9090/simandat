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
        $unit=Unit::where('status',1)->with('sdm')->orderBy('nama_unit')->get();
        $sdm=Sdm::orderBy('nama_lengkap')->get();
        return view('pages.master.unit')->with('unit',$unit)->with('sdm',$sdm);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'nama_unit' => 'required',
            'nama_jabatan' => 'required',
            'eselon' => 'required',
            'id_eselon' => 'required'
        ])->validate();

        $insert=new Unit;
        $insert->nama_unit = $request->nama_unit;
        $insert->nama_jabatan = $request->nama_jabatan;
        $insert->eselon = $request->eselon;
        $insert->id_eselon = $request->id_eselon;
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
            'id_eselon' => 'required'
        ])->validate();

        $u=Unit::find($id);
        if($u->id_eselon==$request->id_eselon)
        {
            $u->nama_unit = $request->nama_unit;
            $u->nama_jabatan = $request->nama_jabatan;
            $u->eselon = $request->eselon;
            $u->id_eselon = $request->id_eselon;
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
            $insert->id_eselon = $request->id_eselon;
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

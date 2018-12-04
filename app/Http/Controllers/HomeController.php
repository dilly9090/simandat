<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IKU;
use App\Models\Unit;
use App\Models\RealisasiAnggaran;
use App\Models\KegiatanFisik;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.index');
    }

    public function program_persebaran()
    {
        return view('pages.program.persebaran');
    }
    public function program_tabel()
    {
        return view('pages.program.tabel');
    }
    public function program_grafik()
    {
        return view('pages.program.grafik');
    }
    public function sebaran_peta()
    {
        return view('pages.peta.peta');
    }
    public function anggaran()
    {
        $iku=IKU::where('status',0)->with('unit')->orderBy('tahun','desc')->orderBy('id_unit')->get();
        $d_iku=$dt_iku=array();
        foreach($iku as $k=>$v)
        {
            $d_iku[]=$v;
            $dt_iku[$v->unit->id_parent][$v->id_unit][]=$v->anggaran;
        }
        // dd($dt_iku);
        $unit=Unit::all();
        $d_unit=array();
        foreach($unit as $k=>$v)
        {
            $d_unit[$v->id_parent][$v->id]=$v;
        }

        $realisasi=RealisasiAnggaran::all();
        $d_realisasi=$jlh=array();
        foreach($realisasi as $k=>$v)
        {
            $d_realisasi[$v->id_iku][]=$v;
            $jlh[$v->id_iku][]=$v->jumlah;
        }
        return view('pages.anggaran.anggaran')
                ->with('iku',$d_iku)
                ->with('dt_iku',$dt_iku)
                ->with('unit',$d_unit)
                ->with('realisasi',$d_realisasi)
                ->with('jumlah',$jlh);
    }
    public function kegiatan_fisik()
    {
        $iku=IKU::where('status',0)->with('unit')->orderBy('tahun','desc')->orderBy('id_unit')->get();
        $d_iku=array();
        foreach($iku as $k=>$v)
        {
            $d_iku[]=$v;
        }

        $unit=Unit::all();
        $d_unit=array();
        foreach($unit as $k=>$v)
        {
            $d_unit[$v->id_parent][$v->id]=$v;
        }

        $realisasi=KegiatanFisik::all();
        $d_realisasi=$jlh=array();
        foreach($realisasi as $k=>$v)
        {
            $d_realisasi[$v->id_iku][]=$v;
            $jlh[$v->id_iku][]=$v->jumlah;
        }
        return view('pages.kegiatan-fisik.index')
                ->with('iku',$d_iku)
                ->with('unit',$d_unit)
                ->with('realisasi',$d_realisasi)
                ->with('jumlah',$jlh);
    }

    public function master()
    {
        return view('pages.master.index');
    }
    public function iku()
    {
        $unit=Unit::all();
        $d_unit=array();
        foreach($unit as $k=>$v)
        {
            $d_unit[$v->id_parent][$v->id]=$v;
        }


        $iku=IKU::where('status',0)->orderBy('tahun','desc')->get();
    
        $d_iku=array();
        foreach($iku as $k=>$v)
        {
            $d_iku[str_slug($v->id_unit)][]=$v;
        }
        // dd($d_iku);
        return view('pages.iku.index')->with('unit',$d_unit)->with('iku',$d_iku);
    }

    public function login(Request $request)
    {
        return redirect('home');
    }

    public function unduh($dir,$file)
    {
        return response()->download(storage_path('app/'.$dir.'/'.$file));
    }
}

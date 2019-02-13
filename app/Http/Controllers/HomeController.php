<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IKU;
use App\Models\Unit;
use App\Models\Provinsi;
use App\Models\RealisasiAnggaran;
use App\Models\KegiatanFisik;
use Session;
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
        $iku=IKU::where('status',0)->with('unit')->orderBy('tahun','desc')->orderBy('id_unit')->get();
        $d_iku=$dt_iku=array();
        $total_anggaran=array();
        foreach($iku as $k=>$v)
        {
            $d_iku[]=$v;
            $dt_iku[$v->unit->id_parent][$v->id_unit][]=$v->anggaran;
            $total_anggaran[$v->unit->id_parent][$v->sasaran]=$v->anggaran;
        }
        // dd($total_anggaran);
        $unit=Unit::all();
        $d_unit=array();
        
        foreach($unit as $k=>$v)
        {
            $d_unit[$v->id_parent][$v->id]=$v;
            
        }

        $realisasi=RealisasiAnggaran::with('iku')->get();
        $d_realisasi=$jlh=array();
        foreach($realisasi as $k=>$v)
        {
            $d_realisasi[$v->id_iku][]=$v;
            $jlh[$v->iku->id_unit][]=$v->jumlah;
        }

        $realisasifisik=KegiatanFisik::with('iku')->get();
        $keg=$jlh_fisik=$d_realisasi_fisik=array();
        foreach($realisasifisik as $k=>$v)
        {
            $d_realisasi_fisik[$v->id_iku][]=$v;
            $keg[str_slug($v->kegiatan)][]=$v;
            $jlh_fisik[$v->iku->unit->id_parent][trim($v->iku->satuan)][]=$v->jumlah;
        }
        return view('pages.dashboard.index')
                ->with('iku',$d_iku)
                ->with('dt_iku',$dt_iku)
                ->with('total_anggaran',$total_anggaran)
                ->with('unit',$d_unit)
                ->with('realisasi',$d_realisasi)
                ->with('jlh_fisik',$jlh_fisik)
                ->with('keg',$keg)
                ->with('jumlah',$jlh);
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
    public function sebaran_tabel($tahun=null)
    {
        $provinsi=Provinsi::all();
        if($tahun==null)
            $tahun=date('Y');
        else    
            $tahun=$tahun;

        
        // return $json;
        $kejadian=array();

        if($tahun==2017)
        {
            $kat=kategori_2017();
            $kejadian=$kat['jenis'];
            $jumlah=$kat['jumlah'];
            return view('pages.peta.table-2017')
                ->with('tahun',$tahun)
                ->with('kejadian',$kejadian)
                ->with('provinsi',$provinsi)
                ->with('jumlah',$jumlah);
        }
        else
        {
            $url='https://pskbs.id/crawler/data_result/'.$tahun;
            $json = json_decode(file_get_contents($url), true);
            if(count($json)==0)
                $d_json=array();
            else
                $d_json=$json['provinsi'];
            return view('pages.peta.tabel')
                ->with('tahun',$tahun)
                ->with('kejadian',$kejadian)
                ->with('provinsi',$provinsi)
                ->with('json',$d_json);
        }
                
    }
    public function sebaran_peta($tahun=null)
    {
        $provinsi=Provinsi::all();
        if($tahun==null)
            $tahun=date('Y');
        else    
            $tahun=$tahun;

        $url='https://pskbs.id/crawler/data_result/'.$tahun;
        $json = json_decode(file_get_contents($url), true);
        $jumlah_kejadian=isset($json['jumlah_kejadian']) ? $json['jumlah_kejadian'] : array();
        $jumlah_meninggal=isset($json['jumlah_korban']['meninggal']) ? $json['jumlah_korban']['meninggal'] : array();
        $jumlah_luka=isset($json['jumlah_korban']['luka']) ? $json['jumlah_korban']['luka'] : array();
        $jumlah_pengungsi=isset($json['jumlah_korban']['jumlah_pengungsi']) ? $json['jumlah_korban']['jumlah_pengungsi'] : array();
        $jumlah_kerusakan=isset($json['jumlah_kerusakan']['bangunan_rusak']) ? $json['jumlah_kerusakan']['bangunan_rusak'] : array();
        $dprovinsi=isset($json['provinsi']) ? $json['provinsi'] : array();
        $kejadian_provinsi=isset($json['kejadian_provinsi']) ? $json['kejadian_provinsi'] : array();

        // Session::set('dprovinsi',$dprovinsi);
        // Session::set('kejadian_provinsi',$kejadian_provinsi);
        session(['dprovinsi'=>$dprovinsi]);
        session(['kejadian_provinsi'=>$kejadian_provinsi]);
        $total=0;
        foreach($jumlah_kejadian as $k=>$v)
        {
            $total+=count($v);
        }

        return view('pages.peta.peta')
                ->with('provinsi',$provinsi)
                ->with('dprovinsi',$dprovinsi)
                ->with('kejadian_provinsi',$kejadian_provinsi)
                ->with('tahun',$tahun)
                ->with('total',$total)
                ->with('jumlah_meninggal',array_sum($jumlah_meninggal))
                ->with('jumlah_luka',array_sum($jumlah_luka))
                ->with('jumlah_pengungsi',array_sum($jumlah_pengungsi))
                ->with('jumlah_kerusakan',array_sum($jumlah_kerusakan))
                ->with('jumlah_kejadian',$jumlah_kejadian);
    }
    public function anggaran()
    {
        $iku=IKU::where('status',0)->with('unit')->orderBy('tahun','desc')->orderBy('id_unit')->get();
        $d_iku=$dt_iku=array();
        $total_anggaran=array();
        foreach($iku as $k=>$v)
        {
            $d_iku[]=$v;
            $dt_iku[$v->unit->id_parent][$v->id_unit][]=$v->anggaran;
            $total_anggaran[$v->unit->id_parent][$v->sasaran]=$v->anggaran;
        }
        // dd($total_anggaran);
        $unit=Unit::all();
        $d_unit=array();
        
        foreach($unit as $k=>$v)
        {
            $d_unit[$v->id_parent][$v->id]=$v;
            
        }

        $realisasi=RealisasiAnggaran::with('iku')->get();
        $d_realisasi=$jlh=array();
        foreach($realisasi as $k=>$v)
        {
            $d_realisasi[$v->id_iku][]=$v;
            $jlh[$v->iku->id_unit][]=$v->jumlah;
        }
        // dd($jlh);
        return view('pages.anggaran.anggaran')
                ->with('iku',$d_iku)
                ->with('dt_iku',$dt_iku)
                ->with('total_anggaran',$total_anggaran)
                ->with('unit',$d_unit)
                ->with('realisasi',$d_realisasi)
                ->with('jumlah',$jlh);
    }
    public function kegiatan_fisik()
    {
        $iku=IKU::where('status',0)->with('unit')->orderBy('tahun','desc')->orderBy('id_unit')->get();
        $d_iku=array();
        $dt_iku=array();
        foreach($iku as $k=>$v)
        {
            $d_iku[]=$v;
            $dt_iku[$v->unit->id_parent][trim($v->satuan)][]=$v->target;
        }
        // dd($dt_iku);
        $unit=Unit::all();
        $d_unit=array();
        foreach($unit as $k=>$v)
        {
            $d_unit[$v->id_parent][$v->id]=$v;
        }

        $realisasi=KegiatanFisik::with('iku')->get();
        $d_realisasi=$jlh=$real=array();
        $keg=$jlh=$real=array();
        foreach($realisasi as $k=>$v)
        {
            $d_realisasi[$v->id_iku][]=$v;
            $keg[str_slug($v->kegiatan)][]=$v;
            $jlh[$v->iku->unit->id_parent][trim($v->iku->satuan)][]=$v->jumlah;
            // $jlh[$v->iku->id_unit][]=$v->jumlah;
        }
        // dd($jlh);
        return view('pages.kegiatan-fisik.index')
                ->with('iku',$d_iku)
                ->with('dt_iku',$dt_iku)
                ->with('unit',$d_unit)
                ->with('keg',$keg)
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

    function konversi($dec,$kode)
    {
        $dd=DDtoDMS($dec,$kode);
        echo $dd;
    }
    function getpeta($tahun)
    {
        // echo $tahun;
        $provinsi=Provinsi::all();
        $dprovinsi=array();
        if($tahun==2017)
        {
            $kat=kategori_2017();
            $jlh=array();
            foreach($kat['jumlah'] as $prov=>$v)
            {
                $dprovinsi[$prov]=$prov;
                foreach($v as $idx=>$vl)
                {
                    if(isset($kat['jenis'][$idx]))
                        $jlh[$prov][$kat['jenis'][$idx]]=$vl;
                }
            }
            // return $jlh;
            return view('pages.peta.map-2017')
                ->with('provinsi',$provinsi)
                ->with('dprovinsi',$dprovinsi)
                ->with('kejadian_provinsi',$jlh)
                ->with('tahun',$tahun);
        }
        else
        {
            $kejadian_provinsi=Session::get('kejadian_provinsi');
            $dprovinsi=Session::get('dprovinsi');
            return view('pages.peta.map')
                ->with('provinsi',$provinsi)
                ->with('dprovinsi',$dprovinsi)
                ->with('kejadian_provinsi',$kejadian_provinsi)
                ->with('tahun',$tahun);
        }
    }

}

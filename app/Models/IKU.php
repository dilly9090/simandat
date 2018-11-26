<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IKU extends Model
{
    use SoftDeletes;
    protected $table='i_k_u';
    protected $fillable=['tahun','id_unit','pic','sasaran','indikator','target','satuan','realisasi','kegiatan','anggaran','realisasi_anggaran','tgl_disetujui','status','created_at','updated_at','deleted_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealisasiAnggaran extends Model
{
    use SoftDeletes;
    protected $table='realisasi_anggaran';
    protected $fillable = ['id_iku','tanggal','kegiatan','jumlah','keterangan','status','created_at','updated_at','deleted_at'];
}

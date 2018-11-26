<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disposisi extends Model
{
    use SoftDeletes;
    protected $table='disposisi';
    protected $fillable=['indeks','kategori','kode','tanggal_penyelesaian','id_surat_masuk','id_surat_keluar','to_eselon_1','to_eselon_2','to_eselon_3','to_eselon_4','to_staf','from_eselon_1','from_eselon_2','from_eselon_3','from_eselon_4','from_staf','status','instruksi','created_at','updated_at','deleted_at'];
}

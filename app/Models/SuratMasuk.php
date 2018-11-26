<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratMasuk extends Model
{
    use SoftDeletes;
    protected $table='surat_masuk';
    protected $fillable = ['tgl_masuk','jenis','tujuan','lampiran','no_agenda','asal_surat','isi_ringkas','keterangan','no_surat','tgl_surat','perihal','file','created_at','updated_at','deleted_at'];
}

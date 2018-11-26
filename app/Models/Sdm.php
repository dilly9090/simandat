<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sdm extends Model
{
    use SoftDeletes;
    protected $table='sdm';
    protected $fillable=['nip','nama_lengkap','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','status_pegawai','kedudukan','status_marital','alamat','golongan','pangkat','jabatan','foto','created_at','updated_at','deleted_at'];
}

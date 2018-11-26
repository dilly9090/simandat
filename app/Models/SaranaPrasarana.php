<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaranaPrasarana extends Model
{
    use SoftDeletes;
    protected $table='sarana_prasarana';
    protected $fillable=['jenis','kode','desc','satuan','jumlah','created_at','updated_at','deleted_at'];
}

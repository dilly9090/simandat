<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;
    protected $table='unit';
    protected $fillable = ['nama_unit','nama_jabatan','eselon','id_eselon','status','created_at','updated_at','deleted_at'];

    function sdm()
    {
        return $this->belongsTo('App\Models\Sdm','id_eselon');
    }
}

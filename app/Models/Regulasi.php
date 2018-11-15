<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regulasi extends Model
{
    protected $table='regulasi';
    protected $fillable=['code','title','desc','flag','file','created_at','updated_at','deleted_at'];
}

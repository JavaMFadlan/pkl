<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    protected $fillable = ['kode_prov','nama_prov'];
    public $timestamps = true;
    public function kota()
    {
        return $this->hasMany('App\kota', 'id_prov');
    }
}

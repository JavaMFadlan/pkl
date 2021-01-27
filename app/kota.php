<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    protected $fillable = ['nama_kota','kode_kota'];
    public $timestamps = true;
    public function provinsi()
    {
        return $this->belongsTo('App\provinsi', 'id_prov');
    }

    public function kecamatan()
    {
        return $this->hasMany('App\kecamatan', 'id_kota');
    }
}

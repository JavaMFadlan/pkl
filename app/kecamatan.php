<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $fillable = ['nama_kec','kode_kec'];
    public $timestamps = true;
    public function kota()
    {
        return $this->belongsTo('App\kota', 'id_kota');
    }

    public function kelurahan()
    {
        return $this->hasMany('App\kelurahan', 'id_kec');
    }
}

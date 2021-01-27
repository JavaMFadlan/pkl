<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    protected $fillable = ['nama_kel','kode_kel'];
    public $timestamps = true;
    public function kecamatan()
    {
        return $this->belongsTo('App\kecamatan', 'id_kec');
    }

    public function rw()
    {
        return $this->hasMany('App\rw', 'id_rw');
    }
}

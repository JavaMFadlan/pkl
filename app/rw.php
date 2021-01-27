<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    protected $fillable = ['nama_rw','kode_rw'];
    public $timestamps = true;
    public function kelurahan()
    {
        return $this->belongsTo('App\kelurahan', 'id_kel');
    }

    public function tracking()
    {
        return $this->hasMany('App\rw', 'id_rw');
    }
}

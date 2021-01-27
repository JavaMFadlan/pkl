<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tracking extends Model
{
    protected $fillable = ['sembuh','positif','meninggal'];
    // public $timestamps = true;
    public function rw()
    {
        return $this->belongsTo('App\rw', 'id_rw');
    }
}

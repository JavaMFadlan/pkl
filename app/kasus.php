<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kasus extends Model
{
    protected $fillable = ['sembuh','positif','meninggal'];
    public $timestamps = true;
    public function negara()
    {
        return $this->belongsTo('App\negara', 'id_neg');
    }
}

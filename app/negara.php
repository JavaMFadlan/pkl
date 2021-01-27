<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class negara extends Model
{
    protected $fillable = ['nama_neg','kode_neg'];
    public $timestamps = true;
    public function kasus()
    {
        return $this->hasMany('App\kasus', 'id_neg');
    }
}

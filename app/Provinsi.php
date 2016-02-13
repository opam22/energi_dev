<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';

    public function presentases()
    {
    	return $this->hasMany('App\Presentase', 'id_provinsi');
    }
}

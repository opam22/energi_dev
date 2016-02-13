<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';

    public function presentases()
    {
    	return $this->hasMany('App\Presentase');
    }
}

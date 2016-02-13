<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentase extends Model
{
    protected $table = 'presentases';

    protected $fillable = [
    	'id_provinsi',
    	'id_kabupaten',
    	'nilai'
    ];

    public function provinsi()
    {
    	return $this->belongsTo('App\Provinsi', 'id_provinsi', 'id_provinsi');
    }

    public function kabupaten()
    {
    	return $this->belongsTo('App\Kabupaten', 'id_kabupaten', 'id_kabupaten');
    }
}

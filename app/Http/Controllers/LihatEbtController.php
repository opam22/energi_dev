<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class LihatEbtController extends Controller
{
    /**
	 * used to handle verification user
	 * obly user who has been logged in that can access this controller
	 */
    public function __construct()
    {	
    	$this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('lihatebt.index', [
		'anggarans' => DB::table('anggaran')->orderBy('nama_anggaran', 'asc')->get(),
    	'dataebt' => DB::table('dataebt')
		->leftjoin('energi','dataebt.energi','=','energi.id_energi')
		->leftjoin('anggaran','dataebt.anggaran','=','anggaran.id_anggaran')
		->join('provinsi','dataebt.prov','=','provinsi.id_provinsi')
		->join('kabupaten','dataebt.kab','=','kabupaten.id_kabupaten')
		->join('kecamatan','dataebt.kec','=','kecamatan.id_kecamatan')
		->join('kelurahan','dataebt.kel','=','kelurahan.id_kelurahan')
		->select('dataebt.*', 'anggaran.nama_anggaran', 'energi.nama_energi', 'provinsi.nama_provinsi', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'kecamatan.nama_kecamatan', 'kelurahan.nama_kelurahan')
		->get(),
		]);
    }

}

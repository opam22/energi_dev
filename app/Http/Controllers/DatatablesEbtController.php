<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KabupatenDataTable;

use Datatables;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DatatablesEbtController extends Controller
{
    //
	public function getIndex()
	{
		return view('test');
	}
	

	/**
	 * Process datatables ajax request.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function anyData()
	{
		// return Datatables::of(User::select('*'))->make(true);
		$devices = DB::table('dataebt')
		->leftjoin('energi','dataebt.energi','=','energi.id_energi')
		->leftjoin('anggaran','dataebt.anggaran','=','anggaran.id_anggaran')
		->join('provinsi','dataebt.prov','=','provinsi.id_provinsi')
		->join('kabupaten','dataebt.kab','=','kabupaten.id_kabupaten')
		->join('kecamatan','dataebt.kec','=','kecamatan.id_kecamatan')
		->join('kelurahan','dataebt.kel','=','kelurahan.id_kelurahan')
		->select('dataebt.id_data', 'dataebt.terpasang', 'dataebt.kwhr', 'dataebt.kwh', 'dataebt.data_keterangan', 'anggaran.nama_anggaran', 'energi.nama_energi', 'provinsi.nama_provinsi', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'kelurahan.nama_kelurahan');
		return Datatables::of($devices)
    ->escapeColumns()
    ->make(true);
	}
	
}

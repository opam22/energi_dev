<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KabupatenDataTable;

use Datatables;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DatatablesController extends Controller
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
		$devices = DB::table('kabupaten')
    ->Join('provinsi', 'kabupaten.id_provinsi', '=', 'provinsi.id_provinsi')
    ->select('kabupaten.id_provinsi','kabupaten.nama_kabupaten','provinsi.nama_provinsi');
		return Datatables::of($devices)
    ->escapeColumns()
    ->make(true);
	}
	
	public function ebtData()
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
	
	public function lihatebtData($id)
	{
		// return Datatables::of(User::select('*'))->make(true);
		$devices = DB::table('dataebt')
		->leftjoin('energi','dataebt.energi','=','energi.id_energi')
		->leftjoin('anggaran','dataebt.anggaran','=','anggaran.id_anggaran')
		->join('provinsi','dataebt.prov','=','provinsi.id_provinsi')
		->join('kabupaten','dataebt.kab','=','kabupaten.id_kabupaten')
		->join('kecamatan','dataebt.kec','=','kecamatan.id_kecamatan')
		->join('kelurahan','dataebt.kel','=','kelurahan.id_kelurahan')
		->where('dataebt.anggaran', $id)
		->select('dataebt.id_data', 'dataebt.terpasang', 'dataebt.kwhr', 'dataebt.kwh', 'dataebt.data_keterangan', 'anggaran.nama_anggaran', 'energi.nama_energi', 'provinsi.nama_provinsi', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'kelurahan.nama_kelurahan');
		return Datatables::of($devices)
    ->escapeColumns()
    ->make(true);
	}
	
	public function reportData()
	{
		// return Datatables::of(User::select('*'))->make(true);
		$devices = DB::table('dataebt')
		->leftjoin('energi','dataebt.energi','=','energi.id_energi')
		->leftjoin('anggaran','dataebt.anggaran','=','anggaran.id_anggaran')
		->join('provinsi','dataebt.prov','=','provinsi.id_provinsi')
		->groupBy('prov','energi')
		->selectRaw('dataebt.prov, dataebt.posisi, sum(dataebt.terpasang) as terpasang, sum(dataebt.kwhr) as kwhr, sum(dataebt.kwh) as kwh, energi.nama_energi, provinsi.nama_provinsi');
		return Datatables::of($devices)
    ->escapeColumns()
    ->make(true);
	}
	
	public function reportProvData($id)
	{
		// return Datatables::of(User::select('*'))->make(true);
		$devices = DB::table('dataebt')
		->leftjoin('energi','dataebt.energi','=','energi.id_energi')
		->leftjoin('anggaran','dataebt.anggaran','=','anggaran.id_anggaran')
		->join('kabupaten','dataebt.kab','=','kabupaten.id_kabupaten')
		->where('dataebt.prov', $id)
		->groupBy('kab','energi')
		->selectRaw('dataebt.kab, dataebt.posisi, sum(dataebt.terpasang) as terpasang, sum(dataebt.kwhr) as kwhr, sum(dataebt.kwh) as kwh, energi.nama_energi, kabupaten.nama_kabupaten');
		return Datatables::of($devices)
    ->escapeColumns()
    ->make(true);
	}
	
	public function reportKabData($id)
	{
		// return Datatables::of(User::select('*'))->make(true);
		$devices = DB::table('dataebt')
		->leftjoin('energi','dataebt.energi','=','energi.id_energi')
		->leftjoin('anggaran','dataebt.anggaran','=','anggaran.id_anggaran')
		->join('kecamatan','dataebt.kec','=','kecamatan.id_kecamatan')
		->where('dataebt.kab', $id)
		->groupBy('kec','energi')
		->selectRaw('dataebt.kec, dataebt.posisi, sum(dataebt.terpasang) as terpasang, sum(dataebt.kwhr) as kwhr, sum(dataebt.kwh) as kwh, energi.nama_energi, kecamatan.nama_kecamatan');
		return Datatables::of($devices)
    ->escapeColumns()
    ->make(true);
	}
	
	public function reportKecData($id)
	{
		// return Datatables::of(User::select('*'))->make(true);
		$devices = DB::table('dataebt')
		->leftjoin('energi','dataebt.energi','=','energi.id_energi')
		->leftjoin('anggaran','dataebt.anggaran','=','anggaran.id_anggaran')
		->join('kelurahan','dataebt.kel','=','kelurahan.id_kelurahan')
		->where('dataebt.kec', $id)
		->groupBy('kel','energi')
		->selectRaw('dataebt.kel, dataebt.posisi, sum(dataebt.terpasang) as terpasang, sum(dataebt.kwhr) as kwhr, sum(dataebt.kwh) as kwh, energi.nama_energi, kelurahan.nama_kelurahan');
		return Datatables::of($devices)
    ->escapeColumns()
    ->make(true);
	}
	
	public function reportKelData($id)
	{
		// return Datatables::of(User::select('*'))->make(true);
		$devices = DB::table('dataebt')
		->leftjoin('energi','dataebt.energi','=','energi.id_energi')
		->leftjoin('anggaran','dataebt.anggaran','=','anggaran.id_anggaran')
		->where('dataebt.kel', $id)
		->selectRaw('dataebt.dusun, dataebt.posisi, sum(dataebt.terpasang) as terpasang, sum(dataebt.kwhr) as kwhr, sum(dataebt.kwh) as kwh, energi.nama_energi, dataebt.dusun');
		return Datatables::of($devices)
    ->escapeColumns()
    ->make(true);
	}
}

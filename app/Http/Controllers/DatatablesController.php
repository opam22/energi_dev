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
}

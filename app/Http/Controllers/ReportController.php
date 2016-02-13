<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ReportController extends Controller
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
        return view('report.index',
		[
		'id' => '',
		'cname' => 'Provinsi',
		'sname' => 'prov',
		'fname' => 'nama_provinsi'
		]);
    }
	
	public function prov($id)
    {
        return view('report.index',
		[
		'id' => '/prov/'.$id,
		'cname' => 'Kabupaten',
		'sname' => 'kab',
		'fname' => 'nama_kabupaten'
		]);
    }
	
	public function kab($id)
    {
        return view('report.index',
		[
		'id' => '/kab/'.$id,
		'cname' => 'Kecamatan',
		'sname' => 'kec',
		'fname' => 'nama_kecamatan'
		]);
    }
	
	public function kec($id)
    {
        return view('report.index',
		[
		'id' => '/kec/'.$id,
		'cname' => 'Kelurahan',
		'sname' => 'kel',
		'fname' => 'nama_kelurahan'
		]);
    }
	
	public function kel($id)
    {
        return view('report.index',
		[
		'id' => '/kel/'.$id,
		'cname' => 'Dusun',
		'sname' => 'kel',
		'fname' => 'dusun'
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dataebt.create', [
    	'tasks' => DB::table('provinsi')->orderBy('nama_provinsi', 'asc')->get(),
    	'anggarans' => DB::table('anggaran')->orderBy('nama_anggaran', 'asc')->get(),
    	'energis' => DB::table('energi')->orderBy('nama_energi', 'asc')->get()
    ]);
    }
	
	public function edit(Request $request)
    {
        return view('dataebt.edit', [
    	'tasks' => DB::table('provinsi')->orderBy('nama_provinsi', 'asc')->get(),
    	'anggaran' => DB::table('anggaran')->orderBy('nama_anggaran', 'asc')->lists('nama_anggaran','id_anggaran'),
    	'energi' => DB::table('energi')->orderBy('nama_energi', 'asc')->lists('nama_energi','id_energi'),
    	'energi' => DB::table('energi')->orderBy('nama_energi', 'asc')->lists('nama_energi','id_energi'),
    	'dataebt' => DB::table('dataebt')->where('id_data', $request->input('id'))->first(),
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
		// $input = $request->all();
        DB::table('dataebt')->insert($request->except(['_token']));
		return redirect()->route('dataebt');

    }
	
	public function update(Request $request)
    {
		// $input = $request->all();
        DB::table('dataebt')->insert($request->except(['_token']));
		return redirect()->route('dataebt');

    }
	
	
	
	public function getKab($id) {
		return view('dataebt.kab', [
    	'tasks' => DB::table('kabupaten')->where('id_provinsi', $id)->orderBy('nama_kabupaten', 'asc')->get(),
		]);
	}
	public function getKec($id) {
		return view('dataebt.kec', [
    	'tasks' => DB::table('kecamatan')->where('id_kabupaten', $id)->orderBy('nama_kecamatan', 'asc')->get(),
		]);
	}
	public function getKel($id) {
		return view('dataebt.kel', [
    	'tasks' => DB::table('kelurahan')->where('id_kecamatan', $id)->orderBy('nama_kelurahan', 'asc')->get(),
		]);
	}
	

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
		$id = $request->input('id');
		DB::table('dataebt')
			->where('id_data', $id)
			->delete();

        return redirect()->route('dataebt');
        // dataebts::destroy($id);

        // Session::flash('flash_message', 'dataebts successfully deleted!');

        // return redirect('dataebts');
    }

}

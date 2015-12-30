<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class DataEbtController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {


        return view('dataebts.index');
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

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // DB::table('dataebt')->create($request->all());
		// DB::table('dataebts')->insert(
    // ['email' => 'john@example.com', 'votes' => 0]
// );
		return redirect()->route('create-dataebt');

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
    public function destroy($id)
    {
        // dataebts::destroy($id);

        // Session::flash('flash_message', 'dataebts successfully deleted!');

        // return redirect('dataebts');
    }

}

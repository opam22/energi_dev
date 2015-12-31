<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class KecamatanController extends Controller
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
        return view('kecamatan.index', [
    	'kecamatan' => DB::table('kecamatan')
		->join('kabupaten','kecamatan.id_kabupaten','=','kabupaten.id_kabupaten')
		->take(25)
		->get(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return view('kecamatan.create', [
    	'kabupaten' => DB::table('kabupaten')->orderBy('nama_kabupaten', 'asc')->get(),
    ]);
	
		// $kabupaten = DB::table('kabupaten')->orderBy('nama_kabupaten', 'asc')->get();
		// return view('kecamatan.create', compact('kabupaten'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        // kecamatan::create($request->all());

        // Session::flash('flash_message', 'kecamatan successfully added!');

        // return redirect('kecamatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // $kecamatan = kecamatan::findOrFail($id);

        // return view('kecamatan.show', compact('kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $kecamatan = DB::table('kecamatan')->where('id_kecamatan', $id)->first();
		$kabupaten = DB::table('kabupaten')->orderBy('nama_kabupaten', 'asc')->lists('nama_kabupaten','id_kabupaten');
        return view('kecamatan.edit',
		compact('kecamatan','kabupaten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        
        $kecamatan = DB::table('kecamatan')
		->where('id_kecamatan', $request->input('id_kecamatan'))
            ->update(['nama_kecamatan' => $request->input('nama_kecamatan')]);

        Session::flash('flash_message', 'kecamatan successfully updated!');

        return redirect('kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // kecamatan::destroy($id);

        // Session::flash('flash_message', 'kecamatan successfully deleted!');

        // return redirect('kecamatan');
    }

}

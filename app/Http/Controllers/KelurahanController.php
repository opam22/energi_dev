<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class KelurahanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('kelurahan.index', [
    	'kelurahan' => DB::table('kelurahan')
		->join('kecamatan','kelurahan.id_kecamatan','=','kecamatan.id_kecamatan')
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
		// return view('kelurahan.create', [
    	// 'provinsi' => DB::table('provinsi')->orderBy('nama_provinsi', 'asc')->get(),
    // ]);
	
		// $provinsi = DB::table('provinsi')->orderBy('nama_provinsi', 'asc')->get();
		// return view('kelurahan.create', compact('provinsi'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        // kelurahan::create($request->all());

        // Session::flash('flash_message', 'kelurahan successfully added!');

        // return redirect('kelurahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // $kelurahan = kelurahan::findOrFail($id);

        // return view('kelurahan.show', compact('kelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $kelurahan = DB::table('kelurahan')->where('id_kelurahan', $id)->first();
		$kecamatan = DB::table('kecamatan')->orderBy('nama_kecamatan', 'asc')->lists('nama_kecamatan','id_kecamatan');
        return view('kelurahan.edit',
		compact('kelurahan','kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $kelurahan = DB::table('kelurahan')
		->where('id_kelurahan', $request->input('id_kelurahan'))
            ->update(['nama_kelurahan' => $request->input('nama_kelurahan')]);

        Session::flash('flash_message', 'kelurahan successfully updated!');

        return redirect('kelurahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // kelurahan::destroy($id);

        // Session::flash('flash_message', 'kelurahan successfully deleted!');

        // return redirect('kelurahan');
    }

}

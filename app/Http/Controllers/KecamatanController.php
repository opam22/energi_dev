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
        // $kecamatan = kecamatan::findOrFail($id);

        // return view('kecamatan.edit',
		// [
    	// 'tasks' => provins::orderBy('nama', 'asc')->get(),
		// 'pilihan' => 'Pilih Provinsi'
		// ],
		// compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        // $kecamatan = kecamatan::findOrFail($id);
        // $kecamatan->update($request->all());

        // Session::flash('flash_message', 'kecamatan successfully updated!');

        // return redirect('kecamatan');
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class KabupatenController extends Controller
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
        return view('kabupaten.index', [
    	'kabupaten' => DB::table('kabupaten')
		->join('provinsi','kabupaten.id_provinsi','=','provinsi.id_provinsi')
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
		// return view('kabupaten.create', [
    	// 'provinsi' => DB::table('provinsi')->orderBy('nama_provinsi', 'asc')->get(),
    // ]);
	
		// $provinsi = DB::table('provinsi')->orderBy('nama_provinsi', 'asc')->get();
		// return view('kabupaten.create', compact('provinsi'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        // kabupaten::create($request->all());

        // Session::flash('flash_message', 'kabupaten successfully added!');

        // return redirect('kabupaten');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // $kabupaten = kabupaten::findOrFail($id);

        // return view('kabupaten.show', compact('kabupaten'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $kabupaten = DB::table('kabupaten')->where('id_kabupaten', $id)->first();
		$provinsi = DB::table('provinsi')->orderBy('nama_provinsi', 'asc')->lists('nama_provinsi','id_provinsi');
        return view('kabupaten.edit',
		compact('kabupaten','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $kabupaten = DB::table('kabupaten')
		->where('id_kabupaten', $request->input('id_kabupaten'))
            ->update(['nama_kabupaten' => $request->input('nama_kabupaten')]);

        Session::flash('flash_message', 'kabupaten successfully updated!');

        return redirect('kabupaten');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // kabupaten::destroy($id);

        // Session::flash('flash_message', 'kabupaten successfully deleted!');

        // return redirect('kabupaten');
    }

}

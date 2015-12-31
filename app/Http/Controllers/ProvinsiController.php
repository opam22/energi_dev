<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ProvinsiController extends Controller
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
        return view('provinsi.index', [
    	'provinsi' => DB::table('provinsi')
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
		return view('provinsi.create', [
    	'provinsi' => DB::table('provinsi')->orderBy('nama_provinsi', 'asc')->get(),
    ]);
	
		// $provinsi = DB::table('provinsi')->orderBy('nama_provinsi', 'asc')->get();
		// return view('provinsi.create', compact('provinsi'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        // provinsi::create($request->all());

        // Session::flash('flash_message', 'provinsi successfully added!');

        // return redirect('provinsi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // $provinsi = provinsi::findOrFail($id);

        // return view('provinsi.show', compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $provinsi = DB::table('provinsi')->where('id_provinsi', $id)->first();

        return view('provinsi.edit',
		compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        
        // $provinsi = provinsi::findOrFail($id);
        // $provinsi->update($request->all());.
		$provinsi = DB::table('provinsi')
		->where('id_provinsi', $request->input('id_provinsi'))
            ->update(['nama_provinsi' => $request->input('nama_provinsi')]);

        Session::flash('flash_message', 'provinsi successfully updated!');

        return redirect('provinsi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // provinsi::destroy($id);

        // Session::flash('flash_message', 'provinsi successfully deleted!');

        // return redirect('provinsi');
    }

}

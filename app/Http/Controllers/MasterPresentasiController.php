<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Presentase;
use App\Provinsi;
use App\Kabupaten;

class MasterPresentasiController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentases = Presentase::with('provinsi', 'kabupaten')->get();

        return view('admin.master_presentasi.index', compact('presentases'));
    }

    public function add()
    {
        
    	//$presentases = Presentase::with('provinsi', 'kabupaten')->get();

    	//return $presentases;
    	$provinsies = Provinsi::lists('nama_provinsi', 'id_provinsi');

        return view('admin.master_presentasi.add', compact('provinsies'));
    }

    public function store(Request $request)
    {
    	$input = $request->all();

    	Presentase::create($input);

    	return redirect()->route('master-presentasi');
    }

    public function edit($id)
    {
    	$presentase = Presentase::with('provinsi', 'kabupaten')->where('id_presentase', $id)->first();

    	$provinsies = Provinsi::lists('nama_provinsi', 'id_provinsi');

        $kabupatens = Kabupaten::where('id_provinsi', $presentase->id_provinsi)->get();

    	return view('admin.master_presentasi.edit', compact('presentase', 'provinsies', 'kabupatens'));
    }

    public function update(Request $request, $id)
    {
    	$input = $request->except('_token');

    	$presentase = Presentase::where('id_presentase', $id)->update($input);

    	//$presentase->update($input);

    	return redirect()->route('master-presentasi');
    }

    public function destroy($id)
    {	
    	$presentase = Presentase::where('id_presentase', $id)->delete();

    	return redirect()->route('master-presentasi');
    }
}

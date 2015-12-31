<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Provinsi;

class DataKabupatenController extends Controller
{
    /**
	 * used to handle verification user
	 * obly user who has been logged in that can access this controller
	 */
    public function __construct()
    {	
    	$this->middleware('auth');
    }

    public function index()
    {
    	$kabupatens = DB::table('kabupaten')
    					->join('provinsi', 'provinsi.id_provinsi', '=', 'kabupaten.id_provinsi')
    					->select('kabupaten.*', 'provinsi.nama_provinsi')
    					->get();

    	return view('admin.data_kabupaten.index', compact('kabupatens'));
    }

    public function add()
    {
        $provinsies = Provinsi::lists('nama_provinsi', 'id_provinsi');
        return view('admin.data_kabupaten.add', compact('provinsies'));
    }

    public function store(Request $request)
    {
        DB::table('kabupaten')->insert($request->except('_token'));

        return redirect()->route('data-kabupaten');
    }

    public function edit($id)
    {   
        $provinsies = Provinsi::lists('nama_provinsi', 'id_provinsi');

        $kabupaten = DB::table('kabupaten')
                        ->where('id_kabupaten', $id)
                        ->first();

        return view('admin.data_kabupaten.edit', compact('kabupaten', 'provinsies'));
    }

    public function update(Request $request, $id)
    {
        $provinsi = DB::table('kabupaten')
                        ->where('id_kabupaten', $id)
                        ->update($request->except('_token'));

        return redirect()->route('data-kabupaten');
    }

    public function destroy($id)
    {
        $provinsi = DB::table('kabupaten')
                        ->where('id_kabupaten', $id)
                        ->delete();

        return redirect()->route('data-kabupaten');
    }
}

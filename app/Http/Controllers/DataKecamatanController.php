<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Kabupaten;

class DataKecamatanController extends Controller
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
    	
    	$kecamatans = DB::table('kecamatan')
    					->join('kabupaten', 'kabupaten.id_kabupaten', '=', 'kecamatan.id_kabupaten')
    					->select('kecamatan.*', 'kabupaten.nama_kabupaten')
    					->get();

    	return view('admin.data_kecamatan.index', compact('kecamatans'));
    }

    public function add()
    {
        $kabupatens = Kabupaten::lists('nama_kabupaten', 'id_kabupaten');
        return view('admin.data_kecamatan.add', compact('kabupatens'));
    }

    public function store(Request $request)
    {
        DB::table('kecamatan')->insert($request->except('_token'));

        return redirect()->route('data-kecamatan');
    }

    public function edit($id)
    {   
        $kabupatens = Kabupaten::lists('nama_kabupaten', 'id_kabupaten');

        $kecamatan = DB::table('kecamatan')
                        ->where('id_kecamatan', $id)
                        ->first();

        return view('admin.data_kecamatan.edit', compact('kecamatan', 'kabupatens'));
    }

    public function update(Request $request, $id)
    {
        $kecamatan = DB::table('kecamatan')
                        ->where('id_kecamatan', $id)
                        ->update($request->except('_token'));

        return redirect()->route('data-kecamatan');
    }

    public function destroy($id)
    {
        $kecamtan = DB::table('kecamatan')
                        ->where('id_kecamatan', $id)
                        ->delete();

        return redirect()->route('data-kecamatan');
    }
}

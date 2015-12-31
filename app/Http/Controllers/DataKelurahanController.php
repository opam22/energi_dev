<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Kecamatan;

class DataKelurahanController extends Controller
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
    	$kelurahans = DB::table('kelurahan')
    					->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'kelurahan.id_kecamatan')
    					->select('kelurahan.*', 'kecamatan.nama_kecamatan')
    					->paginate(15);

    	return view('admin.data_kelurahan.index', compact('kelurahans'));

    }

    public function add()
    {
        $kecamatans = Kecamatan::lists('nama_kecamatan', 'id_kecamatan');
        return view('admin.data_kelurahan.add', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        DB::table('kelurahan')->insert($request->except('_token'));

        return redirect()->route('data-kelurahan');
    }


    public function edit($id)
    {   
        $kecamatans = Kecamatan::lists('nama_kecamatan', 'id_kecamatan');

        $kelurahan = DB::table('kelurahan')
                        ->where('id_kelurahan', $id)
                        ->first();

        return view('admin.data_kelurahan.edit', compact('kelurahan', 'kecamatans'));
    }

    public function update(Request $request, $id)
    {
        $kelurahan = DB::table('kelurahan')
                        ->where('id_kelurahan', $id)
                        ->update($request->except('_token'));

        return redirect()->route('data-kelurahan');
    }

    public function destroy($id)
    {
        $kelurahan = DB::table('kelurahan')
                        ->where('id_kelurahan', $id)
                        ->delete();

        return redirect()->route('data-kelurahan');
    }
}

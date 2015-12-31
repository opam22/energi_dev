<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Kelurahan;

class DataDusunController extends Controller
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
    	$dusuns = DB::table('dusun')
    					->join('kelurahan', 'kelurahan.id_kelurahan', '=', 'dusun.id_kelurahan')
    					->select('dusun.*', 'kelurahan.nama_kelurahan')
    					->get();

    	return view('admin.data_dusun.index', compact('dusuns'));

    }

    public function add()
    {
        $kelurahans = Kelurahan::lists('nama_kelurahan', 'id_kelurahan');
        return view('admin.data_dusun.add', compact('kelurahans'));
    }

    public function store(Request $request)
    {
        DB::table('dusun')->insert($request->except('_token'));

        return redirect()->route('data-dusun');
    }

    public function edit($id)
    {   
        $kelurahans = Kelurahan::lists('nama_kelurahan', 'id_kelurahan');

        $dusun = DB::table('dusun')
                        ->where('id_dusun', $id)
                        ->first();

        return view('admin.data_dusun.edit', compact('dusun', 'kelurahans'));
    }

    public function update(Request $request, $id)
    {
        $dusun = DB::table('dusun')
                        ->where('id_dusun', $id)
                        ->update($request->except('_token'));

        return redirect()->route('data-dusun');
    }

    public function destroy($id)
    {
        $dusun = DB::table('dusun')
                        ->where('id_dusun', $id)
                        ->delete();

        return redirect()->route('data-dusun');
    }
}

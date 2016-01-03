<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Datatables;
use Yajra\Datatables\Html\Builder;

class DataProvinsiController extends Controller
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
    	$provinsi = DB::table('provinsi')->get();

    	return view('admin.data_provinsi.index', compact('provinsi'));
    }

    public function add()
    {
        return view('admin.data_provinsi.add');
    }

    public function store(Request $request)
    {
        DB::table('provinsi')->insert($request->except('_token'));

        return redirect()->route('data-provinsi');
    }

    public function edit($id)
    {
        $provinsi = DB::table('provinsi')
                        ->where('id_provinsi', $id)
                        ->first();

        return view('admin.data_provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, $id)
    {
        $provinsi = DB::table('provinsi')
                        ->where('id_provinsi', $id)
                        ->update($request->except('_token'));

        return redirect()->route('data-provinsi');
    }

    public function destroy($id)
    {
        $provinsi = DB::table('provinsi')
                        ->where('id_provinsi', $id)
                        ->delete();

        return redirect()->route('data-provinsi');
    }
}

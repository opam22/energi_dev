<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class MasterAnggaranController extends Controller
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
        $anggarans = DB::table('anggaran')->get();

        return view('admin.master_anggaran.index',compact('anggarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('admin.master_anggaran.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('anggaran')->insert($request->except('_token'));

        return redirect()->route('master-anggaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggaran = DB::table('anggaran')
                        ->where('id_anggaran', $id)
                        ->first();

        return view('admin.master_anggaran.edit', compact('anggaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anggaran = DB::table('anggaran')
                        ->where('id_anggaran', $id)
                        ->update($request->except('_token'));

        return redirect()->route('master-anggaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggaran = DB::table('anggaran')
                        ->where('id_anggaran', $id)
                        ->delete();

        return redirect()->route('master-anggaran');
    }
}

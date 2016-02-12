<?php

namespace App\DataTables;

use App\User;
use DB;
use Yajra\Datatables\Services\DataTable;

class KabupatenDataTable extends DataTable
{
    // protected $printPreview  = 'path-to-print-preview-view';
    // protected $exportColumns = ['id', 'name'];
    // protected $printColumns  = '*';

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
		$devices = DB::table('kabupaten')
    ->Join('provinsi', 'kabupaten.id_provinsi', '=', 'provinsi.id_provinsi')
    ->select('kabupaten.nama_kabupaten','provinsi.nama_provinsi');
		return Datatables::of($devices)
    ->escapeColumns()
    ->make(true);
	
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $users = DB::table('kabupaten')->select('kabupaten.id_kabupaten as id', 'kabupaten.nama_kabupaten as kab','provinsi.nama_provinsi as prov');

        return $this->applyScopes($users);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns([
                'id',
                'kab',
                'prov',
            ])
            ->ajax('')
            ->parameters([
                'buttons' => ['csv', 'excel', 'pdf', 'print'],
            ]);
    }
}

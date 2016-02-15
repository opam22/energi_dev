@extends('layout_master.master')

@section('content')
	
<div class="page-header position-relative">
                        <h1>
                            Data Energi Baru Terbarukan
                        </h1>
    </div><!--/.page-header-->
	<h1><a href="{{ route('create-dataebt') }}" class="btn btn-primary pull-right btn-sm">Tambah Data EBT</a></h1>
	<div class="table-header">
                                  Data EBT 
    </div>
	@if(Session::has('flash_message'))
	    
	    <br><br><br>
	    <div class="alert alert-danger">
	        
	        {{ session('flash_message') }}

	    </div>

	@endif

				<select name="anggaran" id="anggaran">
					<option value="">Pilih Anggaran</option>
					@foreach ($anggarans as $anggaran)
					<option value="{{ $anggaran->id_anggaran }}">{{ $anggaran->nama_anggaran }}</option>
					@endforeach
				<select>


	<table class="table table-bordered" id="users-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Anggaran</th>
                <th>Energi</th>
				<th>Daerah</th>
				<th>Kabupaten</th>
				<th>Kecamatan</th>
				<th>Kelurahan</th>
				<th>Terpasang</th>
				<th>KWh/Rumah</th>
				<th>Jumlah KWh</th>
				<th>Actions</th>
            </tr>
        </thead>
    </table>

        <!-- App scripts -->
<script>
$(function() {
    var dataebt = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('lihatebt-ajax') !!}',
        columns: [
            { data: 'nama_anggaran', name: 'nama_anggaran' },
            { data: 'nama_energi', name: 'nama_energi' },
            { data: 'nama_provinsi', name: 'nama_provinsi' },
            { data: 'nama_kabupaten', name: 'nama_kabupaten' },
            { data: 'nama_kecamatan', name: 'nama_kecamatan' },
            { data: 'nama_kelurahan', name: 'nama_kelurahan' },
            { data: 'terpasang', name: 'terpasang' },
            { data: 'kwhr', name: 'kwhr' },
            { data: 'kwh', name: 'kwh' },
			{"data":'id_data',"defaultContent":"<button>View</button>"},
        ],
		"columnDefs":[
			{"targets":9, "data":"name", "render": function(data,type,full,meta)
			 { return '<a href="{!! route('edit-dataebt') !!}?id='+data+'" class="btn btn-app btn-info btn-mini"><i class="icon-edit"></i></a>'+
			 '<a href="{{ route('destroy-dataebt') }}?id='+data+'" onclick="return confirm(\'Are you sure?\')" class="btn btn-app btn-danger btn-mini"><i class="icon-trash"></i></a>'
			}},
	
		]
    });
	
	$('#anggaran').on('change', function (e) {
		if (this.value) dataebt.ajax.url( '/lihatebt/ajax/' + this.value ).load();
	});
});
</script>
@stop
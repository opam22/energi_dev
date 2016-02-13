@extends('layout_master.master')

@section('content')
	
	<h1>Data EBT</h1>

	<a href="{{ route('create-dataebt') }}" class="btn btn-primary pull-right btn-sm">Tambah Data EBT</a>
	<br><br>

	@if(Session::has('flash_message'))
	    
	    <br><br><br>
	    <div class="alert alert-danger">
	        
	        {{ session('flash_message') }}

	    </div>

	@endif

	<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Energi</th>
				<th>Anggaran</th>
				<th>Daerah</th>
				<th>Kabupaten</th>
				<th>Kecamatan</th>
				<th>Kelurahan</th>
				<th>Terpasang</th>
				<th>KWh/Rumah</th>
				<th>Jumlah KWh</th>
				<th>Keterangan</th>
				<th>Actions</th>
            </tr>
        </thead>
    </table>
<!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
		<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
        <!-- Bootstrap JavaScript -->
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- App scripts -->

	
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('dataebt-ajax') !!}',
        columns: [
            { data: 'nama_energi', name: 'nama_energi' },
            { data: 'nama_anggaran', name: 'nama_anggaran' },
            { data: 'nama_provinsi', name: 'nama_provinsi' },
            { data: 'nama_kabupaten', name: 'nama_kabupaten' },
            { data: 'nama_kecamatan', name: 'nama_kecamatan' },
            { data: 'nama_kelurahan', name: 'nama_kelurahan' },
            { data: 'terpasang', name: 'terpasang' },
            { data: 'kwhr', name: 'kwhr' },
            { data: 'kwh', name: 'kwh' },
            { data: 'data_keterangan', name: 'data_keterangan' },
			{"data":'id_data',"defaultContent":"<button>View</button>"},
        ],
		"columnDefs":[
			{"targets":10, "data":"name", "render": function(data,type,full,meta)
			 { return '<a href="{!! route('edit-dataebt') !!}?id='+data+'" class="btn btn-app btn-info btn-mini"><i class="icon-edit"></i></a>'+
			 '<a href="{{ route('destroy-dataebt') }}?id='+data+'" onclick="return confirm(\'Are you sure?\')" class="btn btn-app btn-danger btn-mini"><i class="icon-trash"></i></a>'
			}},
	
		]
    });
});
</script>
@stop
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
                <th>{{ $cname }}</th>
				<th>Jenis Energi</th>
				<th>Posisi</th>
				<th>Terpasang</th>
				<th>Jumlah KWh</th>
				<th>KWh/Rumah</th>
				<th>Detail</th>
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
        ajax: '{!! route('report-ajax') !!}{{ $id }}',
        columns: [
            { data: '{{ $fname }}', name: '{{ $fname }}' },
            { data: 'nama_energi', name: 'nama_energi' },
            { data: 'posisi', name: 'posisi' },
            { data: 'terpasang', name: 'terpasang' },
            { data: 'kwh', name: 'kwh'},
            { data: 'kwhr', name: 'kwhr'},
			{ data: '{{ $sname }}', name: '{{ $sname }}',"defaultContent":"<button>View</button>"},
        ],
		"columnDefs":[
			{"targets":6, "data":"name", "render": function(data,type,full,meta)
			 { return '<a href="{!! route('report') !!}/{{ $sname }}/'+data+'" class="btn btn-app btn-info btn-mini"><i class="icon-eye-open"></i></a>'
			}},
	
		]
    });
});
</script>
@stop
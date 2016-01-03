@extends('layout_master.master')

@section('content')
	
	<h1>Management User</h1>

	<a href="{{ route('management-user-add') }}" class="btn btn-primary">Tambah User</a>
	<br><br>

	@if(Session::has('flash_message'))
	    
	    <br><br><br>
	    <div class="alert alert-danger">
	        
	        {{ session('flash_message') }}

	    </div>

	@endif

	<table id="tabelsaku" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $row)
			<tr>
				<td>{{ $row->username }}</td>
				<td>{{ $row->name }}</td>
				<td>{{ $row->email }}</td>
				@foreach($row->roles as $role)
					<td>{{ $role->name }}</td>
				@endforeach
			</tr>
		@endforeach
		</tbody>
	</table>
	
	<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.js') }}"></script>
	<script type="text/javascript">
	    $(document).ready(function() {
	        $('#tabelsaku').DataTable();
	    });
	</script>

@stop
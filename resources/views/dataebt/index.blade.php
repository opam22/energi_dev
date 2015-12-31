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

	<table class="table">
		<thead>
			<tr>
				<th>Energi</th>
				<th>Daerah</th>
				<th>Terpasang</th>
				<th>Jumlah KWh</th>
			</tr>
		</thead>
		<tbody>
		@foreach($dataebt as $row)
			<tr>
				<td>{{ $row->nama_energi }}</td>
				<td>{{ $row->nama_provinsi }}, {{ $row->nama_kabupaten }}, {{ $row->nama_kecamatan }}, {{ $row->nama_kelurahan }}</td>
				<td>{{ $row->terpasang }}</td>
				<td>{{ $row->kwh }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	

@stop
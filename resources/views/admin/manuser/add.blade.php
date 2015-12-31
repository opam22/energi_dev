@extends('layout_master.master')

@section('content')
	
	<h1>Tambah User</h1>

	@if ($errors->any())
	    <ul class="alert alert-danger">
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	@endif

	{!! Form::open(['route' => 'management-user-store']) !!}


	<div class="form-group"> 
		{!! Form::label('username', 'Username:') !!}
		{!! Form::text('username', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group"> 
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group"> 
		{!! Form::label('email', 'Email:') !!}
		{!! Form::text('email', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group"> 
		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group"> 
		{!! Form::label('password_confirmation', 'Re-Password:') !!}
		{!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group"> 
		{!! Form::label('role', 'Role:') !!}
		<select name="role">
			<option value="1">Admin</option>
			<option value="2">User</option>
		</select>
	</div>



	<div class="form-group"> 
		{!! Form::submit('Submit', ['class' => 'btn btn-danger form-control']) !!}
	</div>

	{!! Form::close() !!}
	

@stop
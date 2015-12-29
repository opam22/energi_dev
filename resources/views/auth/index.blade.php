@extends('master_auth')

@section('content')
	
	<h1>Login</h1>

	<div class="col-md-6">
		{!! Form::open(['route' => 'do-login']) !!}

		<div class="form-group"> 
			{!! Form::label('email', 'Email..') !!}
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group"> 
			{!! Form::label('password', 'Password..') !!}
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group"> 
			{!! Form::submit('Log in', ['class' => 'btn btn-danger form-control']) !!}
		</div>

		{!! Form::close() !!}
	</div>
	
	

@stop
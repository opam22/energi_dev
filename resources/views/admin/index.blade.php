@extends('layout_master.master')

@section('content')
	
	<h1>admin {{ Auth::user()->username }} </h1>

	<a href="{{ route('do-logout') }}" class="btn btn-danger">Logout</a>
	

@stop
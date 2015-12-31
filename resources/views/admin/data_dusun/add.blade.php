@extends('layout_master.master')

@section('content')

    <h1>Edit</h1>
    <hr/>

    {!! Form::open(['route' => 'data-dusun-store']) !!}

         <div class="form-group"> 
            {!! Form::label('nama_dusun', 'Nama Dusun :') !!}
            {!! Form::text('nama_dusun', null, ['class' => 'form-control']) !!}
         </div>

         <div class="form-group"> 
            {!! Form::label('id_kelurahan', 'Kelurahan :') !!}
            {!! Form::select('id_kelurahan', $kelurahans , null, ['class' => 'form-control']) !!}
         </div>

    
          <div class="form-group"> 
            {!! Form::submit('Add', ['class' => 'btn btn-primary form-control']) !!}
          </div>

    {!! Form::close() !!}

@endsection
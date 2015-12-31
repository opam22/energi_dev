@extends('layout_master.master')

@section('content')

    <h1>Edit</h1>
    <hr/>

    {!! Form::open(['route' => 'data-provinsi-store']) !!}

          
          <div class="form-group"> 
            {!! Form::label('id_provinsi', 'Id provinsi :') !!}
            {!! Form::text('id_provinsi', null, ['class' => 'form-control']) !!}
         </div>

         <div class="form-group"> 
            {!! Form::label('nama_provinsi', 'Nama provinsi :') !!}
            {!! Form::text('nama_provinsi', null, ['class' => 'form-control']) !!}
         </div>
    
          <div class="form-group"> 
            {!! Form::submit('Add', ['class' => 'btn btn-primary form-control']) !!}
          </div>

    {!! Form::close() !!}

@endsection
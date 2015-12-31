@extends('layout_master.master')

@section('content')

    <h1>Edit</h1>
    <hr/>

    {!! Form::model($provinsi, ['route' => ['data-provinsi-update', $provinsi->id_provinsi]]) !!}

          
          <div class="form-group"> 
            {!! Form::label('id_provinsi', 'Id provinsi :') !!}
            {!! Form::text('id_provinsi', null, ['class' => 'form-control']) !!}
         </div>

         <div class="form-group"> 
            {!! Form::label('nama_provinsi', 'Nama provinsi :') !!}
            {!! Form::text('nama_provinsi', null, ['class' => 'form-control']) !!}
         </div>
    
          <div class="form-group"> 
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
          </div>

    {!! Form::close() !!}

@endsection
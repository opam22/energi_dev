@extends('layout_master.master')

@section('content')

    <h1>Edit</h1>
    <hr/>

    {!! Form::open(['route' => 'data-kabupaten-store']) !!}

          
          <div class="form-group"> 
            {!! Form::label('id_kabupaten', 'Id Kabupaten :') !!}
            {!! Form::text('id_kabupaten', null, ['class' => 'form-control']) !!}
         </div>

         <div class="form-group"> 
            {!! Form::label('nama_kabupaten', 'Nama Kabupaten :') !!}
            {!! Form::text('nama_kabupaten', null, ['class' => 'form-control']) !!}
         </div>

         <div class="form-group"> 
            {!! Form::label('id_provinsi', 'Provinsi :') !!}
            {!! Form::select('id_provinsi', $provinsies , null, ['class' => 'form-control']) !!}
         </div>

         <div class="form-group"> 
            {!! Form::label('id_jenis', 'Id Jenis :') !!}
            <input type="number" name="id_jenis">
         </div>
    
          <div class="form-group"> 
            {!! Form::submit('Add', ['class' => 'btn btn-primary form-control']) !!}
          </div>

    {!! Form::close() !!}

@endsection
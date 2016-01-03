@extends('layout_master.master')

@section('content')

    <h1>Add</h1>
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
            {!! Form::label('id_jenis', 'Jenis :') !!}
            {!! Form::select('id_jenis', $jenis , null, ['class' => 'form-control']) !!}
         </div>
    
          <div class="form-group"> 
            {!! Form::submit('Add', ['class' => 'btn btn-primary form-control']) !!}
            {!! HTML::link('./kabupaten/', 'Cancel', array('class' => 'btn btn-primary form-control')) !!}
          </div>

    {!! Form::close() !!}

@endsection

@extends('layout_master.master')

@section('content')

    <h1>Edit</h1>
    <hr/>

    {!! Form::model($kecamatan, ['route' => ['data-kecamatan-update', $kecamatan->id_kecamatan]]) !!}

          
          <div class="form-group"> 
            {!! Form::label('id_kecamatan', 'Id Kecamatan :') !!}
            {!! Form::text('id_kecamatan', null, ['class' => 'form-control']) !!}
         </div>

         <div class="form-group"> 
            {!! Form::label('nama_kecamatan', 'Nama kecamatan :') !!}
            {!! Form::text('nama_kecamatan', null, ['class' => 'form-control']) !!}
         </div>

         <div class="form-group"> 
            {!! Form::label('id_kabupaten', 'Nama Kabupaten :') !!}
            {!! Form::select('id_kabupaten', $kabupatens , null, ['class' => 'form-control']) !!}
         </div>

    
          <div class="form-group"> 
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
          </div>

    {!! Form::close() !!}

@endsection
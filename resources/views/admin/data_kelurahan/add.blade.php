@extends('layout_master.master')

@section('content')

    <h1>Edit</h1>
    <hr/>

    {!! Form::open(['route' => 'data-kelurahan-store']) !!}

          
          <div class="form-group"> 
            {!! Form::label('id_kelurahan', 'Id kelurahan :') !!}
            {!! Form::text('id_kelurahan', null, ['class' => 'form-control']) !!}
         </div>

         <div class="form-group"> 
            {!! Form::label('nama_kelurahan', 'Nama kelurahan :') !!}
            {!! Form::text('nama_kelurahan', null, ['class' => 'form-control']) !!}
         </div>

         <div class="form-group"> 
            {!! Form::label('id_kecamatan', 'Kecamatan :') !!}
            {!! Form::select('id_kecamatan', $kecamatans , null, ['class' => 'form-control']) !!}
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
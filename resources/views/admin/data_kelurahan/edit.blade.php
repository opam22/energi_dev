@extends('layout_master.master')

@section('content')

    <h1>Edit</h1>
    <hr/>

    {!! Form::model($kelurahan, ['route' => ['data-kelurahan-update', $kelurahan->id_kelurahan]]) !!}

          
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
            <input type="number" name="id_jenis" value="{{ $kelurahan->id_jenis }}">
         </div>
    
          <div class="form-group"> 
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
          </div>

    {!! Form::close() !!}

@endsection
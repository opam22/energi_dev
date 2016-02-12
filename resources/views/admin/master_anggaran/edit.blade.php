@extends('layout_master.master')

@section('content')

    <h1>Edit</h1>
    <hr/>

    {!! Form::model($anggaran, ['route' => ['master-anggaran-update', $anggaran->id_anggaran]]) !!}

          
          <div class="form-group"> 
            {!! Form::label('nama_anggaran', 'Nama Anggaran :') !!}
            {!! Form::text('nama_anggaran', null, ['class' => 'form-control']) !!}
         </div>

         <div class="form-group"> 
            {!! Form::label('keterangan', 'Keterangan:') !!}
            {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
         </div>
    
          <div class="form-group"> 
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
          </div>

    {!! Form::close() !!}

@endsection
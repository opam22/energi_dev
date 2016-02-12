@extends('layout_master.master')

@section('content')

    <h1>Edit kabupaten</h1>
    <hr/>

    {!! Form::model($kabupaten, [
        'route' => ['kabupaten-update', $kabupaten->id_kabupaten],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="control-group {{ $errors->has('id_kabupaten') ? 'has-error' : ''}}">
                {!! Form::label('id_kabupaten', 'Id Kab: ', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('id_kabupaten', null, ['readonly', 'class' => 'form-control']) !!}
                    {!! $errors->first('id_kabupaten', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="control-group {{ $errors->has('id_provinsi') ? 'has-error' : ''}}">
                {!! Form::label('id_provinsi', 'Provinsi: ', ['class' => 'control-label']) !!}
                <div class="controls">
				{!! Form::select('id_provinsi', $provinsi, $kabupaten->id_provinsi, ['class' => 'form-control']) !!}
                    {!! $errors->first('id_provinsi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="control-group {{ $errors->has('nama_kabupaten') ? 'has-error' : ''}}">
                {!! Form::label('nama_kabupaten', 'Nama: ', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('nama_kabupaten', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nama_kabupaten', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-actions">
            {!! Form::button('<i class="icon-ok bigger-110"></i> Update', array(
            'type' => 'submit',
            'class'=> 'btn btn-primary btn-sm'
            //'onclick'=>'return confirm("Are you sure?")'
    )); !!}

            <a href="/kabupaten" class="btn btn-info btn-sm">
                <i class="icon-edit"></i>
                Cancel
            </a>
            </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
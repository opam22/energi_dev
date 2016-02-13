@extends('layout_master.master')

@section('content')

    <h1>Create New</h1>
    <hr/>

    {!! Form::open(['route' => 'master-anggaran-store', 'class' => 'form-horizontal']) !!}

                <div class="control-group {{ $errors->has('nama_anggaran') ? 'has-error' : ''}}">
                {!! Form::label('nama_anggaran', 'Nama Anggaran: ', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('nama_anggaran', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nama_anggaran', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="control-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
                {!! Form::label('keterangan', 'Keterangan: ', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-actions">
            {!! Form::button('<i class="icon-ok bigger-110"></i> Submit', array(
            'type' => 'submit',
            'class'=> 'btn btn-primary btn-sm'
            //'onclick'=>'return confirm("Are you sure?")'
    )); !!}

            <a href="/angarans" class="btn btn-info btn-sm">
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
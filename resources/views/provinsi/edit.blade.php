@extends('layout_master.master')

@section('content')
    <h1>Edit Provin</h1>
    <hr/>

    {!! Form::model($provinsi, [
        'route' => ['provinsi-update', $provinsi->id_provinsi],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="control-group {{ $errors->has('id_provinsi') ? 'has-error' : ''}}">
                {!! Form::label('id_provinsi', 'Id Prov: ', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('id_provinsi', null, ['readonly', 'class' => 'form-control']) !!}
                    {!! $errors->first('id_provinsi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="control-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                {!! Form::label('nama_provinsi', 'Nama: ', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('nama_provinsi', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nama_provinsi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-actions">
            {!! Form::button('<i class="icon-ok bigger-110"></i> Update', array(
            'type' => 'submit',
            'class'=> 'btn btn-primary btn-sm'
            //'onclick'=>'return confirm("Are you sure?")'
    )); !!}

            <a href="/provinsi" class="btn btn-info btn-sm">
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
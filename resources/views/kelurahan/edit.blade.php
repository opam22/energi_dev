@extends('layout_master.master')

@section('content')

    <h1>Edit kelurahan</h1>
    <hr/>

    {!! Form::model($kelurahan, [
        'route' => ['kelurahan-update', $kelurahan->id_kelurahan],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="control-group {{ $errors->has('id_kelurahan') ? 'has-error' : ''}}">
                {!! Form::label('id_kelurahan', 'Id Kel: ', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('id_kelurahan', null, ['readonly', 'class' => 'form-control']) !!}
                    {!! $errors->first('id_kelurahan', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="control-group {{ $errors->has('id_kecamatan') ? 'has-error' : ''}}">
                {!! Form::label('id_kecamatan', 'Kecamatan: ', ['class' => 'control-label']) !!}
                <div class="controls">
				{!! Form::select('id_kecamatan', $kecamatan, $kelurahan->id_kecamatan, ['class' => 'form-control']) !!}
                    {!! $errors->first('id_kecamatan', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="control-group {{ $errors->has('nama_kelurahan') ? 'has-error' : ''}}">
                {!! Form::label('nama_kelurahan', 'Nama: ', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('nama_kelurahan', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nama_kelurahan', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-actions">
            {!! Form::button('<i class="icon-ok bigger-110"></i> Update', array(
            'type' => 'submit',
            'class'=> 'btn btn-primary btn-sm'
            //'onclick'=>'return confirm("Are you sure?")'
    )); !!}

            <a href="/kelurahan" class="btn btn-info btn-sm">
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
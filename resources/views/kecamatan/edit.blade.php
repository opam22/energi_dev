@extends('layout_master.master')

@section('content')

    <h1>Edit kecamatan</h1>
    <hr/>

    {!! Form::model($kecamatan, [
        'route' => ['kecamatan-update', $kecamatan->id_kecamatan],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="control-group {{ $errors->has('id_kecamatan') ? 'has-error' : ''}}">
                {!! Form::label('id_kecamatan', 'Id Kec: ', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('id_kecamatan', null, ['readonly', 'class' => 'form-control']) !!}
                    {!! $errors->first('id_kecamatan', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="control-group {{ $errors->has('id_kabupaten') ? 'has-error' : ''}}">
                {!! Form::label('id_kabupaten', 'Kabupaten: ', ['class' => 'control-label']) !!}
                <div class="controls">
				{!! Form::select('id_kabupaten', $kabupaten, $kecamatan->id_kabupaten, ['class' => 'form-control']) !!}
                    {!! $errors->first('id_kabupaten', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="control-group {{ $errors->has('nama_kecamatan') ? 'has-error' : ''}}">
                {!! Form::label('nama_kecamatan', 'Nama: ', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('nama_kecamatan', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nama_kecamatan', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-actions">
            {!! Form::button('<i class="icon-ok bigger-110"></i> Update', array(
            'type' => 'submit',
            'class'=> 'btn btn-primary btn-sm'
            //'onclick'=>'return confirm("Are you sure?")'
    )); !!}

            <a href="/kecamatan" class="btn btn-info btn-sm">
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
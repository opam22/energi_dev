@extends('layout_master.master')

@section('content')
<style type="text/css">
body,table {font-family:Calibri, Verdana, Arial, sans-serif; font-size:1em;}
select {width:240px;}
fieldset {border-radius:4px;}
#map-canvas {width:100%;height:400px;border:solid #999 1px;}
</style>
<?php print_r($dataebt);?>
	<script type="text/javascript" src="{{ asset('/assets/js/ajax_daerah.js') }}"></script>
	{!! Form::open(['route' => 'store-dataebt']) !!}
	<fieldset>
	    <legend>Data Daerah</legend>
		<table style='width:410px;float:left'>
		<tr id='ebt_box'>
			<td>Jenis Energi</td>
			<td>:</td>
			<td>
				{!! Form::select('energi', $energi, $dataebt->energi, ['class' => 'form-control']) !!}
			</td>
		</tr>
		<tr id='plts_box'>
			<td>Posisi</td>
			<td>:</td>
			<td>
				<select name="posisi" id="posisi">
					<option value="1">Terpusat</option>
					<option value="2">Tersebar</option>
				<select>
			</td>
		</tr>
		<tr id='anggaran_box'>
			<td>Anggaran</td>
			<td>:</td>
			<td>
				{!! Form::select('anggaran', $anggaran, $dataebt->anggaran, ['class' => 'form-control']) !!}
			</td>
		</tr>
		<tr id='terpasang_box'>
			<td>Jumlah Terpasang</td>
			<td>:</td>
			<td>
				{!! Form::text('terpasang', $dataebt->terpasang, ['class' => 'form-control']) !!}
			</td>
		</tr>
		<tr id='kwhr_box'>
			<td> KWh/Rumah</td>
			<td>:</td>
			<td>
				{!! Form::text('kwhr', $dataebt->kwhr, ['class' => 'form-control']) !!}
			</td>
		</tr>
		<tr id='kwh_box'>
			<td>Jumlah KWh</td>
			<td>:</td>
			<td>
				{!! Form::text('kwh', $dataebt->kwh, ['class' => 'form-control']) !!}
			</td>
		</tr>
		<tr id='keterangan_box'>
			<td>Keterangan</td>
			<td>:</td>
			<td>
				{!! Form::textarea('data_keterangan', $dataebt->data_keterangan, ['class' => 'form-control']) !!}
			</td>
		</tr>
		</table>
		<table style='float:left'>
		<tr id='prov_box'>
			<td>Provinsi</td>
			<td>:</td>
			<td>
				<select name="prov" id="prov" onchange="ajaxkota(this.value)">
					<option value="">Pilih Provinsi</option>
					@foreach ($tasks as $task)
					<option value="{{ $task->id_provinsi }}">{{ $task->nama_provinsi }}</option>
					@endforeach
				<select>
			</td>
		</tr>
		<tr id='kab_box'>
			<td>Kota/Kabubaten</td>
			<td>:</td>
			<td>
				<select name="kab" id="kab" onchange="ajaxkec(this.value)">
					<option value="">Pilih Kota</option>
				</select>
			</td>
		</tr>
		<tr id='kec_box'>
			<td>Kecamatan</td>
			<td>:</td>
			<td>
				<select name="kec" id="kec" onchange="ajaxkel(this.value)">
					<option value="">Pilih Kecamatan</option>
				</select>
			</td>
		</tr>
		<tr id='kel_box'>
			<td>Kelurahan/Desa</td>
			<td>:</td>
			<td>
				<select name="kel" id="kel" onchange="ajaxdusun(this.value);">
					<option value="">Pilih Kelurahan/Desa</option>
				</select>
			</td>
		</tr>
		<tr id='dusun_box'>
			<td>Dusun</td>
			<td>:</td>
			<td>
				<input type="text" name="dusun" id="dusun"/>
			</td>
		</tr>
		<tr id='lat_box'>
		  <td>Latitude</td>
		  <td>:</td>
		  <td><input type='text' id='lat' readonly></td>
		</tr>
		<tr id='lng_box'>
		  <td>Longitude</td>
		  <td>:</td>
		  <td><input type='text' id='lng' readonly></td>
		</tr>
		</table>
		<div id="table" style='width:200px;margin-left:80px;'>
	  </div>
	  <div class="form-actions" style="clear:both;">
            {!! Form::button('<i class="icon-ok bigger-110"></i> Submit', array(
            'type' => 'submit',
            'class'=> 'btn btn-primary btn-sm'
            //'onclick'=>'return confirm("Are you sure?")'
    )); !!}

            <a href="/" class="btn btn-info btn-sm">
                <i class="icon-edit"></i>
                Cancel
            </a>
    </div>
	</fieldset>
	{!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection


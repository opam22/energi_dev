@extends('layout_master.master')

@section('content')
<style type="text/css">
body,table {font-family:Calibri, Verdana, Arial, sans-serif; font-size:1em;}
select {width:240px;}
fieldset {border-radius:4px;}
#kab_box,#kec_box,#kel_box,#lat_box,#lng_box,#table,#plts_box,#dusun_box {display:none;}
#map-canvas {width:100%;height:400px;border:solid #999 1px;}
</style>

	<script type="text/javascript" src="{{ asset('/assets/js/ajax_daerah.js') }}"></script>
	{!! Form::open(['route' => 'store-dataebt']) !!}
	<fieldset>
	    <legend>Data Energi Daerah</legend>
		
		<table style='width:410px;float:left'>
		<tr id='ebt_box'>
			<td>Jenis Energi</td>
			<td>:</td>
			<td>
				<select name="energi" id="energi" onchange="ajaxplts(this.options[this.selectedIndex].innerHTML)">
					<option value="">Pilih Jenis Energi</option>
					@foreach ($energis as $energi)
					<option value="{{ $energi->id_energi }}">{{ $energi->nama_energi }}</option>
					@endforeach
				<select>
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
				<select name="anggaran" id="anggaran">
					<option value="">Pilih Anggaran</option>
					@foreach ($anggarans as $anggaran)
					<option value="{{ $anggaran->id_anggaran }}">{{ $anggaran->nama_anggaran }}</option>
					@endforeach
				<select>
			</td>
		</tr>
		<tr id='terpasang_box'>
			<td>Jumlah Terpasang</td>
			<td>:</td>
			<td>
				<input type="number" name="terpasang" id="terpasang"/>
			</td>
		</tr>
		<tr id='kwhr_box'>
			<td> KWh/Rumah</td>
			<td>:</td>
			<td>
				<input type="number" name="kwhr" id="kwhr"/>
			</td>
		</tr>
		<tr id='kwh_box'>
			<td>Jumlah KWh</td>
			<td>:</td>
			<td>
				<input type="number" name="kwh" id="kwh"/>
			</td>
		</tr>
		<tr id='keterangan_box'>
			<td>Keterangan</td>
			<td>:</td>
			<td>
				<textarea name="data_keterangan" id="data_keterangan"/></textarea>
			</td>
		</tr>
		</table>
		
		<table style='float:left'>
		<tr id='prov_box'>			<td>Provinsi</td>
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


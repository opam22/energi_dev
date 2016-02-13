@extends('layout_master.master')

@section('content')

    <h1>Edit</h1>
    <hr/>

    {!! Form::model($presentase, ['route' => ['master-presentasi-update', $presentase->id_presentase]]) !!}

         <div class="form-group"> 
            {!! Form::label('id_provinsi', 'Provinsi :') !!}
            {!! Form::select('id_provinsi', $provinsies , null, ['class' => 'form-control']) !!}
         </div>
        
        <div class="form-group">
          {!! Form::label('id_kabupaten', 'Kabupaten') !!}

          <select id="id_kabupaten" name="id_kabupaten" class="form-control">
                <option>-- Kabupaten / Kota --</option>
          </select> 

        </div>

         <div class="form-group">
          {!! Form::label('nilai', 'Nilai') !!}  
          {!! Form::text('nilai', null, ['class' => 'form-control']) !!}
        </div>

    
          <div class="form-group"> 
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
          </div>

    {!! Form::close() !!}


    <script type="text/javascript">
    $('#id_provinsi').on('change', function(e){
          console.log(e);
          var id_provinsi = e.target.value;
          //ajax
          $.get('/master/presentasi/api/kabupaten/' + id_provinsi, function(data){
            
            //if success data
            $('#id_kabupaten').empty();
            $.each(data, function(index, kabupatenObj){
              $('#id_kabupaten').append('<option value="' +kabupatenObj.id_kabupaten+ '">' +kabupatenObj.nama_kabupaten+ '</option>');
            });
          }); 
        });
    </script>

@endsection
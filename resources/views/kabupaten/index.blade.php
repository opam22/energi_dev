@extends('layout_master.master')

@section('content')
<div class="page-header position-relative">
                        <h1>
                            Data Master
                            <small>
                                <i class="icon-double-angle-right"></i>
                                Data Kota / Kabupaten 
                            </small>
                        </h1>
    </div><!--/.page-header-->
    <h1><a href="{{ route('kabupaten-create') }}" class="btn btn-primary pull-right btn-sm">Add New</a></h1>
    <div class="table-header">
                                  Data Kota / Kabupaten 
    </div>
    <table id="tabelsaku" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Id Kab</th><th>Prov</th><th>Nama</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($kabupaten as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/kabupaten', $item->id_kabupaten) }}">{{ $item->id_kabupaten }}</a></td><td>{{ $item->nama_provinsi }}</td><td>{{ $item->nama_kabupaten }}</td>
                    <td>
                        <a href="{{ route('kabupaten-edit', $item->id_kabupaten) }}" class="btn btn-app btn-info btn-mini">
                            <i class="icon-edit"></i>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['kabupaten-destroy', $item->id_kabupaten],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="icon-trash"></i>', array(
                                                        'type' => 'submit',
                                                        'class'=> 'btn btn-app btn-danger btn-mini',
                                                        'onclick'=>'return confirm("Are you sure?")'
                                                )); !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        <!--page specific plugin scripts-->

        <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#tabelsaku').DataTable( {
                    dom: 'T<"clear">lfrtip'
                } );
            } );
        </script>
@endsection

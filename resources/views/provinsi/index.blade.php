@extends('layout_master.master')

@section('content')
<div class="page-header position-relative">
                        <h1>
                            Data Master
                            <small>
                                <i class="icon-double-angle-right"></i>
                                Data Provinsi
                            </small>
                        </h1>
    </div><!--/.page-header-->
    <h1><a href="{{ route('provinsi-create') }}" class="btn btn-primary pull-right btn-sm">Add New</a></h1>
    <div class="table-header">
                                  Data Provinsi 
    </div>
    <table id="tabelsaku" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Id Prov</th><th>Nama</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($provinsi as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/provinsi', $item->id_provinsi) }}">{{ $item->id_provinsi }}</a></td><td>{{ $item->nama_provinsi }}</td>
                    <td>
                        <a href="{{ route('provinsi-edit', $item->id_provinsi) }}" class="btn btn-app btn-info btn-mini">
                            <i class="icon-edit"></i>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['provinsi-destroy', $item->id_provinsi],
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

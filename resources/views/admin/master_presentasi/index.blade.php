@extends('layout_master.master')

@section('content')
<div class="page-header position-relative">
                        <h1>
                            Pengelolaan Umum
                            <small>
                                <i class="icon-double-angle-right"></i>
                                Master Presentasi Daerah
                            </small>
                        </h1>
    </div><!--/.page-header-->
    <h1><a href="{{ route('master-presentasi-add') }}" class="btn btn-primary pull-right btn-sm">Add New</a></h1>
    <div class="table-header">
                                   Master Presentasi Daerah
    </div>

    <table id="tabelsaku" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Id Presentase</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Nilai</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

        @foreach($presentases as $row)

            <tr>
                <td>{{ $row->id_presentase }}</td>
                <td>{{ $row->provinsi->nama_provinsi }}</td>
                <td>{{ $row->kabupaten->nama_kabupaten }}</td>
                <td>{{ $row->nilai }}</td>
                <td>
                    <a href="{{ route('master-presentasi-edit', $row->id_presentase) }}" class="btn btn-app btn-info btn-mini">
                         <i class="icon-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('master-presentasi-destroy', $row->id_presentase) }}"  onclick="return confirm('Are you sure?');" class="btn btn-app btn-danger btn-mini">
                         <i class="icon-trash"></i>
                    </a>
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

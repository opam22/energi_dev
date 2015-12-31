@extends('layout_master.master')

@section('content')

        <div class="page-header position-relative">

              <h1>
                  Data Master
                  <small>
                    <i class="icon-double-angle-right"></i>
                         Data Kecamatan
                   </small>
               </h1>

        </div><!--/.page-header-->

        <h1><a href="{{ route('data-kecamatan-add') }}" class="btn btn-primary pull-right btn-sm">Add New</a></h1>

        <div class="table-header">
            Data Kecamatan
        </div>

        <table id="tabelsaku" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id Kec</th>
                    <th>kecamatan</th>
                    <th>Kabupaten</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            @foreach($kecamatans as $item)

                <tr>
                    <td>{{ $item->id_kecamatan }}</td>
                    <td>{{ $item->nama_kecamatan }}</td>
                    <td>{{ $item->nama_kabupaten }}</td>
                    <td>
                        <a href="{{ route('data-kecamatan-edit', $item->id_kecamatan) }}" class="btn btn-app btn-info btn-mini">
                             <i class="icon-edit"></i>
                        </a></td>
                        <td>
                        <a href="{{ route('data-kecamatan-destroy', $item->id_kecamatan) }}" class="btn btn-app btn-danger btn-mini">
                             <i class="icon-trash"></i>
                        </a></td>
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
                $('#tabelsaku').DataTable();
            });
        </script>

@endsection

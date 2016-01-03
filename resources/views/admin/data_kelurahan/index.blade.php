@extends('layout_master.master')

@section('content')

        <div class="page-header position-relative">

              <h1>
                  Data Master
                  <small>
                    <i class="icon-double-angle-right"></i>
                         Data Kelurahan
                   </small>
               </h1>

        </div><!--/.page-header-->

        <h1><a href="{{ route('data-kelurahan-add') }}" class="btn btn-primary pull-right btn-sm">Add New</a></h1>

        <div class="table-header">
            Data Kelurahan
        </div>

        <table id="tabelsaku" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id Kec</th>
                    <th>kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            @foreach($kelurahans as $item)

                <tr>
                    <td>{{ $item->id_kelurahan }}</td>
                    <td>{{ $item->nama_kelurahan }}</td>
                    <td>{{ $item->nama_kecamatan }}</td>
                    <td>
                        <a href="{{ route('data-kelurahan-edit', $item->id_kelurahan) }}" class="btn btn-app btn-info btn-mini">
                             <i class="icon-edit"></i>
                        </a></td>
                        <td>
                        <a href="{{ route('data-kelurahan-destroy', $item->id_kelurahan) }}"  onclick="return confirm('Are you sure?');" class="btn btn-app btn-danger btn-mini">
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

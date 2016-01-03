@extends('layout_master.master')

@section('content')

        <div class="page-header position-relative">

              <h1>
                  Data Master
                  <small>
                    <i class="icon-double-angle-right"></i>
                         Data Dusun
                   </small>
               </h1>

        </div><!--/.page-header-->

        <h1><a href="{{ route('data-dusun-add') }}" class="btn btn-primary pull-right btn-sm">Add New</a></h1>

        <div class="table-header">
            Data Dusun
        </div>

        <table id="tabelsaku" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id Kec</th>
                    <th>Dusun</th>
                    <th>Kelurahan</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            @foreach($dusuns as $item)

                <tr>
                    <td>{{ $item->id_dusun }}</td>
                    <td>{{ $item->nama_dusun }}</td>
                    <td>{{ $item->nama_kelurahan }}</td>
                    <td>
                        <a href="{{ route('data-dusun-edit', $item->id_dusun) }}" class="btn btn-app btn-info btn-mini">
                             <i class="icon-edit"></i>
                        </a></td>
                        <td>
                        <a href="{{ route('data-dusun-destroy', $item->id_dusun) }}"  onclick="return confirm('Are you sure?');" class="btn btn-app btn-danger btn-mini">
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

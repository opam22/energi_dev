@extends('layout_master.master')

@section('content')

    <div class="page-header position-relative">

          <h1>
              Data Master
              <small>
                <i class="icon-double-angle-right"></i>
                     Data Profinsi
               </small>
           </h1>

    </div><!--/.page-header-->

    <h1><a href="" class="btn btn-primary pull-right btn-sm">Add New</a></h1>

    <div class="table-header">
        Data Profinsi
    </div>

    <table id="tabelsaku" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Id Prov</th>
                    <th>Nama</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            @foreach($provinsi as $item)

                <tr>
                <td></td>
                    <td><a href="{{ url('/provins', $item->id_provinsi) }}">{{ $item->id_provinsi }}</a></td><td>{{ $item->nama_provinsi }}</td>
                    <td>
                        <a href="" class="btn btn-app btn-info btn-mini">
                             <i class="icon-edit"></i>
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

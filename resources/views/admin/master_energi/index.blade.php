@extends('layout_master.master')

@section('content')
    <div class="page-header position-relative">
                        <h1>
                            Pengelolaan Umum
                            <small>
                                <i class="icon-double-angle-right"></i>
                                Master Jenis EBT
                            </small>
                        </h1>
    </div><!--/.page-header-->
    <h1><a href="#" class="btn btn-primary pull-right btn-sm">Add New</a></h1>
    <div class="table-header">
                                   Jenis EBT (Energi Baru Terbarukan)
    </div>
    <table id="tabelsaku" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Nama Ebt</th>
                                            <th>Keterangan</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    {{-- */$x=0;/* --}}
                                    @foreach($listebts as $item)
                                        {{-- */$x++;/* --}}
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td><a href="#">{{ $item->nama_energi }}</a></td><td>{{ $item->keterangan }}</td>
                                            <td>
                                            <a href="#" class="btn btn-app btn-info btn-mini">
                                                <i class="icon-edit"></i>
                                            </a>
                                                {!! Form::open([
                                                    'method'=>'DELETE',
                                                   
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

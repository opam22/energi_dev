<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Kab</th>
                <th>Prov</th>
                <th>Prov</th>
            </tr>
        </thead>
    </table>
<!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- App scripts -->
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'nama_kabupaten', name: 'nama_kabupaten' },
            { data: 'nama_provinsi', name: 'nama_provinsi' },
			{"data":'id_kabupaten',"defaultContent":"<button>View</button>"},
        ],
		"columnDefs":[{"targets":2, "data":"name", "render": function(data,type,full,meta)
 { return '<a href="{!! route('datatables.data') !!}?id='+data+'" class="btn btn-app btn-info btn-mini"><i class="icon-edit"></i></a>'
}}]
    });
});
</script>
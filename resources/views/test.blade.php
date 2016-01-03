<link href="http://127.0.0.1/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="http://127.0.0.1/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="http://127.0.0.1/assets/css/font-awesome.min.css" />
		<link href="http://127.0.0.1/assets/images/favicon.ico" rel="shortcut icon" /> 
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://127.0.0.1/assets/font/myfont1.css" />

		<!--ace styles-->

		<link rel="stylesheet" href="http://127.0.0.1/assets/css/ace.min.css" />
		<link rel="stylesheet" href="http://127.0.0.1/assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="http://127.0.0.1/assets/css/ace-skins.min.css" />

		<link rel="stylesheet" href="http://127.0.0.1/assets/css/custom.css" />

		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Energi</th>
				<th>Anggaran</th>
				<th>Daerah</th>
				<th>Kabupaten</th>
				<th>Kecamatan</th>
				<th>Kelurahan</th>
				<th>Terpasang</th>
				<th>KWh/Rumah</th>
				<th>Jumlah KWh</th>
				<th>Keterangan</th>
				<th>Actions</th>
            </tr>
        </thead>
    </table>
<!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
		<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
        <!-- Bootstrap JavaScript -->
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- App scripts -->
			
	
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'nama_energi', name: 'nama_energi' },
            { data: 'nama_anggaran', name: 'nama_anggaran' },
            { data: 'nama_provinsi', name: 'nama_provinsi' },
            { data: 'nama_kabupaten', name: 'nama_kabupaten' },
            { data: 'nama_kecamatan', name: 'nama_kecamatan' },
            { data: 'nama_kelurahan', name: 'nama_kelurahan' },
            { data: 'terpasang', name: 'terpasang' },
            { data: 'kwhr', name: 'kwhr' },
            { data: 'kwh', name: 'kwh' },
            { data: 'data_keterangan', name: 'data_keterangan' },
			{"data":'id_data',"defaultContent":"<button>View</button>"},
        ],
		"columnDefs":[
			{"targets":10, "data":"name", "render": function(data,type,full,meta)
			 { return '<a href="{!! route('datatables.data') !!}?id='+data+'" class="btn btn-app btn-info btn-mini"><i class="icon-edit"></i></a>'+
			 '<a href="{{ route('datatables.data') }}?id='+data+'" class="btn btn-app btn-danger btn-mini"><i class="icon-trash"></i></a>'
			}},
	
		]
    });
});
</script>
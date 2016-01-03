<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>EBT</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />
		<link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon" /> 
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="{{ asset('assets/font/myfont1.css') }}" />

		<!--ace styles-->

		<link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/ace-responsive.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />

		<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
		<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
	</head>

	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<img class="nav-user-photo" src="{{ asset('assets/images/logo1.png') }}" alt="logo kemendes" />
							 Database Sarana dan Prasarana Energi
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">

						<li class="light-green">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="{{ asset('assets/avatars/user.jpg') }}" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome, </small>
									{{ Auth::user()->name }}
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="{{ route('profile') }}">
										<i class="icon-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="{{ route('do-logout') }}">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li>
						<a href="/">
							<i class="icon-desktop"></i>
							<span class="menu-text"> Home </span>
						</a>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-bolt"></i>
							<span class="menu-text"> Data EBT</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="/dataebt">
									<i class="icon-double-angle-right"></i>
									Lihat Data EBT
								</a>
							</li>

							<li>
								<a href="/dataebt/create">
									<i class="icon-double-angle-right"></i>
									Kelola Data EBT
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-eye-open"></i>
							<span class="menu-text"> Anggaran EBT</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="#">
									<i class="icon-double-angle-right"></i>
									Lihat Anggaran EBT
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-cog"></i>
							<span class="menu-text"> Pengelolaan Umum</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="{{ route('master-anggaran') }}">
									<i class="icon-double-angle-right"></i>
									Master Anggaran
								</a>
							</li>

							<li>
								<a href="{{ route('master-energi') }}">
									<i class="icon-double-angle-right"></i>
									Master Jenis EBT
								</a>
							</li>

							<li>
								<a href="{{ route('master-instansi') }}">
									<i class="icon-double-angle-right"></i>
									Master Instansi
								</a>
							</li>
							<li>
								<a href="{{ route('master-potensi') }}">
									<i class="icon-double-angle-right"></i>
									Master Potensi Daerah
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-cogs"></i>
							<span class="menu-text"> Data Master</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="{{ route('data-provinsi') }}">
								<i class="icon-double-angle-right"></i>
									Data Provinsi
								</a>
							</li>

							<li>
								<a href="{{ route('data-kabupaten') }}">
									<i class="icon-double-angle-right"></i>
									Data Kota/Kabupaten
								</a>
							</li>

							<li>
								<a href="{{ route('data-kecamatan') }}">
								<i class="icon-double-angle-right"></i>
									Data Kecamatan
								</a>
							</li>

							<li>
								<a href="{{ route('data-kelurahan') }}">
								<i class="icon-double-angle-right"></i>
									Data Kelurahan/Desa
								</a>
							</li>
							<li>
								<a href="{{ route('data-dusun') }}">
									<i class="icon-double-angle-right"></i>
									Data Dusun
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{ route('management-user') }}">
							<i class="icon-user"></i>
							<span class="menu-text"> Kelola Pengguna </span>
						</a>
					</li>
						
					
						
						


					
<!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="#">Home</a>
						</li>
					</ul><!--.breadcrumb-->
				</div>

				<div class="page-content">
					
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							@yield('content')
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-mini btn-info ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-class="default" value="#438EB9" />#438EB9
									<option data-class="skin-1" value="#222A2D" />#222A2D
									<option data-class="skin-2" value="#C6487E" />#C6487E
									<option data-class="skin-3" value="#D0D0D0" />#D0D0D0
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
							<label class="lbl" for="ace-settings-header"> Fixed Header</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>
					</div>
				</div><!--/#ace-settings-container-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
		<script src="{{ asset('assets/js/ace.min.js') }}"></script>

		<!--inline scripts related to this page-->
	</body>
</html>

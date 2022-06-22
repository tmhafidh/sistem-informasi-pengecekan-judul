<?php

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

$judul = query("SELECT * FROM tb_judul ORDER BY tahun DESC");
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Pengecekan Judul</title>
	<!-- Favicon-->
	<link rel="icon" href="search.ico" type="image/x-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<!-- Bootstrap Core Css -->
	<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Waves Effect Css -->
	<link href="plugins/node-waves/waves.css" rel="stylesheet" />

	<!-- Animation Css -->
	<link href="plugins/animate-css/animate.css" rel="stylesheet" />

	<!-- JQuery DataTable Css -->
	<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

	<!-- Custom Css -->
	<link href="css/style.css" rel="stylesheet">

	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-blue">
	<!-- Page Loader -->
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="preloader">
				<div class="spinner-layer pl-blue">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<p>Please wait...</p>
		</div>
	</div>
	<!-- #END# Page Loader -->
	<!-- Overlay For Sidebars -->
	<div class="overlay"></div>
	<!-- #END# Overlay For Sidebars -->
	<!-- Top Bar -->
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="table.php">PENGECEKAN JUDUL </a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php"><i class="material-icons">input</i></a></li>
					<li><a href="registrasi.php"><i class="material-icons">person</i></a></li>
			</div>
		</div>
	</nav>
	<!-- #Top Bar -->
	<!-- <section class="content"> -->
	<div class="container-fluid">
		<div class="block-header">
			<h2>
				PENGECEKAN JUDUL
				<small>PENGECEKAN JUDUL <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
			</h2>
			<br>
		</div>
		<!-- Basic Examples -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<a href="tambahjudul.php" class="btn btn-success waves-effect">Tambah Judul</a>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
								<thead>
									<tr>
										<th>No.</th>
										<th>Judul</th>
										<th>Nama</th>
										<th>NIM</th>
										<th>Tahun</th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No.</th>
										<th>Judul</th>
										<th>Nama</th>
										<th>NIM</th>
										<th>Tahun</th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</tfoot>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($judul as $row) : ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $row["judul"]; ?></td>
											<td><?= $row["nama"]; ?></td>
											<td><?= $row["nim"]; ?></td>
											<td><?= $row["tahun"]; ?></td>
											<td><a class="btn btn-success waves-effect" href="abstrakadmin.php?id_judul=<?= $row["id_judul"]; ?>">Abstrak</a></td>
											<td>

												<a href="hapusjudul.php?id_judul=<?= $row["id_judul"]; ?>" onclick="return confirm('Apakah anda menghapus ?');" class="btn btn-danger waves-effect">Hapus</a>
											</td>
											<td>
												<a href="ubahjudul.php?id_judul=<?= $row["id_judul"]; ?>" class="btn btn-info waves-effect">Edit</a>
											</td>
										</tr>
										<?php $i++; ?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Basic Examples -->
	</div>
	</section>

	<!-- Jquery Core Js -->
	<script src="plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap Core Js -->
	<script src="plugins/bootstrap/js/bootstrap.js"></script>

	<!-- Select Plugin Js -->
	<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

	<!-- Slimscroll Plugin Js -->
	<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Waves Effect Plugin Js -->
	<script src="plugins/node-waves/waves.js"></script>

	<!-- Jquery DataTable Plugin Js -->
	<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
	<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<!-- Custom Js -->
	<script src="js/admin.js"></script>
	<script src="js/pages/tables/jquery-datatable.js"></script>

	<!-- Demo Js -->
	<script src="js/demo.js"></script>
</body>

</html>
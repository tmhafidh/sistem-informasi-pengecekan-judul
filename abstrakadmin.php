<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}



require 'functions.php';



//ambil data di url
$id_judul = $_GET["id_judul"];

// query data kamar berdasarkan id
$query = mysqli_query($conn, "SELECT * FROM tb_judul WHERE id_judul = '$id_judul;'");

$row_query = mysqli_fetch_array($query);

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
            <br> <br> <br> <br>
        </div>
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Informasi Judul Laporan Kerja Prakrtek
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $row_query["judul"]; ?></td>
                                <tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $row_query["nama"]; ?></td>
                                <tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $row_query["nim"]; ?></td>
                                <tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $row_query["tahun"]; ?></td>
                                <tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Abstrak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: justify;"><?= nl2br($row_query["abstrak"]); ?></td>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Table -->
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

    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
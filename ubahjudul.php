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
$judul = query("SELECT * FROM tb_judul WHERE id_judul = '$id_judul'")[0];

// cek apakah tombol submit udah di tekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di ubah atau tidak
    if (ubahjudul($_POST) > 0) {
        echo "
			<script>
				alert('Data berhsail diubah!');
                document.location.href = 'table.php';
			</script>
		";
    } else {
        echo
        "
			<script>
				alert('Data gagal diubah');
                document.location.href = 'table.php';
                </script>
			</script>
		";
    }
}

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

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
                <a class="navbar-brand" href="table.php">PENGECEKAN JUDUL</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><i class="material-icons">input</i></a></li>
                    <li><a href="registrasi.php"><i class="material-icons">person</i></a></li>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <div class="container-fluid">
        <div class="block-header">
            <br><br><br><br><br>
            <h2>Ubah Data Judul Laporan Praktek</h2>
        </div>
        <!-- Input -->
        <form class="" action="" method="post">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float form-group-lg">
                                        <input type="hidden" name="id_judul" value="<?= $judul["id_judul"] ?>" \>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="judul" name="judul" required value="<?= $judul["judul"] ?>" />
                                            <label class="form-label" for="judul">Judul</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float form-group-lg">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="nama" name="nama" required value="<?= $judul["nama"] ?>" />
                                            <label class="form-label" for="nama">Nama</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float form-group-lg">
                                        <div class="form-line">
                                            <input class="form-control" type="number" id="nim" name="nim" required value="<?= $judul["nim"] ?>" />
                                            <label class="form-label" for="nim">NIM</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float form-group-lg">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="tahun" name="tahun" required value="<?= $judul["tahun"] ?>" />
                                            <label class="form-label" type="number" for="tahun">Tahun</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float form-group-lg">
                                        <div class="form-line">
                                            <textarea rows="1" class="form-control no-resize auto-growth" id="abstrak" name="abstrak"><?= $judul["abstrak"] ?></textarea>
                                            <label class="form-label">Abstrak</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float form-group-lg">
                                        <button type="submit" name="submit" class="btn btn-success waves-effect" id="ubah">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </form>
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

    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
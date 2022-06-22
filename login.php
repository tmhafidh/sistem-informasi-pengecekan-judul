<?php
session_start();

require 'functions.php';

// //cek cookie
// if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
//     $id = $_COOKIE['id'];
//     $key = $_COOKIE['key'];


//     //ambil username berdasarkan id
//     $result = mysqli_query($conn, "SELECT username FROM user WHERE id = '$id'");
//     $row = mysqli_fetch_assoc($result);


//     //cek cookie dan username
//     if ($key === hash('sha256', $row['username'])) {
//         $_SESSION['login'] = true;
//     }
// }


if (isset($_SESSION["login"])) {
    header("Location: table.php");
    exit;
}



if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];


    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {

        //cek pas
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session 
            $_SESSION["login"] = true;


            // //cek remember me
            // if (isset($_POST['remember'])) {
            //     //buat cookie

            //     setcookie('id', $row['id'], time() + 3600);
            //     setcookie('key', hash('sha256', $row['username']), time() + 3600);
            // }


            header("Location: table.php");
            exit;
        }
    }

    $eror = true;
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
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

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="index.php">Admin<b> LOGIN</b></a>
            <small>Pengecekan Judul Laporan Kerja Praktek</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Silahkan Masuk</div>
                    <?php if (isset($eror)) : ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Username / Password Salah!</strong>
                        </div>
                    <?php endif; ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="login">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>
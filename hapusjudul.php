<?php

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$id_judul = $_GET['id_judul'];

if (hapusjudul($id_judul) > 0) {
	echo
	"
			<script>
				alert('Data Berhasil dihapus!');
				document.location.href = 'table.php';
			</script>
		";
} else {
	echo
	"
			<script>
				alert('Data gagal dihapus!');
				document.location.href = 'table.php';
		 	</script>
		";
}

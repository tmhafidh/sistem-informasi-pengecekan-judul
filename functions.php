<?php
// konekasi ke database
$conn  = mysqli_connect("Localhost", "root", "", "judul");



function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}



function tambahjudul($datajudul)
{
	global $conn;

	$judul = htmlspecialchars($datajudul["judul"]);
	$nama = htmlspecialchars($datajudul["nama"]);
	$nim = htmlspecialchars($datajudul["nim"]);
	$tahun = htmlspecialchars($datajudul["tahun"]);
	$abstrak = ($datajudul["abstrak"]);

	$query = "INSERT INTO tb_judul VALUES ('','$judul','$nama','$nim','$tahun','$abstrak')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}




function hapusjudul($id_judul)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_judul WHERE id_judul = '$id_judul'");
	return mysqli_affected_rows($conn);
}




function ubahjudul($datajudul)
{
	global $conn;

	$id_judul = $datajudul["id_judul"];
	$judul = htmlspecialchars($datajudul["judul"]);
	$nama = htmlspecialchars($datajudul["nama"]);
	$nim = htmlspecialchars($datajudul["nim"]);
	$tahun = htmlspecialchars($datajudul["tahun"]);
	$abstrak = htmlspecialchars($datajudul["abstrak"]);

	$query = "UPDATE `tb_judul` SET `id_judul`='$id_judul',`judul`='$judul',`nama`='$nama',`nim`='$nim',`tahun`='$tahun',`abstrak`='$abstrak' WHERE `id_judul`='$id_judul'";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function registrasi($data)
{
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek username udah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "
		<script>
		alert('username sudah terdaftar!')
		</script>
		";
		return false;
	}

	//cek konfirmasi password
	if ($password !== $password2) {
		echo "
		<script>
		alert('konfirmasi password tidak sesuai!')
		</script>
		";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke db
	mysqli_query($conn, "INSERT INTO admin VALUES('','$username', '$password') ");

	return mysqli_affected_rows($conn);
}

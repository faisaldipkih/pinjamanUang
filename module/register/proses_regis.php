<?php 

	include_once "../../function/koneksi.php";

		$level = "nasabah";
		$nama_user = $_POST["nama_user"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$button = $_POST["button"];

		$nama_foto = $_FILES["foto"]["name"];
		$tmp_name = $_FILES["foto"]["tmp_name"];

		move_uploaded_file($tmp_name, "../../foto/".$nama_foto);

		mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$nama_user', '$nama_foto', '$username', '$password', '$level')");

		header("Location: ../../");
	
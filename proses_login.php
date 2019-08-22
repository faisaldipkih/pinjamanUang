<?php 

	include_once "function/koneksi.php";

	$username = $_POST["username"];
	$password = $_POST["password"];

	$query_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

	if(mysqli_num_rows($query_user) == 0){
		header("Location: index.php?pageC=login&notif=true");
	}else{
		$row = mysqli_fetch_assoc($query_user);

		session_start();

		$_SESSION["id_user"]	= $row["id_user"];
		$_SESSION["nama_user"]	= $row["nama_user"];
		$_SESSION["level"]		= $row["level"];
		
		header("Location: index.php?page=content&module=user&action=akun");
	}
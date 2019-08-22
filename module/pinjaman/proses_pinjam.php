<?php 

	include_once "../../function/koneksi.php";
	include_once "../../function/helper.php";

	$id_user		= $_POST["id_user"];
	$tanggal_pinjam = date("Y-m-d");
	$nominal_pinjam = $_POST["nominal_pinjam"];
	$rekening 		= $_POST["rekening"];
	$button 		= $_POST["button"];
	$status			= "Sedang di Tinjau";
	$statusEdit 	= $_POST["statusEdit"];

	if($button == "Pinjam"){
		mysqli_query($koneksi, "INSERT INTO pinjaman VALUES ('', '$id_user', '$tanggal_pinjam', '$nominal_pinjam', '$rekening', '$status')");
	}elseif($button == "Edit"){
		$id_pinjaman = $_GET["id_pinjaman"];
		mysqli_query($koneksi, "UPDATE pinjaman SET status = '$statusEdit' WHERE id_pinjaman='$id_pinjaman'");
	}
	

	header("Location: ".BASE_URL."index.php?page=content&module=pinjaman&action=rekap&table=rekap_pinjaman");
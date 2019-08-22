<?php 

	include_once "../../function/koneksi.php";
	include_once "../../function/helper.php";

	$id_user		= $_POST["id_user"];
	$tanggal_pembayaran = date("Y-m-d");
	$nominal_pembayaran = $_POST["nominal_pembayaran"];
	$button 		= $_POST["button"];
	$status			= "Sedang di Tinjau";
	$statusEdit 	= $_POST["statusEdit"];
	$update_bukti_pembayaran = "";

	$bukti_pembayaran = $_FILES["bukti_pembayaran"]["name"];
	$tmp_name_bukti = $_FILES["bukti_pembayaran"]["tmp_name"];
	move_uploaded_file($tmp_name_bukti, "../../bukti_pembayaran/".$bukti_pembayaran);

	if($button == "Bayar"){
		mysqli_query($koneksi, "INSERT INTO pembayaran VALUES ('', '$id_user', '$tanggal_pembayaran', '$nominal_pembayaran', '$bukti_pembayaran', '$status')");
	}elseif($button == "Edit"){
		$id_pembayaran = $_GET["id_pembayaran"];
		var_dump($id_pembayaran);
		mysqli_query($koneksi, "UPDATE pembayaran SET status = '$statusEdit' WHERE id_pembayaran='$id_pembayaran'");
	}
	

	header("Location: ".BASE_URL."index.php?page=content&module=pinjaman&action=rekap&table=rekap_pembayaran");
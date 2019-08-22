<?php 

	include_once "../../function/koneksi.php";
	include_once "../../function/helper.php";

	$id_user = $_POST["id_user"];
	$tanggal_lahir = $_POST["tanggal_lahir"];
	$alamat = $_POST["alamat"];
	$pekerjaan = $_POST["pekerjaan"];
	$nominal_gajih = $_POST["nominal_gajih"];
	$nik = $_POST["nik"];
	$status = "Sedang di Tinjau";
	$statusEdit = $_POST["statusEdit"];
	$button = $_POST["kirim"];

	if(!empty($_FILES["foto_ktp"]["name"]) || !empty($_FILES["foto_diri"]["name"])){
		$foto_ktp = $_FILES["foto_ktp"]["name"];
		$tmp_foto_ktp = $_FILES["foto_ktp"]["tmp_name"];
		move_uploaded_file($tmp_foto_ktp, "../../foto_persaratan/".$foto_ktp);

		$foto_diri = $_FILES["foto_diri"]["name"];
		$tmp_foto_diri = $_FILES["foto_diri"]["tmp_name"];
		move_uploaded_file($tmp_foto_diri, "../../foto_persaratan/".$foto_diri);

		$foto_ktp_update = ", ktp=$foto_ktp";
		$foto_diri_update = ", foto_diri=$foto_diri";
	}
	
	if($button == "Kirim"){
		mysqli_query($koneksi, "INSERT INTO persaratan VALUES ('', '$id_user', '$tanggal_lahir', '$alamat', '$pekerjaan', '$nominal_gajih', '$nik', '$foto_ktp', '$foto_diri', '$status')");
	}elseif($button == "Edit"){
		$id_persaratan = $_GET["id_persaratan"];
		mysqli_query($koneksi, "UPDATE persaratan SET id_user='$id_user', 
													tanggal_lahir='$tanggal_lahir', 
													alamat='$alamat', 
													pekerjaan='$pekerjaan', 
													nominal_gajih='$nominal_gajih', 
													nik='$nik', 
													status='$statusEdit'
													$foto_ktp_update
													$foto_diri_update WHERE id_persaratan=$id_persaratan");
	}
	

	header("Location:".BASE_URL."index.php?page=content&module=user&action=akun");
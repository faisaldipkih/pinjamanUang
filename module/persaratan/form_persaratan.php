<?php 

	$id_persaratan = isset($_GET["id_persaratan"]) ? $_GET["id_persaratan"] : false;

	$tanggal_lahir = "";
	$alamat = "";
	$pekerjaan = "";
	$nominal_gajih = "";
	$nik = "";
	$foto_ktp = "";
	$foto_diri = "";
	$status = "";
	$button = "Kirim";

	if($id_persaratan){
		$queryPersaratan = mysqli_query($koneksi, "SELECT * FROM persaratan WHERE id_persaratan='$id_persaratan'");
		$rowPersaratan = mysqli_fetch_assoc($queryPersaratan);

		$id_user_edit = $rowPersaratan["id_user"];
		$tanggal_lahir = $rowPersaratan["tanggal_lahir"];
		$alamat = $rowPersaratan["alamat"];
		$pekerjaan = $rowPersaratan["pekerjaan"];
		$nominal_gajih = $rowPersaratan["nominal_gajih"];
		$nik = $rowPersaratan["nik"];
		$foto_ktp = $rowPersaratan["ktp"];
		$foto_diri = $rowPersaratan["foto_diri"];
		$status = $rowPersaratan["status"];
		$button = "Edit";

		$foto_ktp = "<img src='".BASE_URL."foto_persaratan/$foto_ktp' style='width: 100px;vertical-align: middle;' />";
		$foto_diri = "<img src='".BASE_URL."foto_persaratan/$foto_diri' style='width: 100px;vertical-align: middle;' />";
	}

 ?>

<div class="form-transaksi">
	<form action="<?php echo BASE_URL."module/persaratan/proses_persaratan.php?id_persaratan=$id_persaratan" ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama Nasabah</label>
			
				<select name="id_user" class="form-control">
					<?php
					if($level == "admin"){
						$queryNama = mysqli_query($koneksi, "SELECT id_user, nama_user FROM user WHERE id_user='$id_user_edit'");
						$row = mysqli_fetch_assoc($queryNama);
					}elseif($level == "nasabah"){
						$queryNama = mysqli_query($koneksi, "SELECT id_user, nama_user FROM user WHERE id_user='$id_user'");
						$row = mysqli_fetch_assoc($queryNama);
					}
					?>
				<option value="<?php echo "$row[id_user]"; ?>"><?php echo "$row[nama_user]" ?></option>
				</select>
			
		</div>

		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" name="tanggal_lahir" value="<?= $tanggal_lahir ?>" class="form-control">
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<textarea name="alamat" class="form-control"><?= $alamat ?></textarea>
		</div>

		<div class="form-group">
			<label>Pekerjaan</label>
			<input type="text" name="pekerjaan" value="<?= $pekerjaan ?>" class="form-control">
		</div>

		<div class="form-group">
			<label>Nominal Gajih/Bulan</label>
			<input type="number" name="nominal_gajih" value="<?= $nominal_gajih ?>" class="form-control">
		</div>

		<div class="form-group">
			<label>Nomor Induk KTP</label>
			<input type="number" name="nik" value="<?= $nik ?>" class="form-control">
		</div>

		<div class="form-group">
			<label>Foto Data Diri(KTP, SIM)</label>
			<input type="file" name="foto_ktp" class="form-control-file"><?= $foto_ktp ?>
		</div>

		<div class="form-group">
			<label>Foto Diri(memegang Data Diri)</label>
			<input type="file" name="foto_diri" class="form-control-file"><?= $foto_ktp ?>
		</div>

		<?php if($level == "admin") : ?>
			<div class="form-group">
				<label>Status</label>
				
					<select name="statusEdit" class="form-control">
						<option value="<?= $status ?>"><?= $status ?></option>
						<option value="Lenkapi Persaratan">Lengkapi Persaratan</option>
						<option value="Persaratan Lengkap">Persaratan Lengkap</option>
					</select>
				
			</div>
		<?php endif; ?>
		<input type="submit" name="kirim" value="<?= $button ?>" class="btn btn-primary">
	</form>
</div>
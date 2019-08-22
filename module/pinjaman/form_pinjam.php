<?php 

	$id_pinjaman = isset($_GET["id_pinjaman"]) ? $_GET["id_pinjaman"] : false;

	$nominal_pinjam = "";
	$rekening = "";
	$status = "";
	$button = "Pinjam";

	if($id_pinjaman){
		$queryUpdatePinjaman = mysqli_query($koneksi, "SELECT * FROM pinjaman WHERE id_pinjaman = '$id_pinjaman'");
		$rowUpdate = mysqli_fetch_assoc($queryUpdatePinjaman);

		$id_user_edit = $rowUpdate["id_user"];
		$nominal_pinjam = $rowUpdate["nominal_pinjam"];
		$rekening = $rowUpdate["rekening"];
		$status = $rowUpdate["status"];
		$button = "Edit";
	}


 ?>

<div class="form-transaksi">
	<form action="<?php echo BASE_URL."module/pinjaman/proses_pinjam.php?id_pinjaman=$id_pinjaman" ?>" method="post" enctype="multipart/form-data">
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
			<label>Nominal Pinjam</label>
			<input type="number" name="nominal_pinjam" value="<?= $nominal_pinjam ?>" class="form-control">
		</div>

		<div class="form-group">
			<label>No Rekening</label>
			<input type="number" name="rekening" value="<?= $rekening ?>" class="form-control">
		</div>
		<?php if($level == "admin") : ?>
			<div class="form-group">
				<label>Status</label>			
					<select name="statusEdit" class="form-control">
						<option value="<?= $status ?>"><?= $status ?></option>
						<option value="Proses Transfer">Proses Tranfer</option>
						<option value="Sukses">Sukses</option>
					</select>
			</div>
		<?php endif; ?>
		<input type="submit" name="button" value="<?= $button ?>" class="btn btn-primary">
	</form>
</div>
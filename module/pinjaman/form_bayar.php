<?php 

	$id_pembayaran = isset($_GET["id_pembayaran"]) ? $_GET["id_pembayaran"] : false;

	$nominal_pembayaran = "";
	$bukti_pembayaran = "";
	$status = "";
	$button = "Bayar";

	if($id_pembayaran){
		$queryPembayaran = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
		$rowPembayaran = mysqli_fetch_assoc($queryPembayaran);

		$id_user_edit = $rowPembayaran["id_user"];
		$nominal_pembayaran = $rowPembayaran["nominal_pembayaran"];
		$bukti_pembayaran = $rowPembayaran["bukti_pembayaran"];
		$status = $rowPembayaran["status"];
		$button = "Edit";

		$bukti_pembayaran = "<img src='".BASE_URL."bukti_pembayaran/$bukti_pembayaran' style='width: 100px;vertical-align: middle;' />";

	}


 ?>

<div class="form-transaksi">
	<form action="<?php echo BASE_URL."module/pinjaman/proses_bayar.php?id_pembayaran=$id_pembayaran" ?>" method="post" enctype="multipart/form-data">
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
			<label>Nominal Pembayaran</label>
			<input type="number" name="nominal_pembayaran" value="<?= $nominal_pembayaran ?>" class="form-control">
		</div>

		<div class="form-group">
			<label>Bukti Pembayaran (foto struct transper)</label>
			<input type="file" name="bukti_pembayaran" class="form-control-file"><?= $bukti_pembayaran ?>
		</div>

		<?php if($level == "admin") : ?>
			<div class="form-group">
				<label>Status</label>
				
					<select name="statusEdit" class="form-control">
						<option value="<?= $status ?>"><?= $status ?></option>
						<option value="Sedang Cek Pembayaran">Sedang Cek Pembayaran</option>
						<option value="Pembayaran Sukses">Pembayaran Sukses</option>
					</select>
				
			</div>
		<?php endif; ?>
		<input type="submit" name="button" value="<?= $button ?>" class="btn btn-primary">
	</form>
</div>
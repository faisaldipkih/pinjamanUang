<?php  
		if($level == "nasabah"){
			$queryPembayaran = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_user='$id_user'");
		}elseif($level == "admin"){
			$queryPembayaran = mysqli_query($koneksi, "SELECT pembayaran.*, user.nama_user FROM pembayaran JOIN user ON pembayaran.id_user=user.id_user");
		}
if(isset($_GET["notif"]) == "rekening"){
?>
	<script >
		alert("NO Rekening Untuk Pembayaran : 123456789")
	</script>
<?php } ?>
	<h2 class="judul-table">Pembayaran</h2>
	<table class="table table-hover">
		<thead class="table-info">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Tanggal Pembayaran</th>
				<th>Nominal Pembayaran</th>
				<th>Bukti Pembayaran</th>
				<th>Status</th>
				<?php if($level == "admin") : ?>
					<th>Action</th>
				<?php endif; ?>
			</tr>
		</thead>

		<?php $no=1; ?>
		<?php while($row = mysqli_fetch_assoc($queryPembayaran)) : ?>
			<tr>
				<td><?= $no ?></td>
				<?php if($level == "nasabah") : ?>
					<td><?= $nama_user ?></td>
				<?php elseif($level == "admin") : ?>
					<td><?= $row["nama_user"] ?></td>
				<?php endif; ?>
				<td><?= $row["tanggal_pembayaran"] ?></td>
				<td><?= $row["nominal_pembayaran"] ?></td>
				<td><img src="<?php echo BASE_URL."bukti_pembayaran/$row[bukti_pembayaran]"; ?>" alt="bukti" style="width: 50px;"></td>
				<td><?= $row["status"] ?></td>
				<?php if($level == "admin") : ?>
					<td><a class="btn btn-dark" href="<?php echo BASE_URL."index.php?page=content&module=pinjaman&action=form_bayar&id_pembayaran=$row[id_pembayaran]" ?>">Edit</a></td>
				<?php endif; ?>
			</tr>
			<?php $no++ ?>
		<?php endwhile; ?>
	</table>
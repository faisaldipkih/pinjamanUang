<?php  
		if($level == "nasabah"){
			$queryPinjaman = mysqli_query($koneksi, "SELECT * FROM pinjaman WHERE id_user='$id_user'");
		}elseif($level == "admin"){
			$queryPinjaman = mysqli_query($koneksi, "SELECT pinjaman.*, user.nama_user FROM pinjaman JOIN user ON pinjaman.id_user=user.id_user");
		}

	?>

	<h2 class="judul-table">Pinjaman</h2>
	<table class="table table-hover">
		<thead class="table-info">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Tanggal Pinjam</th>
				<th>Nominal Pinjam</th>
				<th>Rekening</th>
				<th>Status</th>
				<?php if($level == "admin") : ?>
					<th>Action</th>
				<?php endif; ?>
			</tr>
		</thead>

		<?php $no=1; ?>
		<?php while($row = mysqli_fetch_assoc($queryPinjaman)) : ?>
			<tr>
				<td><?= $no ?></td>
				<?php if($level == "nasabah") : ?>
					<td><?= $nama_user ?></td>
				<?php elseif($level == "admin") : ?>
					<td><?= $row["nama_user"] ?></td>
				<?php endif; ?>
				<td><?= $row["tanggal_pinjam"] ?></td>
				<td><?= $row["nominal_pinjam"] ?></td>
				<td><?= $row["rekening"] ?></td>
				<td><?= $row["status"] ?></td>
				<?php if($level == "admin") : ?>
					<td><a class="btn btn-dark" href="<?php echo BASE_URL."index.php?page=content&module=pinjaman&action=form_pinjam&id_pinjaman=$row[id_pinjaman]" ?>">Edit</a></td>
				<?php endif; ?>
			</tr>
			<?php $no++ ?>
		<?php endwhile; ?>
	</table>
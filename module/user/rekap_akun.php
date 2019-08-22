<?php 

	$queryAkun = mysqli_query($koneksi, "SELECT * FROM user WHERE level='nasabah'");

 ?>

<div class="akun-admin">
	<h2 class="judul-table">Akun Nasabah</h2>
	<table class="table table-hover">
		<thead class="table-info">
			<tr>
				<th>No</th>
				<th>Nama Nasabah</th>
				<th>Foto</th>
				<th>username</th>
			</tr>
		</thead>

		<?php $no=1; ?>
		<?php while($rowAkun = mysqli_fetch_assoc($queryAkun)) : ?>
			<tbody>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $rowAkun["nama_user"] ?></td>
					<td><img src="<?php echo BASE_URL."foto/$rowAkun[foto_user]"; ?>" alt="Foto Akun" style="width: 100px;"></td>
					<td><?= $rowAkun["username"] ?></td>
				</tr>
			</tbody>
			<?php $no++; ?>
		<?php endwhile;; ?>
	</table>
</div>
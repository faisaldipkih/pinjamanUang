<?php 

	$queryPersaratan = mysqli_query($koneksi, "SELECT persaratan.*, user.nama_user FROM persaratan JOIN user ON persaratan.id_user=user.id_user");

 ?>

 <div class="persaratan-nasabah">
 	<h2 class="judul-table">Persaratan</h2>
	<table class="table table-hover">
		<thead class="table-info">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Tanggal Lahir</th>
				<th>Alamat</th>
				<th>Pekerjaan</th>
				<th>Nominal Gajih</th>
				<th>Nomer Induk KTP</th>
				<th>Foto KTP</th>
				<th>Foto Diri</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php $no=1; ?>
		<?php while($rowPersaratan = mysqli_fetch_assoc($queryPersaratan)) : ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $rowPersaratan["nama_user"] ?></td>
				<td><?= $rowPersaratan["tanggal_lahir"] ?></td>
				<td><?= $rowPersaratan["alamat"] ?></td>
				<td><?= $rowPersaratan["pekerjaan"] ?></td>
				<td><?= $rowPersaratan["nominal_gajih"] ?></td>
				<td><?= $rowPersaratan["nik"] ?></td>
				<td><img src="<?php echo BASE_URL."foto_persaratan/$rowPersaratan[ktp]"; ?>" alt="Foto KTP" style="width: 100px;"></td>
				<td><img src="<?php echo BASE_URL."foto_persaratan/$rowPersaratan[foto_diri]"; ?>" alt="Foto KTP" style="width: 100px;"></td>
				<td><?= $rowPersaratan["status"] ?></td>
				<td>
					<a class="btn btn-dark" href="<?php echo BASE_URL."index.php?page=content&module=persaratan&action=form_persaratan&id_persaratan=$rowPersaratan[id_persaratan]" ?>">Edit</a>
				</td>
				<?php $no++; ?>
			</tr>
		<?php endwhile; ?>
	</table>
</div>
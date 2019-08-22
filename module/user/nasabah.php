<?php 

	$queryAkun = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
	$rowAkun = mysqli_fetch_assoc($queryAkun);

	$queryPersaratan = mysqli_query($koneksi, "SELECT * FROM persaratan WHERE id_user='$id_user'");
	$rowPersaratan = mysqli_fetch_assoc($queryPersaratan);

 ?>

 <div class="akun-nasabah">
	<h2>Akun</h2>
	<ul class="list-group list-group-flush">
		<li class="list-group-item"><b>Nama : </b><?= $rowAkun["nama_user"] ?></li>
		<li class="list-group-item"><b>Username : </b><?= $rowAkun["username"] ?></li>
		<?php if($rowPersaratan["status"] == "Persaratan Lengkap") : ?>
			<?php include_once "function/total.php"; ?>
			<li class="list-group-item"><b>Total Pinjaman : </b>Rp. <?php echo $total; ?></li>
		<?php endif; ?>
	</ul>
</div>

<div class="persaratan">
	<h2>Persaratan</h2>
	<?php if(mysqli_num_rows($queryPersaratan) == '$id_user') : ?>
		<p>Isi dulu persaratan terlebih dahulu tunggu persaratan di tinjau admin sampai statusnya "Persaratan Lengkap" agar menu pijaman tersedia.</p>
		<a href="<?php echo BASE_URL."index.php?page=content&module=persaratan&action=form_persaratan"; ?>">Isi Data Persaratan</a>
	<?php else : ?>
		<ul class="list-group list-group-flush">
			<li class="list-group-item"><b>Nama : </b><?= $rowAkun["nama_user"] ?></li>
			<li class="list-group-item"><b>Tanggal Lahir : </b><?= $rowPersaratan["tanggal_lahir"] ?></li>
			<li class="list-group-item"><b>Alamat : </b><?= $rowPersaratan["alamat"] ?></li>
			<li class="list-group-item"><b>Pekerjaan : </b><?= $rowPersaratan["pekerjaan"] ?></li>
			<li class="list-group-item"><b>Nominal Gajih : </b><?= $rowPersaratan["nominal_gajih"] ?></li>
			<li class="list-group-item"><b>Nomer Induk KTP : </b><?= $rowPersaratan["nik"] ?></li>
			<li class="list-group-item"><b>Foto KTP : </b><img src="<?php echo BASE_URL."foto_persaratan/$rowPersaratan[ktp]"; ?>" alt="Foto Persaratan" style="width: 100px;"></li>
			<li class="list-group-item"><b>Foto Diri : </b><img src="<?php echo BASE_URL."foto_persaratan/$rowPersaratan[foto_diri]"; ?>" alt="Foto Persaratan" style="width: 100px;"></li>
			<li class="list-group-item"><b>Status : </b><?= $rowPersaratan["status"] ?></li>
			<?php if($rowPersaratan["status"] != "Persaratan Lengkap") : ?>
				<li class="list-group-item"><a href="<?php echo BASE_URL."index.php?page=content&module=persaratan&action=form_persaratan&id_persaratan=$rowPersaratan[id_persaratan]" ?>">Edit</a></li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>
</div>
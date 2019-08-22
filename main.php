<?php 
	$module = isset($_GET["module"]) ? $_GET["module"] : false;
	$action = isset($_GET["action"]) ? $_GET["action"] : false;
	$credit = isset($_GET["credit"]) ? $_GET["credit"] : false;
 ?>

<?php $file_regis = "module/$module/$action.php"; ?>
<?php if(file_exists($file_regis)) : ?>
	<?php include_once ($file_regis); ?>
<?php else : ?>

	<div class="konten">
		<div class="button-konten">
			<?php if($id_user) : ?>
				<a class="btn btn-link" href="<?php echo BASE_URL."index.php?page=content&module=user&action=akun" ?>">Masuk Kemenu</a>
				<a class="btn btn-link" href="<?php echo BASE_URL."index.php?pageC=main&credit=hakCipta"?>" <?php if($credit == "hakCipta"){echo "style=background:aquamarine";} ?> >Credit</a>
			<?php else : ?>
				<a class="btn btn-link" href="<?php echo BASE_URL."index.php?pageC=login" ?>">Login</a>
				<a class="btn btn-link" href="<?php echo "index.php?pageC=main&module=register&action=regis_user"; ?>">Daftar</a>
				<a class="btn btn-link" href="<?php echo BASE_URL."index.php?pageC=main&credit=hakCipta"?>" <?php if($credit == "hakCipta"){echo "style=background:aquamarine";} ?> >Credit</a>
			<?php endif; ?>
		</div>

		<div>
			<?php if($credit == "hakCipta") { ?>
				<div class="mx-auto" style="width: 200px; margin-bottom: 10px;">
					<img src="css/sttg.png" width="100">
				</div>

				<div class="mx-auto" style="width: 300px;">
					<ul>
						<li>Faisal Dipki Hermawan (1606092)</li>
						<li>Nirwan Nurdin Rhamdani (1606080)</li>
						<li>Sherine Valentine M (1606035)</li>
					</ul>
				</div>

				<div class="mx-auto" style="width: 347px;">
					<h5>Sekolah Tinggi Teknologi Garut</h5>
				</div>
			<?php }else{ ?>
				<h4>Persyaratan Untuk Meminjam Uang</h4>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Mempunyai pekerjaan</li>
					<li class="list-group-item">Foto/Scan Kartu Tanda Penduduk(KTP)</li>
					<li class="list-group-item">Foto dengan memegang Kartu Tanda Penduduk(KTP)</li>
				</ul>
			<?php } ?>
		</div>
	</div>
	
<?php endif; ?>
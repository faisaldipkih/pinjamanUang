<div class="form-user">
	<form action="<?php echo BASE_URL."module/register/proses_regis.php" ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" name="nama_user" class="form-control">
		</div>

		<div class="form-group">
			<label>Foto</label>
			<input type="file" name="foto" class="form-control-file">
		</div>

		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control">
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
		</div>
		<input type="submit" name="button" value="Daftar" class="btn btn-primary">
	</form>
</div>
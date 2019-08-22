<?php 

	include_once "function/koneksi.php";
	include_once "function/helper.php";

	session_start();

	$id_user = isset($_SESSION["id_user"]) ? $_SESSION["id_user"] : false;
	$nama_user = isset($_SESSION["nama_user"]) ? $_SESSION["nama_user"] : false;
	$level = isset($_SESSION["level"]) ? $_SESSION["level"] : false;
	$page_name = isset($_GET["page"]) ? $_GET["page"] : false;
	$page_cover = isset($_GET["pageC"]) ? $_GET["pageC"] : false;


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Peminjaman Uang</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="function/bootstrap-4.3.1-dist/css/bootstrap.min.css">
	</head>

	<body>
		<div class="container-fluid">
			<div class="navbar navbar-info bg-info">
				<?php if($id_user) : ?>
					<div class="judul navbar-brand">
						<a href="<?php echo BASE_URL."index.php?pageC=main" ?>">Peminjaman Uang</a>
					</div>
				<?php else : ?>
					<div class="judul navbar-brand">
						<a href="<?php echo BASE_URL."index.php?pageC=main" ?>">Peminjaman Uang</a>
					</div>
				<?php endif; ?>

				<?php if($id_user && $page_name) : ?>
					<div class="menu navbar-text">
						<?php if($level == "admin") : ?>
							<a class="btn btn-link" href="<?php echo BASE_URL."index.php?page=content&module=user&action=akun" ?>">Selamat Datang Admin <?= $nama_user ?></a>
						<?php elseif($level == "nasabah") : ?>
							<a href="<?php echo BASE_URL."index.php?page=content&module=user&action=akun" ?>">Selamat Datang <?= $nama_user ?></a>
						<?php endif; ?>
						<a class="btn btn-link" href="logout.php">Logout</a>					
					</div>
				<?php elseif($id_user) : ?>
					<div class="menu navbar-text">
						<a class="btn btn-link" href="logout.php">Logout</a>
					</div>
				<?php endif; ?>
			</div>

			<?php if($id_user && $page_name) : ?>
				<div class="cover-foto">
					<?php

						$queryFoto = mysqli_query($koneksi, "SELECT id_user, foto_user FROM user WHERE id_user='$id_user'");
						$rowFoto = mysqli_fetch_assoc($queryFoto);
					?>
					<div class="foto"><img src="<?php echo BASE_URL."foto/$rowFoto[foto_user]"; ?>" alt="profile" style="width: 100px;"></div>
				</div>
			<?php endif; ?>

			<div class="content">
				<?php 
					$page = "$page_name.php";
					$pageC = "$page_cover.php"; 
					if($id_user){
						if(file_exists($page)){
							include_once ($page);
						}elseif(file_exists($pageC)){
							include_once $pageC;
						}
					}else{
						if(file_exists($pageC)){
							include_once ($pageC);
						}else{
							include_once "main.php";
						}
					}
				?>
			</div>

			<div class="footer">
				<p>Copyright 2019</p>
			</div>
		</div>
	</body>
</html>
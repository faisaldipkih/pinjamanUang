<?php
	if($id_user){
		$module = isset($_GET["module"]) ? $_GET["module"] : false;
		$action = isset($_GET["action"]) ? $_GET["action"] : false;
	}else{
		header("Location: ".BASE_URL."index.php");
	}


?>


	<div class="menu-content">
		<ul>
			<li>
				<a class="btn btn-warning" href="<?php echo BASE_URL."index.php?page=content&module=user&action=akun"; ?>" <?php if($action == "akun"){echo "style=background:red";} ?> >Akun</a>
			</li>

			<?php

				$querySeleksi = mysqli_query($koneksi, "SELECT persaratan.status FROM persaratan WHERE id_user='$id_user'");
				$rowSeleksi = mysqli_fetch_assoc($querySeleksi);
			?>

			<?php if($rowSeleksi["status"] == "Persaratan Lengkap" || $level == "admin") : ?>
				<li>
					<a class="btn btn-warning" href="<?php echo BASE_URL."index.php?page=content&module=pinjaman&action=rekap&table=rekap_pinjaman"; ?>" <?php if($action == "rekap"){echo "style=background:red";} ?> >Pinjaman</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>

	<div class="isi-content">
		<?php 
			$file_content = "module/$module/$action.php";
			if(file_exists($file_content)){
				include_once($file_content);
			}else{
				echo "<h2>Tahap Pengembangan</h2>";
			}
		?>
	</div>

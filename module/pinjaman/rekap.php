<?php

$table = isset($_GET["table"]) ? $_GET["table"] : false;

	if($level == "nasabah") { ?>
		<div class="button-transaksi">
			<a class="btn btn-white" href="<?php echo BASE_URL."index.php?page=content&module=pinjaman&action=form_pinjam&id_user=$id_user"; ?>">Pinjam</a>
			<a class="btn btn-white" href="<?php echo BASE_URL."index.php?page=content&module=pinjaman&action=form_bayar&id_user=$id_user"; ?>">Bayar</a>
			<a class="btn btn-white" href="<?php echo BASE_URL."index.php?page=content&module=pinjaman&action=rekap&table=rekap_pembayaran&notif=rekening"; ?>">No Rekening Pembayaran</a>
			<a class="btn btn-white" href="<?php echo BASE_URL."index.php?page=content&module=pinjaman&action=rekap&table=total_pinjaman"; ?>" <?php if($table == "total_pinjaman"){echo "style=background:aquamarine";} ?> >Total Pinjaman</a>
		</div>
	<?php } ?>

	<div class="button-rekap">
		<a class="btn btn-white" href="<?php echo BASE_URL."index.php?page=content&module=pinjaman&action=rekap&table=rekap_pinjaman"; ?>" <?php if($table == "rekap_pinjaman"){echo "style=background:aquamarine";} ?> >Rekap Pinjaman</a>
		<a class="btn btn-white" href="<?php echo BASE_URL."index.php?page=content&module=pinjaman&action=rekap&table=rekap_pembayaran"; ?>" <?php if($table == "rekap_pembayaran"){echo "style=background:aquamarine";} ?> >Rekap Pembayaran</a>
	</div>

	<div class="table-rekap">
		<?php 

			if($table == "rekap_pinjaman"){
				include_once "table_pinjaman.php";
			}elseif($table == "rekap_pembayaran"){
				include_once "table_pembayar.php";
			}elseif($table == "total_pinjaman"){
				include_once "total_pinjaman.php";
			}

		 ?>
	</div>


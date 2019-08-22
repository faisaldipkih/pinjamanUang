<?php 

	$queryPinjaman = mysqli_query($koneksi, "SELECT nominal_pinjam, status FROM pinjaman WHERE id_user='$id_user' AND status='sukses'");
	$queryPembayaran = mysqli_query($koneksi, "SELECT nominal_pembayaran, status FROM pembayaran WHERE id_user='$id_user' AND status='Pembayaran Sukses'");
	
	$totalPinjaman=0;
	$totalPembayaran=0;
	// if($queryPinjaman){
	// 	foreach($queryPinjaman as $row){
	// 		$totalPinjaman += $row["nominal_pinjam"];
	// 	}
	// }elseif($queryPembayaran){
	// 	foreach($queryPembayaran as $row){
	// 		$totalPembayaran += $row["nominal_pembayaran"];
	// 	}
	// }else
	if($queryPinjaman && $queryPembayaran){
		foreach($queryPinjaman as $row){
			$totalPinjaman += $row['nominal_pinjam'];
		}

		foreach($queryPembayaran as $row){
			$totalPembayaran += $row['nominal_pembayaran'];
		}
		$total = $totalPinjaman - $totalPembayaran;
	}else{
		echo "0";
	}
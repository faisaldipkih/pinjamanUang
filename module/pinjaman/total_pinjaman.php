<?php 

	include_once "function/total.php";

?>
<div class="total-pinjaman">
	<table class="table">
		<tr>
			<th><b>Jumlah Pinjaman :</b></th>
			<td>Rp. <?php echo $totalPinjaman; ?></td>
		</tr>

		<tr>
			<th><b>Jumlah Pembayaran :</b></th>
			<td>Rp. <?php echo $totalPembayaran; ?></td>
		</tr>

		<tr>
			<th><b>Total Pinjaman</b></th>
			<td>Rp. <?php echo $total; ?></td>
		</tr>
	</table>
</div>
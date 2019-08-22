<?php if($level == "nasabah") : ?>
	<?php include_once "nasabah.php"; ?>
<?php elseif($level == "admin") : ?>
	<?php include_once "admin.php"; ?>
<?php endif; ?>
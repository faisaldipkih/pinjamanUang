	<div class="form-user">
		<?php 
			$notif = isset($_GET["notif"]) ? $_GET["notif"] : false;
			if($notif == "true"){
		?>
			<script >
				alert("Email dan Password Salah");
			</script>
		<?php } ?>
		<form action="proses_login.php" method="post">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
			</div>

			<div class="form-group">
				<label>Password</label>
				<span><input type="password" name="password" class="form-control"></span>
			</div>
			<input type="submit" name="login" value="Login" class="btn btn-primary">
		</form>
	</div>
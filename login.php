<?php
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" href="css/materialize.css">
	<style type="text/css">
	.input-field label,
	.input-field .prefix {
		color: #000;
	}
	.input-field input[type=text]:focus + label,
	.input-field input[type=password]:focus + label,
	.input-field .prefix.active {
		color: #78909c;
	}
	.input-field input[type=text]:focus,
	.input-field input[type=password]:focus {
		border-bottom: 1px solid #78909c;
		box-shadow: 0 1px 0 0 #78909c;
	}
	input[type=submit] {
		color: #fff;
		background-color: #000;
	}
	input[type=submit]:hover {
		background-color: #01579b;
	}
	.mepet { margin-bottom: 0; }

body {
	background-image: url(img/bg-login.jpg);
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><body>

<div class="row" style="margin-top: 7%;">
	<div class="col 14 m6 s12 offset-14 offset-m3">
	<h3 class="center"><span class="black-text">Halaman </span><span class="deep-orange-text">Login</span></h3>
	<div class="card z-depth-2">
	<div class="card">
	<form method="post" class="col s12" action="cek_login.php">
	<div class="row mepet">
	<div class="input-field col s12">
	<i class="mdi-action-account-circle prefix"></i>
	<input type="text" name="username" id="username">
	<label for="username" data-success="right"><span class="white-text">Username</span></label>
				</div>
		</div>
	<div class="row mepet">
	<div class="input-field col s12">
	<i class="mdi-action-lock prefix"></i>
	<input type="password" name="password" class="validate">
	<label><span class="white-text">Password</span></label>
			</div>
	</div>
	<div class="row">
	<div class="input-field col s12">
	<input type="submit" name="login" value="Login" class="btn right"> 
				</div>
			</div>
		</form>
	</div>
		</div>
				</div>
					</div>
	<!-- Java Script -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>

</body>
</html>
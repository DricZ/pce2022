<?php
// UNCOMMENT NEK WES MARI
// session_start();
require_once 'phps/connect.php';
if (isset($_SESSION["nrpAdmin"])) {
	header("location: home.php");
}
if (isset($_GET['stat'])) {
	if ($_GET['stat'] == 1) {
		echo "<script>alert('Silakan periksa NRP dan Password Anda kembali.');</script>";
	} else if ($_GET['stat'] == 2) {
		echo "<script>alert('Silakan cek kembali captcha Anda.');</script>";
	} else if ($_GET['stat'] == 3) {
		echo "<script>alert('Mohon maaf, Anda tidak memiliki hak akses untuk situs admin.');</script>";
	} else if ($_GET['stat'] == 4) {
		echo "<script>alert('Format NRP Anda tidak sesuai.');</script>";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Cache-Control" content="no-store" />

	<!-- lib -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- ICON -->
	<link rel="icon" href="../assets/pce_icon.ico" type="image/x-icon">

	<title>Admin PCE 2021</title>
	<link rel="stylesheet" href="../style/styleloginadmin.css?v=<?php echo time(); ?>">
	<!-- For apple devices -->

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

</head>
<style type="text/css">
	.g-recaptcha>div {
		width: 100% !important;
	}

	.g-recaptcha>div>div {
		margin: 4px auto !important;
		/*text-align: center;*/
		width: auto !important;
		height: auto !important;
	}
</style>

<body>
	<div class="wrapper">
		<div class="container justify-content-center text-center" id="header">
			<a href="https://www.instagram.com/petracivilexpo/" target="_blank"><img src="..\assets\pce_logo color.png" style="width:200px; height:58px;" alt="pce"></a>
			<h1 class="font-weight-bold" style="text-align: center;">ADMIN SITE</h1>
			<h2 class="font-weight-normal" style="text-align: center;">PETRA CIVIL EXPO 2021</h2>
		</div>
		<div class="container d-flex justify-content-center ">
			<div class="jumbotron my-auto" id="form">
				<form class="animateBox" action="phps/loginattempt.php" method="post">
					<input type="text" style="margin-top: 15px;" class="form-control" name="nrp" placeholder="NRP">
					<div align="center">
						<small><span style="color: black;">Ex: b11190001</span></small>
					</div>
					<input type="password" class="form-control" name="password" placeholder="Password SIM">
					<div align="center">
						<div class="g-recaptcha mt-4" data-sitekey="6LdKzOAZAAAAAGk1hq6OVEly8dHx3MPKqG9XkrRy" data-callback="callback"></div>
					</div>
					<input type="submit" value="LOGIN" id="login">
				</form>
			</div>
		</div>
		<div class="container justify-content-center text-center" id="header">
			<h2 class="font-weight-small" style="text-align: center; font-size: 12pt;">By IT Division Petra Civil Expo 2021</h2>
		</div>
	</div>
</body>

</html>
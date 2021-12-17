<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'home';


if (!isset($_SESSION['nrpAdmin'])) {
	header("Location: index.php");
	exit();
}

$nama = $_SESSION['namaAdmin'];
$nrp = $_SESSION['nrpAdmin'];
$divisi = $_SESSION['divisi'];

include 'header.php';
?>

<script>
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 5000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})
</script>

<?php
if (isset($_GET['stat'])) {
	if ($_GET['stat'] == 1) {
		echo '<script>',
		'	Toast.fire({
						icon: "success",
						title: "Haloooooooo, ',
		$nama,
		'!"
					})',
		'</script>';
	}
}
?>

<!DOCTYPE html>
<html>
<style>
	body {
		background: #ededed;
	}
</style>

<head>
	<title>Halo, <?php echo $nama; ?>!</title>
</head>

<body>
	<div class="containtext">
		<span class="text1"><?php echo $nama; ?></span>
		<span class="text2">&#128050; <?php echo $divisi; ?> &#128050;</span>
	</div>

	<!-- <div id="particles-js"></div>

	<script src="../assets/js/particles.js"></script>
	<script>
		/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
		particlesJS.load('particles-js', '../assets/js/particlesjs-config-admin.json', function() {
			console.log('callback - particles.js config loaded');
		});
	</script> -->
</body>

</html>
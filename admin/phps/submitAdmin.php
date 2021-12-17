<?php
require_once 'connect.php';

if (isset($_POST['nrp']) && isset($_POST['nama']) && isset($_POST['divisi']) && isset($_POST['bidang'])) {
	$stmt = $pdo->prepare("INSERT INTO `admin`(`id`, `nrp`, `nama`, `divisi`, `id_bidang`) VALUES (?,?,?,?,?)");

	$nrpAdminBaru = strtolower($_POST['nrp']);

	$adminChecksql = "SELECT * FROM admin WHERE nrp = ?";
	$adminCheckstmt = $pdo->prepare($adminChecksql);
	$adminCheckstmt->execute([$nrpAdminBaru]);

	if ($adminCheckstmt->rowCount() == 1) {
		header("Location: ../addAdmin.php?stat=4");
		exit();
	} else {
		if (strlen($_POST['nrp']) != 9) {
			header("Location: ../addAdmin.php?stat=3");
			exit();
		}
		$namaAdminBaru = ucwords(strtolower($_POST['nama']));
		$divisi = $_POST['divisi'];
		if ($_POST['bidang'] == 'pce') {
			$bidang = 1;
		} else if ($_POST['bidang'] == 'bc') {
			$bidang = 2;
			$divisi = $divisi . ' Bidang Bridge Competition';
		} else if ($_POST['bidang'] == 'erdc') {
			$bidang = 3;
			$divisi = $divisi . ' Bidang Earthquake Resistant Design Competition';
		} else if ($_POST['bidang'] == 'lktb') {
			$bidang = 4;
			$divisi = $divisi . ' Bidang Lomba Kuat Tekan Beton';
		}

		if ($stmt->execute([NULL, $nrpAdminBaru, $namaAdminBaru, $divisi, $bidang])) {
			header("Location: ../addAdmin.php?stat=1");
			exit();
		} else {
			header("Location: ../addAdmin.php?stat=2");
			exit();
		}
	}
} else {
	header("Location: ../addAdmin.php?stat=2");
	exit();
}
?>

<?php
require_once 'connect.php';

if (isset($_POST['tanggal']) && isset($_POST['jam'])) {
	$stmt = $pdo->prepare("INSERT INTO `hasil_pilih_jadwal_checking_bc`(`id`, `id_pendaftar`, `id_jadwal`) VALUES (NULL, ?, ?)");

	$tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];

    $getJadwalsql = "SELECT * FROM jadwal_checking_bc WHERE tanggal = ? AND jam = ?";
    $getJadwalstmt = $pdo->prepare($getJadwalsql);
    $getJadwalstmt->execute([$tanggal, $jam]);
    $getJadwal = $getJadwalstmt->fetch();

    $getPendaftarsql = "SELECT * FROM kode_peserta WHERE bc_sma_1 = ? OR bc_univ_1 = ?";
    $getPendaftarstmt = $pdo->prepare($getPendaftarsql);
    $getPendaftarstmt->execute([$_SESSION['username'], $_SESSION['username']]);
    $getPendaftar = $getPendaftarstmt->fetch();

	if ($stmt->execute([$getPendaftar['id_pendaftar'], $getJadwal['id']])) {
		$updateCountsql = "UPDATE jadwal_checking_bc SET count = count + 1 WHERE id = ?";
        $updateCountstmt = $pdo->prepare($updateCountsql);
        $updateCountstmt->execute([$getJadwal['id']]);
        $updateStatussql = "UPDATE pendaftar SET status = 3 WHERE id = ?";
        $updateStatusstmt = $pdo->prepare($updateStatussql);
        $updateStatusstmt->execute([$getPendaftar['id_pendaftar']]);
		header("Location: ../../index.php?status=5");
		exit();
	} else {
		header("Location: ../../index.php?status=4");
		exit();
	}  
} else {
    header("Location: ../../index.php?status=4");
    exit();
}
?>
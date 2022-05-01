<?php
require_once 'connect.php';

define('TIMEZONE', 'Asia/Jakarta');
date_default_timezone_set(TIMEZONE);
$timestamp = date("d-m-Y H:i:s");

if (isset($_POST['tanggal']) && isset($_POST['jam'])) {
	$stmt = $pdo->prepare("INSERT INTO `hasil_pilih_jadwal_checking_erdc`(`id`, `id_pendaftar`, `id_jadwal`, `submitted_on`) VALUES (NULL, ?, ?, ?)");

	$tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];

    $getJadwalsql = "SELECT * FROM jadwal_checking_erdc WHERE tanggal = ? AND jam = ?";
    $getJadwalstmt = $pdo->prepare($getJadwalsql);
    $getJadwalstmt->execute([$tanggal, $jam]);
    $getJadwal = $getJadwalstmt->fetch();

    $getPendaftarsql = "SELECT * FROM kelompok_erdc WHERE username = ?";
    $getPendaftarstmt = $pdo->prepare($getPendaftarsql);
    $getPendaftarstmt->execute([$_SESSION['username']]);
    $getPendaftar = $getPendaftarstmt->fetch();

	if ($stmt->execute([$getPendaftar['id_pendaftar'], $getJadwal['id'], $timestamp])) {
		$updateCountsql = "UPDATE jadwal_checking_erdc SET count = count + 1 WHERE id = ?";
        $updateCountstmt = $pdo->prepare($updateCountsql);
        $updateCountstmt->execute([$getJadwal['id']]);

        $updateStatussql = "UPDATE pendaftar SET status = 2 WHERE id = ?";
        $updateStatusstmt = $pdo->prepare($updateStatussql);
        $updateStatusstmt->execute([$getPendaftar['id_pendaftar']]);

        $updateStatussql = "UPDATE kelompok_erdc SET status = status + 1 WHERE id_pendaftar = ?";
        $updateStatusstmt = $pdo->prepare($updateStatussql);
        $updateStatusstmt->execute([$getPendaftar['id_pendaftar']]);
		
		header("Location: ../info_checking.php?status=6");
		exit();
	} else {
		header("Location: ../info_checking.php?status=4");
		exit();
	}  
} else {
    header("Location: ../info_checking.php?status=4");
    exit();
}
?>
<?php
require_once 'connect.php';

if (isset($_POST) && isset($_GET['id'])) {
	$stmt = $pdo->prepare("INSERT INTO `penerima_balsa`(`id`, `nama`, `no_hp`, `email`, `alamat`, `id_team`) VALUES (NULL, ?, ?, ?, ?, ?)");

	$nama = $_POST['nama'];
	$hp = $_POST['hp'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];

	if ($stmt->execute([$nama, $hp, $email, $alamat, $_GET['id']])) {
		$updateStatussql = "UPDATE pendaftar SET status = 2 WHERE id = ?";
		$updateStatusstmt = $pdo->prepare($updateStatussql);
		$updateStatusstmt->execute([$_GET['id']]);
		
		header("Location: ../../index.php?status=3");
		exit();
	} else {
		header("Location: ../../index.php");
		exit();
	}  
} else {
	exit();
}
?>

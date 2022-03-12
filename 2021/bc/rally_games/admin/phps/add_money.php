<?php
require "connect.php";

if (isset($_POST)) {
    $username = $_POST['team'];
    $money = $_POST['money'];
    $keterangan = $_POST['keterangan'] . "(Menggunakan <b>X2 Scocial Credits</b>)";

    $sql_cek =  "SELECT * FROM team WHERE username = ? AND x2_earning != 0";
    $stmt_cek = $pdo->prepare($sql_cek);
    $stmt_cek->execute([$username]);

    if ($stmt_cek->rowCount() == 0) {
        $addMoneysql = "UPDATE `team` SET `money` = `money` + ? WHERE username = ?";
        $addMoneystmt = $pdo->prepare($addMoneysql);
        $addMoneystmt->execute([$money, $username]);
    } else {
        $addMoneysql = "UPDATE `team` SET `money` = `money` + (?*2) WHERE username = ?";
        $addMoneystmt = $pdo->prepare($addMoneysql);
        $addMoneystmt->execute([$money, $username]);

        $matikanSkill = "UPDATE `team` SET `x2_earning` = 0 WHERE username = ?";
        $matikanStmt = $pdo->prepare($matikanSkill);
        $matikanStmt->execute([$username]);
    }

    define('TIMEZONE', 'Asia/Jakarta');
    date_default_timezone_set(TIMEZONE);
    $timestamp = date("d-m-Y H:i:s");

    $historysql = "INSERT INTO `history_add_money`(`id`, `username`, `money_value`, `added_on`, `added_by`, `keterangan`) VALUES (NULL, ?, ?, ?, ?, ?)";
    $historystmt = $pdo->prepare($historysql);
    $historystmt->execute([$username, $money, $timestamp, $_SESSION['namaAdmin'], $keterangan]);

    header("Location: ../give_money.php?stat=1");
    exit();
} else {
    header("Location: ../give_money.php?stat=2");
    exit();
}
?>
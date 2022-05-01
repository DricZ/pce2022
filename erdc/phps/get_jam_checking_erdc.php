<?php
    require "connect.php";

    if (isset($_POST['tanggal'])) {
        $getJamsql = "SELECT * FROM jadwal_checking_erdc WHERE tanggal = ? AND count < kuota ORDER BY jam ASC";
        $getJamstmt = $pdo->prepare($getJamsql);
        $getJamstmt->execute([$_POST['tanggal']]);
        while ($getJam = $getJamstmt->fetch()) {
        echo "<option value='" . $getJam['jam'] . "'>" . $getJam['jam'] . " WIB</option>";
        }
    } else {
        exit();
    }
?>
<?php
require "connect.php";

if (isset($_POST['nama_lengkap']) 
&& isset($_POST['email_peserta']) 
&& isset($_POST['hp_peserta'])
&& isset($_POST['asal_instansi'])) { // apakah data sudah diisi dgn lengkap?
    if ($_POST['nama_lengkap'] == 'dummy' && $_POST['email_peserta'] == 'test') {
        $_SESSION['email_peserta'] = $_POST['email_peserta'];
    } else {
        $peserta_sql = "SELECT `id`, `nama`, `email`, `no_hp`, `instansi` FROM `pengunjung_pameran` 
        where nama = ? and email = ? and no_hp = ? and instansi = ?"; // select tabel peserta_pameran where sesuaikan data yang diinput
        $peserta_stmt = $pdo->prepare($peserta_sql);
        $peserta_stmt->execute([$_POST['nama_lengkap'], $_POST['email_peserta'], $_POST['hp_peserta'], $_POST['asal_instansi']]);
        $peserta = $peserta_stmt->fetch();

        if ($peserta_stmt->rowCount() == 1) { // jika ada data yang sesuai, set session dan pindah ke stand.html
            $_SESSION['email_peserta'] = $_POST['email_peserta'];
            header("Location: ../stand.php");
        } else {
            $sqlhistory ="INSERT INTO `pengunjung_pameran`(`id`, `nama`, `email`, `no_hp`, `instansi`) VALUES (null,?,?,?,?)";
            $stmthistory = $pdo->prepare($sqlhistory);
            $stmthistory->execute([$_POST['nama_lengkap'], $_POST['email_peserta'], $_POST['hp_peserta'], $_POST['asal_instansi']]);
            header("Location: ../stand.php");
        }
    }
} else {
    header("Location: ../receptionist.php?stat=1");
}
?>
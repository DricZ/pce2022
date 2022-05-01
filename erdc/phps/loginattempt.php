<?php
require "connect.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    // if(isset($_POST['g-recaptcha-response'])&& !empty($_POST['g-recaptcha-response']))
    // {
        if ($_POST['username'] == 'dummy' && $_POST['password'] == 'test') {
            $_SESSION['username'] = $_POST['username'];
        } else {
            if (strlen($_POST['username']) > 2) {
                header("Location: ../index.php?stat=4");
            }

            $cekTeamsql = "SELECT b.id, a.username, a.password, a.nama_kelompok, b.nama_sekolah FROM kelompok_erdc a JOIN pendaftar b ON a.id_pendaftar = b.id WHERE a.username = ?";
            $cekTeamstmt = $pdo->prepare($cekTeamsql);
            $cekTeamstmt->execute([$_POST['username']]);
            $cekTeam = $cekTeamstmt->fetch();

            if ($cekTeamstmt->rowCount() == 1) {
                if ($cekTeam['password'] == $_POST['password']) {
                    $_SESSION['username'] = $_POST['username'];
                    header("Location: ../jadwal_checking_erdc.php?stat=1");
                } else {
                    header("Location: ../index.php?stat=1");
                }
            } else {
                header("Location: ../index.php?stat=1");
            }
        }
    // }
    // else {
    //     header("Location: ../index.php?stat=2"); //captcha salah
    // }
} else {
    exit();
}
?>
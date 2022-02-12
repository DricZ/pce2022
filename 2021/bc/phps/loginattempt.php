<?php
require "connect.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    // if(isset($_POST['g-recaptcha-response'])&& !empty($_POST['g-recaptcha-response']))
    {
        if ($_POST['username'] == 'dummy' && $_POST['password'] == 'test') {
            $_SESSION['username'] = $_POST['username'];
        } else {
            if (strlen($_POST['username']) != 7) {
                header("Location: ../index.php?stat=4");
            }

            $cekTeamsql = "SELECT a.id, jenjang_pendidikan, nama_sekolah, nama_kelompok, nama_peserta_1, b.bc_univ_1, b.bc_sma_1, hp_peserta_1 FROM pendaftar a JOIN kode_peserta b ON a.id = b.id_pendaftar WHERE (pilihan_lomba_1 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_2 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_3 IN ('bc-sma', 'bc-univ')) AND (b.bc_univ_1 = ? OR b.bc_sma_1 = ?)";
            $cekTeamstmt = $pdo->prepare($cekTeamsql);
            $cekTeamstmt->execute([$_POST['username'], $_POST['username']]);
            $cekTeam = $cekTeamstmt->fetch();

            if ($cekTeamstmt->rowCount() == 1) {
                if ($cekTeam['hp_peserta_1'] == $_POST['password']) {
                    $_SESSION['username'] = $_POST['username'];
                    header("Location: ../jadwal_checking_bc.php");
                } else {
                    header("Location: ../index.php?stat=1");
                }
            } else {
                header("Location: ../index.php?stat=1");
            }
        }
    }
    // else {
    //     header("Location: ../index.php?stat=2"); //captcha salah
    // }
} else {
    exit();
}
?>
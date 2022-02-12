<?php
require "connect.php";

if(isset($_POST['g-recaptcha-response'])&& !empty($_POST['g-recaptcha-response']))
{
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
            echo "admin";
            $_SESSION['username'] = $_POST['username'];
        } else {
            $cekTeamsql = "SELECT COUNT(*) AS x, username, password FROM team WHERE username = ?";
            $cekTeamstmt = $pdo->prepare($cekTeamsql);
            $cekTeamstmt->execute([$_POST['username']]);
            $cekTeam = $cekTeamstmt->fetch();

            if ($cekTeam['x'] == 1) {
                if ($cekTeam['password'] == $_POST['password']) {
                    $checkStatussql = "SELECT * FROM team WHERE username = ?";
                    $checkStatusstmt = $pdo->prepare($checkStatussql);
                    $checkStatusstmt->execute([$_POST['username']]);
                    $checkStatus = $checkStatusstmt->fetch();

                    if ($checkStatus['status'] == 0) {
                        $updateLoginsql = "UPDATE team SET status = 1 WHERE username = ?";
                        $updateLoginstmt = $pdo->prepare($updateLoginsql);
                        $updateLoginstmt->execute([$_SESSION['username']]);
                    }

                    $_SESSION['username'] = $_POST['username'];

                    header("Location: ../menu.php");
                } else {
                    header("Location: ../index.php?stat=1");
                }
            } else {
                header("Location: ../index.php?stat=1");
            }
        }
    } else {
        exit();
    }
}
else {
    header("Location: ../index.php?stat=2"); //captcha salah
    exit();
}
?>
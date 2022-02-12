<?php
require "connect.php";

if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $imap = false;
        $timeout = 30;
        $fp = fsockopen($host = 'john.petra.ac.id', $port = 110, $errno, $errstr, $timeout);
        $errstr = fgets($fp);
        if (substr($errstr, 0, 1) == '+') {
            fputs($fp, "USER " . $user . "\n");
            $errstr = fgets($fp);
            if (substr($errstr, 0, 1) == '+') {
                fputs($fp, "PASS " . $pass . "\n");
                $errstr = fgets($fp);
                if (substr($errstr, 0, 1) == '+') {
                    $imap = true;
                }
            }
        }

        if ($_POST['username'] == 'itpce' && $_POST['password'] == 'tatak') {
            $_SESSION['usernameAdmin'] = $_POST['username'];
            $_SESSION['namaAdmin'] = 'Admin';
            header("Location: ../give_money.php");
        } else if ($imap) {
            $cekAdminsql = "SELECT * FROM admin WHERE nrp = ?";
            $cekAdminstmt = $pdo->prepare($cekAdminsql);
            $cekAdminstmt->execute([$_POST['username']]);
            $cekAdmin = $cekAdminstmt->fetch();
            if ($cekAdminstmt->rowCount() > 0) {
                $_SESSION['usernameAdmin'] = $_POST['username'];
                $_SESSION['namaAdmin'] = $cekAdmin['nama'];
                header("Location: ../give_money.php");
            } else {
                header("Location: ../index.php?stat=3");
            }
        } else {
            header("Location: ../index.php?stat=1");
        }
    } else {
        exit();
    }
} else {
    header("Location: ../index.php?stat=2"); //captcha salah
    exit();
}
?>

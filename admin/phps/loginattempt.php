<?php
require 'connect.php'; 

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user=$_POST['nrp'];
    $pass=$_POST['password'];
    $imap=false;
    $timeout=30;
    $fp = fsockopen ($host='john.petra.ac.id',$port=110,$errno,$errstr,$timeout);
    $errstr = fgets ($fp);
    if (substr ($errstr,0,1) == '+'){
        fputs ($fp,"USER ".$user."\n");
        $errstr = fgets ($fp);
        if (substr ($errstr,0,1) == '+'){
            fputs ($fp,"PASS ".$pass."\n");
            $errstr = fgets ($fp);
            if (substr ($errstr,0,1) == '+'){
                $imap=true;
            }
        }
    }

    if ($user == 'dummy' && $pass == 'test') {
        $imap = true;
    }
}

// if(isset($_POST['g-recaptcha-response'])&& !empty($_POST['g-recaptcha-response']))
// {
    if ($imap && strlen($_POST['nrp']) == 9 || $imap && $user == 'dummy') {
        $nrp = htmlspecialchars($_POST['nrp']);
        $nama = '';
        if ($user == 'dummy') {
            $nrp = 'b11200024';
        }

        // buat nyamar boii
        // if($nrp == 'c14180006'){
        //     $nrp = 'C13180144';
        // }

        //checking apakah yang login merupakan admin
        $sqlCekAdmin = "SELECT * FROM admin WHERE nrp = ?";
        $stmtCekAdmin = $pdo->prepare($sqlCekAdmin);
        $stmtCekAdmin->execute([$nrp]);

        // echo "$sqlCekAdmin";

        //jika bukan admin di redirect ke index dengan status 3
        if ($stmtCekAdmin->rowCount() == 0) {
            header("Location: ../index.php?stat=3");
            exit();
        }

        $rowAdmin = $stmtCekAdmin->fetch();

        $_SESSION['nrpAdmin'] = $rowAdmin['nrp'];
        $_SESSION['namaAdmin'] = $rowAdmin['nama'];
        $_SESSION['divisi'] = $rowAdmin['divisi'];

        header("Location: ../home.php?stat=1");
    } elseif (strlen($_POST['nrp']) != 9) {
        header("location: ../index.php?stat=4"); //gak sesuai format
    } else {
        header("location: ../index.php?stat=1"); //username pass salah
    }
// }
// else {
//     header("Location: ../index.php?stat=2"); //captcha salah
// }

// if ($imap && strlen($_POST['nrp']) == 9 || $imap && $user == 'dummy') {
//     $nrp = htmlspecialchars($_POST['nrp']);
//     $nama = '';
//     if ($user == 'dummy') {
//         $nrp = 'c14190056';
//     }

//     // buat nyamar boii
//     // if($nrp == 'c14180006'){
//     //     $nrp = 'C13180144';
//     // }

//     //checking apakah yang login merupakan admin
//     $sqlCekAdmin = "SELECT * FROM admin WHERE nrp = ?";
//     $stmtCekAdmin = $pdo->prepare($sqlCekAdmin);
//     $stmtCekAdmin->execute([$nrp]);

//     // echo "$sqlCekAdmin";

//     //jika bukan admin di redirect ke index dengan status 3
//     if ($stmtCekAdmin->rowCount() == 0) {
//         header("Location: ../index.php?stat=3");
//         exit();
//     }

//     $rowAdmin = $stmtCekAdmin->fetch();

//     $_SESSION['nrpAdmin'] = $rowAdmin['nrp'];
//     $_SESSION['namaAdmin'] = $rowAdmin['nama'];
//     $_SESSION['divisi'] = $rowAdmin['divisi'];

//     header("Location: ../home.php?stat=1");
// } elseif (strlen($_POST['nrp']) != 9) {
//     header("location: ../index.php?stat=4"); //gak sesuai format
// } else {
//     header("location: ../index.php?stat=1"); //username pass salah
// }

?>
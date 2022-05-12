<?php
require_once 'phps/connect.php';

if (!isset($_SESSION['nrpAdmin'])) {
	header("Location: index.php");
	exit();
}

$nama = $_SESSION['namaAdmin'];
$nrp = $_SESSION['nrpAdmin'];
$divisi = $_SESSION['divisi'];

// $sqlCek = "SELECT COUNT(*) AS x FROM pewawancara WHERE nrp = ?";
// $stmtCek = $pdo->prepare($sqlCek);
// $stmtCek->execute([$nrp]);
// $rowCek = $stmtCek->fetch();

// $countPewawancara = $rowCek['x'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-store" />

    <meta name="description" content="Open Recruitment Petra Civil Expo 2022">
    <meta name="author" content="">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" /> -->

    <!-- <title>Admin PCE 2022</title> -->
    <!-- For apple devices -->

    <!-- style -->
    <link rel="stylesheet" href="../style/styleadmin.css?v=<?php echo time(); ?>">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- ICON -->
    <link rel="icon" href="../assets/pce_icon.ico" type="image/x-icon">

    <!-- lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- jquery confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!-- data table -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    </script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.all.min.js"
        integrity="sha256-vT8KVe2aOKsyiBKdiRX86DMsBQJnFvw3d4EEp/KRhUE=" crossorigin="anonymous"></script>

    <?php include "resession.php" ?>

    <script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            var refresh = 1;
            $.ajax({
                url: "resession.php",
                type: "POST",
                data: {
                    refresh: refresh
                },
                success: function(res) {
                    console.log(res);
                }
            })
        }, 3000);
    })
    </script>

    <style>
    * {
        letter-spacing: 0.5;
    }

    body {
        background: #ededed;
        font-family: 'Oswald', sans-serif;
        text-transform: uppercase;
    }

    .logOut .jconfirm-title {
        padding-top: 20px !important;
    }

    .jconfirm-title {
        line-height: 1.2;
    }
    </style>
</head>

<script>
function signOut() {
    $.confirm({
        title: 'SIGN OUT?',
        type: 'orange',
        theme: 'modern',
        icon: "fas fa-question",
        backgroundDismissAnimation: 'random',
        autoClose: 'logoutUser|10000',
        closeAnimation: 'scale',
        columnClass: "logOut col-md-5",
        buttons: {
            logoutUser: {
                text: 'AMIN',
                btnClass: 'btn-green',
                action: function() {
                    alert('Tuhan Yesus memberkati.');
                    window.location.href = "phps/signout.php";
                }
            },
            cancel: {
                text: 'CANCEL',
                btnClass: 'btn-red',
                action: function() {}
            }
        },
        content: "<div style='color: black; font-size: 12pt;'>\"Kamu tahu, bahwa setiap orang, baik hamba, maupun orang merdeka, kalau ia telah berbuat sesuatu yang baik, ia akan menerima balasannya dari Tuhan.\"<br><b>Efesus 6:8</b></div><br>"
    });
}
</script>

<body>
    <nav class="navbar navbar-expand-xl navbar-light" style="z-index: 10;">
        <a class="navbar-brand" href="../admin/home.php">
            <img src="..\assets\pce_logo color.png" style="width:100px; height:29px;" class="d-inline-block align-top"
                alt="" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav">
                <?php if ($_SESSION['page'] == 'home') {
					echo '<li class="nav-item active">
					<a class="nav-link" href="home.php"><i class="fas fa-home" style="padding-right: 4px;"></i>HOME</a>
					</li>';
				} else {
					echo '<li class="nav-item">
					<a class="nav-link" href="home.php"><i class="fas fa-home" style="padding-right: 4px;"></i>HOME</a>
					</li>';
				}
				?>
                <?php
				if ($_SESSION['page'] == 'pendaftar') {
					echo '<li class="nav-item active">
							<a class="nav-link" href="list_pendaftar2.php"><i class="fas fa-users" style="padding-right: 4px;"></i> PENDAFTAR LOMBA</a>
							</li>';
				} else {
					echo '<li class="nav-item">
							<a class="nav-link" href="list_pendaftar2.php"><i class="fas fa-users" style="padding-right: 4px;"></i> PENDAFTAR LOMBA</a>
							</li>';
				}
				?>
                <?php
				if ($_SESSION['page'] == 'webinar') {
					echo '<li class="nav-item active">
							<a class="nav-link" href="list_pendaftar_webinar.php"><i class="fas fa-microphone" style="padding-right: 4px;"></i> PENDAFTAR TalkShow</a>
							</li>';
				} else {
					echo '<li class="nav-item">
							<a class="nav-link" href="list_pendaftar_webinar.php"><i class="fas fa-microphone" style="padding-right: 4px;"></i> PENDAFTAR TalkShow</a>
							</li>';
				}
				?>
                <?php
				if ($_SESSION['page'] == 'pameran') {
					echo '<li class="nav-item active">
							<a class="nav-link" href="pengunjung_pameran.php"><i class="fas fa-booth-curtain"></i> Pengunjung Pameran</a>
							</li>';
				} else {
					echo '<li class="nav-item">
							<a class="nav-link" href="pengunjung_pameran.php"><i class="fas fa-booth-curtain"></i> Pengunjung Pameran</a>
							</li>';
				}
				?>
                <?php
				if ($_SESSION['page'] == 'balsa' || $_SESSION['page'] == 'jadwal_checking_bc') {
				?>
                <div class="dropdown">
                    <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown"><b>Bridge
                            Competition</b></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="text-align: center;">
                        <a class="dropdown-item" href="list_balsa.php"><i class="fas fa-tree"
                                style="padding-right: 4px;"></i> PENERIMA KAYU BALSA</a>
                        <a class="dropdown-item" href="list_jadwal_checking_bc.php"><i class="fas fa-calendar-alt"
                                style="padding-right: 4px;"></i> LIST JADWAL CHECKING</a>
                        <!-- LINK KE ADD NO RESI & HARGA -->
                        <!-- <a class="dropdown-item" href="post_pengiriman.php"><i class="fas fa-solid fa-person-dolly" style="padding-right: 4px;"></i> POST NO RESI & HARGA PENGIRIMAN</a> -->
                    </div>
                </div>
                <?php
				} else {
				?>
                <div class="dropdown">
                    <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown">Bridge Competition</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="text-align: center;">
                        <a class="dropdown-item" href="list_balsa.php"><i class="fas fa-tree"
                                style="padding-right: 4px;"></i> PENERIMA KAYU BALSA</a>
                        <a class="dropdown-item" href="list_jadwal_checking_bc.php"><i class="fas fa-calendar-alt"
                                style="padding-right: 4px;"></i> LIST JADWAL CHECKING</a>

                        <!-- LINK KE ADD NO RESI & HARGA -->
                        <!-- <a class="dropdown-item" href="post_pengiriman.php"><i class="fas fa-solid fa-person-dolly" style="padding-right: 4px;"></i> POST NO RESI & HARGA PENGIRIMAN</a> -->
                    </div>
                </div>
                <?php
				}
				?>
                <?php
				if ($_SESSION['page'] == 'jadwal_checking_erdc') {
				?>
                <div class="dropdown">
                    <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown"><b>ERDC</b></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="text-align: center;">
                        <a class="dropdown-item" href="list_jadwal_checking_erdc.php"><i class="fas fa-calendar-alt"
                                style="padding-right: 4px;"></i> LIST JADWAL CHECKING</a>
                    </div>
                </div>
                <?php
				} else {
				?>
                <div class="dropdown">
                    <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown">ERDC</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="text-align: center;">
                        <a class="dropdown-item" href="list_jadwal_checking_erdc.php"><i class="fas fa-calendar-alt"
                                style="padding-right: 4px;"></i> LIST JADWAL CHECKING</a>
                    </div>
                </div>
                <?php
				}
				?>
                <?php
				if ($_SESSION['page'] == 'addadmin') {
					echo '<li class="nav-item active">
							<a class="nav-link" href="addAdmin.php"><i class="fas fa-key" style="padding-right: 4px;"></i> TAMBAH ADMIN BARU</a>
							</li>';
				} else {
					echo '<li class="nav-item">
							<a class="nav-link" href="addAdmin.php"><i class="fas fa-key" style="padding-right: 4px;"></i>TAMBAH ADMIN BARU</a>
							</li>';
				}
				?>
                <li class="nav-item">
                    <a class="nav-link" onclick="signOut()" style="cursor: pointer;"><i class="fa fa-sign-out"
                            style="padding: 4px;"></i>SIGN OUT</a>
                </li>
            </ul>
        </div>
    </nav>
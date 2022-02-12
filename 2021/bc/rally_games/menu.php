<?php
require_once 'header.php';
// if(!isset($_SESSION['user']))
// {
//     header("Location: login.php");
//     exit();
// }

$_SESSION['page'] = 'menu';
$username = $_SESSION['username'];

$sqlTeam = "SELECT * FROM team WHERE username = ?";
$stmtTeam = $pdo->prepare($sqlTeam);
$stmtTeam->execute([$_SESSION['username']]);
$rowTeam = $stmtTeam->fetch();

$getTeamDatasql = "SELECT * FROM `pendaftar` WHERE (pilihan_lomba_1 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_2 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_3 IN ('bc-sma', 'bc-univ')) AND nama_kelompok = ?";
$getTeamDatastmt = $pdo->prepare($getTeamDatasql);
$getTeamDatastmt->execute([$rowTeam['team_name']]);
$getTeamDatarow = $getTeamDatastmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Welcome, <?= $rowTeam['team_name'] ?>!</title>
    <link rel="stylesheet" href="./assets/fonts/Industry/stylesheet.css" />
</head>
<style>
    .clock {
        font-family: "Industry";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
        color: white;
        font-size: 80px;
        letter-spacing: 7px;
    }

    img {
        width: 150px;
        height: 250px;
        object-fit: cover;
    }

    .container {
        justify-content: center;
        text-align: center;
    }

    .player {
        display: inline-block;

    }

    .title {
        background: linear-gradient(to right, #ffdca2, #ff9190, #36d1dc, #5b86e5);
        animation: changeColor 10s infinite;
        color: #000;
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 3rem;
    }

    @keyframes changeColor {
        50% {
            background-position: 100% 0;
        }
    }
</style>

<body>
    <!-- <div id="MyClockDisplay" class="clock" onload="showTime()"></div> -->
    <div class="container mt-2 mb-5">
        <h3 class="title">WELCOME!</h3>
        <!-- <h2 class="subtitle"><?= $rowTeam['team_name'] ?></h2> -->
        <h2 class="subtitle"><?= $getTeamDatarow['nama_kelompok'] ?></h2>
        <h4 class="subtitle pb-4"><?= $getTeamDatarow['nama_sekolah'] ?></h4>
        <div class="row" align="center">
            <?php
            if ($getTeamDatarow['jumlah_anggota'] == 1) {
            ?>
                <div class="player one px-3 col-12">
                    <img src="../../uploads/3x4/<?= $getTeamDatarow['3x4_peserta_1'] ?>">
                    <div class="text-centered pt-2" style="font-size:16pt;"><?= $getTeamDatarow['nama_peserta_1'] ?></div>
                </div>
            <?php
            }
            if ($getTeamDatarow['jumlah_anggota'] == 2) {
            ?>
                <div class="player one px-3 col-md-6 col-12">
                    <img src="../../uploads/3x4/<?= $getTeamDatarow['3x4_peserta_1'] ?>">
                    <div class="text-centered pt-2" style="font-size:16pt;"><?= $getTeamDatarow['nama_peserta_1'] ?></div>
                </div>
                <div class="player two px-3 col-md-6 col-12">
                    <img src="../../uploads/3x4/<?= $getTeamDatarow['3x4_peserta_2'] ?>">
                    <div class="text-centered pt-2" style="font-size:16pt;"><?= $getTeamDatarow['nama_peserta_2'] ?></div>
                </div>
            <?php
            }
            if ($getTeamDatarow['jumlah_anggota'] == 3) {
            ?>
                <div class="player one px-3 col-md-4 col-12">
                    <img src="../../uploads/3x4/<?= $getTeamDatarow['3x4_peserta_1'] ?>">
                    <div class="text-centered pt-2" style="font-size:16pt;"><?= $getTeamDatarow['nama_peserta_1'] ?></div>
                </div>
                <div class="player two px-3 col-md-4 col-12">
                    <img src="../../uploads/3x4/<?= $getTeamDatarow['3x4_peserta_2'] ?>">
                    <div class="text-centered pt-2" style="font-size:16pt;"><?= $getTeamDatarow['nama_peserta_2'] ?></div>
                </div>
                <div class="player three px-3 col-md-4 col-12">
                    <img src="../../uploads/3x4/<?= $getTeamDatarow['3x4_peserta_3'] ?>">
                    <div class="text-centered pt-2" style="font-size:16pt;"><?= $getTeamDatarow['nama_peserta_3'] ?></div>
                </div>
            <?php
            }
            ?>
        </div>
        <?php
        if ($rowTeam['location_now_id_city'] == 0) {
        ?>
            <h5 class="subtitle mt-4" style="color: yellow;">Silakan pilih kota pertama Anda di menu Map untuk memulai rally games. Good luck and have fun!</h5>
        <?php
        }
        ?>
    </div>
    <div class="footer my-5">
        &nbsp
    </div>
</body>

<script>
    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";

        if (h == 0) {
            h = 12;
        }

        if (h > 12) {
            h = h - 12;
            session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;

        setTimeout(showTime, 1000);

    }

    showTime();
</script>

</html>
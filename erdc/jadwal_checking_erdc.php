<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'jadwal_checking_erdc';
require_once 'header.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
// else if($_SESSION['nrpAdmin'] != 'b11190189' && $_SESSION['nrpAdmin'] != 'b11190099' && $_SESSION['nrpAdmin'] != 'b11190011' && $_SESSION['nrpAdmin'] != 'b11190092')
// {
//     
//     header("Location: index.php");    
//     exit();
// }

$getTeamsql = "SELECT b.id, a.username, a.password, a.nama_kelompok, b.nama_sekolah FROM kelompok_erdc a JOIN pendaftar b ON a.id_pendaftar = b.id WHERE a.username = ?";
$getTeamstmt = $pdo->prepare($getTeamsql);
$getTeamstmt->execute([$_SESSION['username']]);
$getTeam = $getTeamstmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<style>
    body {
        background-color: var(--whitebrown);
    }

    h5 {
        font-size: 12pt;
    }

    @media screen and (max-width: 893px) {
        #outline-gedung {
            display: none;
        }

        #lower-curve {
            display: none;
        }

        #upper-curve {
            display: none;
        }
    }
</style>

<script>
    function lihatJadwal() {
        $.confirm({
            title: 'JADWAL CHECKING TEAM<br><?= strtoupper($getTeam['nama_kelompok']) ?>',
            type: 'green',
            typeAnimated: true,
            theme: 'modern',
            draggable: false,
            backgroundDismissAnimation: 'random',
            onOpen: function() {
                setTimeout(() => {
                    <?php
                    $getJadwalsql = "SELECT * FROM hasil_pilih_jadwal_checking_erdc a JOIN jadwal_checking_erdc b ON a.id_jadwal = b.id WHERE a.id_pendaftar = ?";
                    $getJadwalstmt = $pdo->prepare($getJadwalsql);
                    $getJadwalstmt->execute([$getTeam['id']]);
                    ?>
                    var str = `
                  <div style="color: black; font-weight: 500; max-height: 360px; font-size: 14pt;">
                  <?php
                    if ($getJadwalstmt->rowCount() > 1) {
                        $index = 0;
                        while ($getJadwal = $getJadwalstmt->fetch()) {
                            if ($index == 0) {
                                $count = 'PERTAMA';
                            } else {
                                $count = 'KEDUA';
                            }
                    ?>
                    <hr>
                    <p style="font-weight: bold;">JADWAL CHECKING <?= $count ?></p>
                    <p><?= $getJadwal['tanggal'] ?><br><?= $getJadwal['jam'] ?> WIB</p>
                        <?php
                            $index++;
                        }
                    } else {
                        while ($getJadwal = $getJadwalstmt->fetch()) {
                        ?>
                    <hr>
                    <p><?= $getJadwal['tanggal'] ?><br><?= $getJadwal['jam'] ?> WIB</p>
                        <?php
                        }
                    }
                        ?>
                        <hr>
                  </div>
               `;
                    this.$content.html(str);
                }, 100);
            },
            closeAnimation: 'scale',
            columnClass: "col-md-7",
            buttons: {
                cancel: {
                    text: 'OK',
                    btnClass: 'btn-red',
                    action: function() {}
                }
            },
            content: ""
        });
    }
</script>

<?php
if (isset($_GET['stat'])) {
    if ($_GET['stat'] == 1) {
        echo '<script>',
        '	Swal.fire({
                position: "center",
                icon: "success",
                title: "Selamat Datang!",
                showConfirmButton: false,
                timer: 3000
                })',
        '</script>';
    }
}
?>

<head>
    <title>ERDC 2022 - Pemilihan Jadwal Checking Session</title>
</head>

<body>
    <div class="container-xl py-5" style="min-height:100vh;" id="jadwalchecking">
        <?php
        $checkFilledsql = "SELECT * FROM hasil_pilih_jadwal_checking_erdc WHERE id_pendaftar = ?";
        $checkFilledstmt = $pdo->prepare($checkFilledsql);
        $checkFilledstmt->execute([$getTeam['id']]);

        if ($checkFilledstmt->rowCount() >= 2) {
        ?>
            <div class="justify-content-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <h1 style="text-align: center; font-weight: bold; letter-spacing: 5px; color: brown; font-size: 72pt; margin-bottom: 0.3em;">TERIMA KASIH</h1>
                <h5 style="text-align: center; letter-spacing: 5px;" class="blue"><b><?= $getTeam['nama_kelompok'] ?></b> telah selesai memilih jadwal untuk <b>Checking Session ERDC 2022</b></h5>

                <br>
                <h4 style="text-align: center; font-weight: bold; letter-spacing: 5px; font-size: 20pt;" class="blue">STAY TUNED!</h4>
            </div>
        <?php
        } else {
        ?>
            <center><a href="https://www.instagram.com/erdcpetra" target="_blank"><img src="asset/image/pce_erdc.png" alt="" style="width: 250px; height: 250px;-webkit-filter: drop-shadow(7px 7px 7px #222); filter: drop-shadow(7px 7px 7px #222); margin-top: 100px;"></a></center>
            <div class="justify-content-center">
                <center><label for="nama" style="text-align: center;" class="mt-5">Nama Team</label></center>
                <h4 style="text-align: center; font-weight: bold;"><?= $getTeam['nama_kelompok'] ?></h4>
            </div>
            <div class="justify-content-center mb-5 mt-4">
                <center><label for="nama" style="text-align: center;">Asal Universitas</label></center>
                <h4 style="text-align: center; font-weight: bold;"><?= $getTeam['nama_sekolah'] ?></h4>
            </div>

            <!-- upper curve -->
            <svg id="upper-curve" style="position:absolute;top:0;left:0;z-index:-2;" xmlns="http://www.w3.org/2000/svg" width="40vw" viewBox="0 0 580.32 497.07">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #fffcfa;
                        }
                    </style>
                </defs>
                <g id="Layer_2" data-name="Layer 2">
                    <g id="Layer_1-2" data-name="Layer 1">
                        <path class="cls-1" d="M.5,497.07s119-313,311-243S580.32,0,580.32,0L0,1.57Z" />
                    </g>
                </g>
            </svg>

            <!-- lower curve -->
            <svg id="lower-curve" style="position:absolute; bottom:-22vh; right:0;z-index:-2;" width="50vw" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 584 430.66">
                <defs>
                    <style>
                        .cls-2 {
                            fill: #c7b299;
                        }
                    </style>
                </defs>
                <g id="Layer_3" data-name="Layer 3">
                    <g id="Layer_3-2" data-name="Layer 3">
                        <path class="cls-2" d="M584,14.66c-453-108-584,416-584,416H583.5Z" />
                    </g>
                </g>
            </svg>

            <!-- outline gedung erdc -->
            <img id="outline-gedung" src="asset/svg/outline_gedung_erdc.svg" style="position:absolute; width:30vw; bottom:0; right:0;">

    </div>


    <!-- <hr> -->
    <section style="background-color: #c7b299;padding-top:5vh;padding-bottom:5vh;">
        <div class="justify-content-center mt-5 mb-3 mx-3">
            <?php
            $checkingsql = "SELECT * FROM hasil_pilih_jadwal_checking_erdc WHERE id_pendaftar = ?";
            $checkingstmt = $pdo->prepare($checkingsql);
            $checkingstmt->execute([$getTeam['id']]);
            if ($checkingstmt->rowCount() == 0) {
            ?>
                <h3 style="text-align: center; font-weight: bold; color: black;">Pemilihan Jadwal Checking Pertama</h3>
        </div>
        <div class="justify-content-center mt-4 mb-5 mx-3">
            <h5 style="text-align: center;">Team <?= $getTeam['nama_kelompok'] ?> <b>belum pernah</b> memilih jadwal untuk checking,<br>pemilihan jadwal dapat dilakukan sebanyak <b>2 (dua)</b> kali</h5>
            <h5 style="text-align: center;">Silakan memilih <b>jadwal pertama</b> untuk checking team <?= $getTeam['nama_kelompok'] ?></h5>
        <?php
            } else if ($checkingstmt->rowCount() == 1) {
        ?>
            <h3 style="text-align: center; font-weight: bold; color: black;">Pemilihan Jadwal Checking Kedua</h3>
            <h3 style="text-align: center; font-weight: bold; color: black;">Earthquake Resistant Design Competition</h3>
        </div>
        <div class="justify-content-center mt-4 mb-3 mx-3">
            <h5 style="text-align: center;">Team <?= $getTeam['nama_kelompok'] ?> sudah pernah memilih jadwal untuk checking sebanyak <b>1 (satu)</b> kali, team <?= $getTeam['nama_kelompok'] ?> dapat memilih jadwal sebanyak <b>1 (satu)</b> kali lagi</h5>
            <h5 style="text-align: center;">Silakan memilih <b>jadwal kedua</b> untuk checking team <?= $getTeam['nama_kelompok'] ?> <b>(opsional)</b></h5>
            <?php
                if ($getJadwalstmt->rowCount() > 0) {
            ?>
                <center><button class="btn btn-dark px-3" style="font-weight: bold;" onclick="lihatJadwal()">Lihat Jadwal Checking</button></center>
            <?php
                }
            ?>
        <?php
            }
        ?>
        </div>
        <form action="phps/submit_jadwal_checking_erdc.php" method="POST">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <center><label for="tanggal" style="font-weight: bold;">Tanggal</label></center>
                        <center><select class="form-control" id="tanggal" name="tanggal" style="height:40px; font-size: 12pt;width:50vw;" onchange="toggleJam()" required>
                                <option value="">Pilih tanggal...</option>
                                <?php
                                $jadwalsql = "SELECT DISTINCT tanggal FROM `jadwal_checking_erdc` WHERE count < kuota ORDER BY tanggal ASC";
                                $jadwalstmt = $pdo->prepare($jadwalsql);
                                $jadwalstmt->execute();
                                while ($jadwalrow = $jadwalstmt->fetch()) {
                                ?>
                                    <option value="<?= $jadwalrow['tanggal'] ?>"><?= $jadwalrow['tanggal'] ?></option>
                                <?php
                                }
                                ?>
                            </select></center>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <center><label for="jam" style="font-weight: bold;">Jam</label></center>
                        <center><select class="form-control" id="jam" name="jam" style="height:40px; font-size: 12pt;width:50vw;" disabled>
                                <option value="">Pilih jam...</option>
                            </select></center>
                    </div>
                </div>
            </div>
            <!-- <hr class="mt-3"> -->
            <h5 style="text-align: center; font-size: 12pt; color: red; font-weight:bold;" class="mx-3 mt-3">Harap pastikan jadwal yang dipilih sudah <u>sesuai</u>!<br>Data hanya dapat dilakukan submit 1 (satu) kali saja dan tidak dapat diubah kembali.</h5>
            <center><input type="submit" id="submit" name="submit" value="Submit Data" class="btn btn-dark px-5 mt-3 mb-5" style="font-weight: bold;"></center>
        </form>
    </section>

    <?php include 'footer.php' ?>
<?php
        }
?>
</body>

<script>
    if (performance.navigation.type == 2) {
        location.reload(true);
    }

    function toggleJam() {
        if ($("#tanggal").val() == "") {
            $("#jam").prop('disabled', true);
            $("#jam").html('<option value="">Pilih jam...</option>');
        } else {
            $("#jam").removeAttr('disabled');
            $("#jam").prop('required', true);
            var tanggal = $("#tanggal").val();
            $.ajax({
                url: "phps/get_jam_checking_erdc.php",
                data: {
                    tanggal: tanggal
                },
                method: "POST",
                success: function(res) {
                    $("#jam").html('<option value="">Pilih jam...</option>' + res);

                }
            });
        }
    }
</script>

</html>
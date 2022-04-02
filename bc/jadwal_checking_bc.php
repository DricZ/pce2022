<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'jadwal_checking';
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

$getTeamsql = "SELECT a.id, jenjang_pendidikan, nama_sekolah, nama_kelompok, nama_peserta_1, b.bc_univ_1, b.bc_sma_1, hp_peserta_1 FROM pendaftar a JOIN kode_peserta b ON a.id = b.id_pendaftar WHERE (pilihan_lomba_1 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_2 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_3 IN ('bc-sma', 'bc-univ')) AND (b.bc_univ_1 = ? OR b.bc_sma_1 = ?)";
$getTeamstmt = $pdo->prepare($getTeamsql);
$getTeamstmt->execute([$_SESSION['username'], $_SESSION['username']]);
$getTeam = $getTeamstmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<style>
    body {
        background-color: var(--whitebrown);
    }
</style>

<head>
    <title>PCE 2021 - Jadwal Checking Jembatan</title>
</head>

<body>
    <div class="container-xl pt-5">
        <?php
        $checkFilledsql = "SELECT * FROM hasil_pilih_jadwal_checking_bc WHERE id_pendaftar = ?";
        $checkFilledstmt = $pdo->prepare($checkFilledsql);
        $checkFilledstmt->execute([$getTeam['id']]);

        if ($checkFilledstmt->rowCount() != 0) {
        ?>
            <div class="justify-content-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <h1 style="text-align: center; font-weight: bold; letter-spacing: 5px; color: brown; font-size: 72pt; margin-bottom: 0.3em;">TERIMA KASIH</h1>
                <h5 style="text-align: center; letter-spacing: 5px;" class="blue"><b><?= $getTeam['nama_kelompok'] ?></b> telah memilih jadwal untuk checking jembatan</h5>
                <br>
                <h4 style="text-align: center; font-weight: bold; letter-spacing: 5px; font-size: 20pt;" class="blue">STAY TUNED!</h4>
            </div>
        <?php
        } else {
        ?>
            <center><a href="https://www.instagram.com/bcukp" target="_blank"><img src="../assets/pce_bridge.png" alt="" style="width: 250px; height: 250px;-webkit-filter: drop-shadow(7px 7px 7px #222); filter: drop-shadow(7px 7px 7px #222); margin-top: 100px;"></a></center>
            <div class="justify-content-center">
                <center><label for="nama" style="text-align: center;" class="mt-5">Nama Team</label></center>
                <h4 style="text-align: center; font-weight: bold;"><?= $getTeam['nama_kelompok'] ?></h4>
            </div>
            <div class="justify-content-center mb-5 mt-4">
                <?php
                if ($getTeam['jenjang_pendidikan'] == 'College') {
                    $str = 'Asal Universitas';
                } else if ($getTeam['jenjang_pendidikan'] == 'Senior High School') {
                    $str = 'Sekolah Menengah Atas';
                }
                ?>
                <center><label for="nama" style="text-align: center;">Asal <?= $str ?></label></center>
                <h4 style="text-align: center; font-weight: bold;"><?= $getTeam['nama_sekolah'] ?></h4>
            </div>
            <hr>
            <div class="justify-content-center mt-5 mb-3 mx-3">
                <h3 style="text-align: center; font-weight: bold; color: red;">Jadwal Checking Jembatan</h3>
                <h5 style="text-align: center;">silakan memilih jadwal untuk checking jembatan</h5>
            </div>
            <form action="phps/submit_jadwal_checking_bc.php" method="POST">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <center><label for="tanggal" style="font-weight: bold;">Tanggal</label></center>
                            <select class="form-control" id="tanggal" name="tanggal" style="height:40px; font-size: 12pt;" onchange="toggleJam()" required>
                                <option value="">Pilih tanggal...</option>
                                <?php
                                $jadwalsql = "SELECT DISTINCT tanggal FROM `jadwal_checking_bc` WHERE count < kuota ORDER BY tanggal ASC";
                                $jadwalstmt = $pdo->prepare($jadwalsql);
                                $jadwalstmt->execute();
                                while ($jadwalrow = $jadwalstmt->fetch()) {
                                    if ($getTeam['jenjang_pendidikan'] == 'College') {
                                        if ($jadwalrow['tanggal'] == '24-04-2021') {
                                ?>
                                            <option value="<?= $jadwalrow['tanggal'] ?>"><?= $jadwalrow['tanggal'] ?></option>
                                        <?php
                                        }
                                    } else if ($getTeam['jenjang_pendidikan'] == 'Senior High School') {
                                        if ($jadwalrow['tanggal'] == '23-04-2021') {
                                        ?>
                                            <option value="<?= $jadwalrow['tanggal'] ?>"><?= $jadwalrow['tanggal'] ?></option>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <center><label for="jam" style="font-weight: bold;">Jam</label></center>
                            <select class="form-control" id="jam" name="jam" style="height:40px; font-size: 12pt;" disabled>
                                <option value="">Pilih jam...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="mt-5">
                <h5 style="text-align: center; font-size: 12pt; color: red; font-weight:bold;" class="mx-3">Harap pastikan jadwal yang dipilih sudah <u>sesuai</u>!<br>Data hanya dapat dilakukan submit 1 (satu) kali dan tidak dapat diubah kembali.</h5>
                <center><input type="submit" id="submit" name="submit" value="Submit Data" class="btn btn-warning mt-3 mb-5" style="font-weight: bold;"></center>
            </form>
    </div>
    <?php include 'footer.php' ?>
<?php
        }
?>
</body>

<script>
    function toggleJam() {
        if ($("#tanggal").val() == "") {
            $("#jam").prop('disabled', true);
            $("#jam").html('<option value="">Pilih jam...</option>');
        } else {
            $("#jam").removeAttr('disabled');
            $("#jam").prop('required', true);
            var tanggal = $("#tanggal").val();
            $.ajax({
                url: "phps/get_jam_checking_bc.php",
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
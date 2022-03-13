<?php
require 'phps/connect.php';
$_SESSION['page'] = 'give_skill';

include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin BC 2021 - Give Skill</title>
</head>

<?php
if (isset($_GET['stat'])) {
    if ($_GET['stat'] == 1) {
        echo '<script>',
        '	Swal.fire({
                position: "center",
                icon: "success",
                title: "Sukses Memberikan Bridge Money!",
                showConfirmButton: false,
                timer: 2000
                })',
        '</script>';
    } else if ($_GET['stat'] == 2) {
        echo '<script>',
        '	Swal.fire({
                position: "center",
                icon: "error",
                title: "Gagal Memberikan Bridge Money! <br>Silakan Coba Ulangi Kembali.",
                showConfirmButton: false,
                timer: 2000
                })',
        '</script>';
    }
}
?>

<style>
    .jconfirm-title {
        padding-top: 20px !important;
    }
</style>

<body>
    <div class="row mb-3">
        <div class="col-12 col-md-10 offset-md-1 mt-5">
            <div align="center">
                <h2>ADD SKILL</h2>
                <h2><b>RALLY GAMES BRIDGE COMPETITION</b></h2>
                <h2><b>PETRA CIVIL EXPO 2021</b></h2>
            </div>
        </div>
    </div>

    <h3 style="text-align: center; font-weight: bold; color: yellow;"><?= $_SESSION['namaAdmin'] ?></h3>

    <p style="text-align: center; font-weight: bold;">SILAKAN MELAKUKAN ADD SKILL SECARA DENGAN TELITI UNTUK MENGATASI KESALAHAN INPUT</p>

    <div class="row mt-5">
        <div class="col-12 col-md-4">
            <center><a href="statistics.php" class="btn btn-info container-fluid" style="width: 250px; font-weight: bold;">Statistics</a></center>
        </div>
        <div class="col-12 col-md-4">
            <center><a href="add_bridge_money_history.php" class="btn btn-danger container-fluid" style="width: 250px; font-weight: bold;">Add Bridge Money History</a></center>
        </div>
        <div class="col-12 col-md-4">
            <center><a href="team_ranking.php" class="btn btn-primary container-fluid" style="width: 250px; font-weight: bold;">Team Ranking</a></center>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 col-md-6">
            <center><a href="give_money.php" class="btn btn-success container-fluid" style="width: 250px; font-weight: bold;">Add Bridge Money</a></center>
        </div>
        <div class="col-12 col-md-6" >
            <center><a href="addskill.php" class="btn btn-light container-fluid" style="width: 250px; font-weight: bold;">Add Skill</a></center>
        </div>
        <!-- <script>
            $(document).ready(function(){
                document.getElementById("bencana").innerHTML = '<center><a href="mantan.php" id="popover_bencana" data-trigger="hover"class="btn btn-danger container-fluid" style="width: 250px; font-weight: bold;"data-content="Bencana berikutnya: " data-placement="bottom">Natural Disaster</a></center>';
                document.getElementById("treasure").innerHTML = '<center><a href="#" id="popover_treasure" data-trigger="hover"class="btn btn-warning container-fluid" style="width: 250px; font-weight: bold;"data-content="Treasure: " data-placement="bottom">Spawn Treasure</a></center>';
                $("#popover_bencana").popover({ trigger: "hover" });  
                $("#popover_treasure").popover({ trigger: "hover" }); 
            });
        </script> -->
    </div>

    <div class="container pt-3">
        <form action="phps/add_skill.php" onsubmit="pleaseWait()" method="POST">
            <div class="form-group">
                <center><label for="team" style="font-weight: bold;" class="mt-3">Nama Team</label></center>
                <select class="form-control" id="team" name="team" style="height:40px; font-size: 12pt;" required>
                    <option value="">Pilih nama team...</option>
                    <?php
                    $sqlTeam = "SELECT * FROM team";
                    $stmtTeam = $pdo->prepare($sqlTeam);
                    $stmtTeam->execute([]);
                    while ($rowTeam = $stmtTeam->fetch()) { ?>
                        <option value="<?php echo $rowTeam['username']; ?>"><?php echo $rowTeam['team_name']; ?></option>
                    <?php  } ?>
                </select>
                <center><label for="skill" style="font-weight: bold;" class="mt-3">Nama Skill</label></center>
                <select class="form-control" id="skill" name="skill" style="height:40px; font-size: 12pt;" required>
                    <option value="">Pilih nama team...</option>
                    <?php
                    $sqlskill = "SELECT * FROM new_skill";
                    $stmtskill = $pdo->prepare($sqlskill);
                    $stmtskill->execute([]);
                    while ($rowskill = $stmtskill->fetch()) { ?>
                        <option value="<?php echo $rowskill['nama']; ?>"><?php echo $rowskill['nama']; ?></option>
                    <?php  } ?>
                </select>
                <center><label for="keterangan" style="font-weight: bold;" class="mt-3">Keterangan</label></center>
                <input type="text" style="text-align: center;" id="keterangan" name="keterangan" placeholder="Ex: Pemenang Mini Games ... Juara 1/2/3 dst." class="form-control" required>
            </div>
            <p style="text-align: center; font-weight: bold; color: red;">HARAP PASTIKAN JUMLAH BRIDGE MONEY YANG DILAKUKAN INPUT <u>SUDAH SESUAI</u>!!!<br>APABILA TERJADI KESALAHAN INPUT <u>SEGERA</u> HUBUNGI DIVISI IT</p>
            <center><input type="submit" id="submit" name="submit" value="Add skill" class="btn btn-warning container-fluid" style="width: 200px; font-weight: bold;"></center>
            <div id="uploading" class="row justify-content-center mb-5" hidden>
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only" style="color: white;">Loading...</span>
                </div>
            </div>
        </form>

        <!-- <h1 style="color: red; text-align: center; font-weight: bold;">MOHON MAAF!<br>ANDA TIDAK MEMILIKI HAK AKSES KE PAGE INI.</h1> -->
        <!-- <p class="mt-4" style="text-align: center; font-size: 16pt; font-weight: bold;">Penambahan admin baru hanya dapat dilakukan oleh Ketua Petra Civil Expo 2021, Ketua maupun Wakil Ketua tiap Bidang Lomba, dan Divisi IT. Silakan mengirim data calon admin baru (nama lengkap, nrp, divisi, dan bidang lomba) ke salah satu pihak di atas untuk ditambahkan kemudian.<br>Terima kasih.</p> -->
    </div>
    <div class="footer my-5 pb-5">
        &nbsp
    </div>
</body>

<script>
    function pleaseWait() {
        $('#submit').prop('hidden', true);
        $("#uploading").removeAttr("hidden");
    }
</script>

</html>
<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'pengiriman_balsa';
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
    <title>PCE 2021 - Pengiriman Kayu Balsa</title>
</head>

<body>
    <div class="container-xl pt-5">
        <?php
        $checkFilledsql = "SELECT * FROM penerima_balsa WHERE id_team = ?";
        $checkFilledstmt = $pdo->prepare($checkFilledsql);
        $checkFilledstmt->execute([$getTeam['id']]);

        if ($checkFilledstmt->rowCount() != 0) {
        ?>
            <div class="justify-content-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <h1 style="text-align: center; font-weight: bold; letter-spacing: 5px; color: brown; font-size: 72pt; margin-bottom: 0.3em;">TERIMA KASIH</h1>
                <h5 style="text-align: center; letter-spacing: 5px;" class="blue"><b><?= $getTeam['nama_kelompok'] ?></b> telah memberikan data untuk calon penerima Kayu Balsa</h5>
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
                <h3 style="text-align: center; font-weight: bold; color: red;">Data Penerima Kayu Balsa</h3>
                <h5 style="text-align: center;">silakan mengisi informasi untuk calon penerima kayu balsa di kota/daerah Anda</h5>
            </div>
            <form action="phps/submit_pengirim_balsa.php?id=<?= $getTeam['id'] ?>" method="POST">
                <div class="form-group">
                    <center><label for="nama" style="text-align: center; font-weight: bold;">Nama Lengkap</label></center>
                    <input type="text" id="nama" name="nama" placeholder="Input nama lengkap penerima kayu balsa" class="form-control" style="text-align: center;" required>
                    <center><label for="hp" style="text-align: center; font-weight: bold;" class="mt-3">Nomor HP</label></center>
                    <input type="number" id="hp" name="hp" placeholder="Ex: 08123456789" class="form-control" style="text-align: center;" min="0" required>
                    <center><label for="email" style="text-align: center; font-weight: bold;" class="mt-3">E-mail</label></center>
                    <input type="email" id="email" name="email" placeholder="Ex: petracivilexpo@gmail.com" class="form-control" style="text-align: center;" required>
                    <center><label for="alamat" style="text-align: center; font-weight: bold;" class="mt-3">Alamat Lengkap</label></center>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" style="text-align: center;" rows="2" placeholder="Input alamat lengkap (termasuk Kota, Kecamatan, Kelurahan, RT, RW, dan Kode Pos)"></textarea>
                </div>
                <div class="justify-content-center mx-3">
                    <h5 style="text-align: center; font-size: 12pt; font-weight: bold;">untuk pengiriman dengan biaya ongkos kirim lebih dari Rp35.000,00 akan dihubungi oleh panitia Petra Civil Expo 2021 melalui e-mail atau WhatsApp</h5>
                </div>
                <hr class="mt-5">
                <h5 style="text-align: center; font-size: 12pt; color: red; font-weight:bold;" class="mx-3">Harap pastikan semua data sudah terisi dengan <u>benar</u>!<br>Data hanya dapat dilakukan submit 1 (satu) kali dan tidak dapat diubah kembali.</h5>
                <center><input type="submit" id="submit" name="submit" value="Submit Data" class="btn btn-warning mt-3 mb-5" style="font-weight: bold;"></center>
            </form>
    </div>
    <?php include 'footer.php' ?>
<?php
        }
?>
</body>

</html>
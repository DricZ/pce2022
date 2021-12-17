<?php
require 'phps/connect.php';
$_SESSION['page'] = 'addadmin';

include 'header.php';

$emojiTexts = ['༼ つ ◕_◕ ༽つ', 'ʕ•ᴥ•ʔ', '(ง ͠° ͟ل͜ ͡°)ง', '¯\_(ツ)_/¯', "(ง'̀-'́)ง", '(ᵔᴥᵔ)', '(¬‿¬)', '(~˘▾˘)~', '༼ʘ̚ل͜ʘ̚༽', 'ᕦ(ò_óˇ)ᕤ', '(｡◕‿‿◕｡)', '(>‿◠)✌'];
$randomIndex = array_rand($emojiTexts);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Admin Baru</title>
</head>

<?php
if (isset($_GET['stat'])) {
    if ($_GET['stat'] == 1) {
        echo '<script>',
        '	Swal.fire({
                position: "center",
                icon: "success",
                title: "Sukses Menambah Admin Baru!",
                showConfirmButton: false,
                timer: 3000
                })',
        '</script>';
    } else if ($_GET['stat'] == 2) {
        echo '<script>',
        '	Swal.fire({
                position: "center",
                icon: "error",
                title: "Gagal Menambah Admin Baru! <br>Silakan Coba Ulangi Kembali.",
                showConfirmButton: false,
                timer: 3000
                })',
        '</script>';
    } else if ($_GET['stat'] == 3) {
        echo '<script>',
        '	Swal.fire({
                position: "center",
                icon: "error",
                title: "Format NRP Tidak Sesuai!",
                showConfirmButton: false,
                timer: 3000
                })',
        '</script>';
    } else if ($_GET['stat'] == 4) {
        echo '<script>',
        '	Swal.fire({
                position: "center",
                icon: "error",
                title: "NRP Sudah Terdaftar Sebagai Admin!",
                showConfirmButton: false,
                timer: 3000
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
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 mt-4">
            <div align="center">
                <h2>TAMBAH ADMIN BARU</h2>
                <h2><b>WEBSITE ADMIN PETRA CIVIL EXPO 2021</b></h2>
                <h3><?php echo $emojiTexts[$randomIndex]; ?></h3><br>
            </div>
        </div>
    </div>

    <div class="container pt-3">
        <?php
        if ($_SESSION['nrpAdmin'] == 'b11190189' || $_SESSION['nrpAdmin'] == 'b11190099' || $_SESSION['nrpAdmin'] == 'b11190085' || $_SESSION['nrpAdmin'] == 'b11190011' || $_SESSION['nrpAdmin'] == 'b11190184' || $_SESSION['nrpAdmin'] == 'b11190092' || $_SESSION['nrpAdmin'] == 'b11190056' || $_SESSION['nrpAdmin'] == 'c14190033' || $_SESSION['nrpAdmin'] == 'c14190027' || $_SESSION['nrpAdmin'] == 'c14190050' || $_SESSION['nrpAdmin'] == 'c14190064' || $_SESSION['nrpAdmin'] == 'c14190218' || $_SESSION['nrpAdmin'] == 'b11190057') {
        ?>
            <form action="phps/submitAdmin.php" method="POST">
                <div class="form-group">
                    <center><label for="nama" style="font-weight: bold;">Nama Lengkap</label></center>
                    <input type="text" style="text-align: center;" id="nama" name="nama" value="<?php echo isset($_POST["nama"]) ? $_POST["nama"] : ''; ?>" placeholder="Ex: Zefanya Sharon" class="form-control" required>
                    <center><label for="nrp" style="font-weight: bold;" class="mt-3">NRP</label></center>
                    <input type="text" style="text-align: center;" id="nrp" name="nrp" value="<?php echo isset($_POST["nrp"]) ? $_POST["nrp"] : ''; ?>" placeholder="Ex: b11200001" class="form-control" required>
                    <center><label for="divisi" style="font-weight: bold;" class="mt-3">Divisi atau Jabatan</label></center>
                    <select class="form-control" id="divisi" name="divisi" style="height:40px; font-size: 12pt;" value="<?php echo isset($_POST["divisi"]) ? $_POST["divisi"] : ''; ?>" required>
                        <option value="">Pilih divisi atau jabatan...</option>
                        <option value="Steering Committee">Steering Committee</option>
                        <option value="Acara">Acara</option>
                        <option value="PDD">PDD</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Bendahara">Bendahara</option>
                        <option value="Dana">Dana</option>
                        <option value="Konsumsi">Konsumsi</option>
                        <option value="Transaman">Transaman</option>
                        <option value="Perkap">Perkap</option>
                    </select>
                    <center><label for="bidang" style="font-weight: bold;" class="mt-3">Bidang Lomba</label></center>
                    <select class="form-control" id="bidang" name="bidang" style="height:40px; font-size: 12pt;" value="<?php echo isset($_POST["bidang"]) ? $_POST["bidang"] : ''; ?>" required>
                        <option value="">Pilih bidang lomba...</option>
                        <option value="pce">BPH Pusat</option>
                        <option value="bc">Bridge Competition</option>
                        <option value="erdc">Earthquake Resistant Design Competition</option>
                        <option value="lktb">Lomba Kuat Tekan Beton</option>
                    </select>
                </div>
                <center><input type="submit" id="submit" name="submit" value="Tambah Admin Baru" class="btn btn-success container-fluid" style="width: 150px;"></center>
            </form>
        <?php
        } else {
        ?>
            <h1 style="color: red; text-align: center; font-weight: bold;">MOHON MAAF!<br>ANDA TIDAK MEMILIKI HAK AKSES KE PAGE INI.</h1>
            <p class="mt-4" style="text-align: center; font-size: 16pt; font-weight: bold;">Penambahan admin baru hanya dapat dilakukan oleh Ketua Petra Civil Expo 2021, Ketua maupun Wakil Ketua tiap Bidang Lomba, dan Divisi IT. Silakan mengirim data calon admin baru (nama lengkap, nrp, divisi, dan bidang lomba) ke salah satu pihak di atas untuk ditambahkan kemudian.<br>Terima kasih.</p>
        <?php
        }
        ?>
    </div>
</body>

</html>
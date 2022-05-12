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
    <title>Post No Resi & Harga Pengiriman</title>
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
                <h2>POST RESI & HARGA PENGIRIMAN</h2>
                <h2><b>WEBSITE ADMIN PETRA CIVIL EXPO 2022</b></h2>
                <h3><?php echo $emojiTexts[$randomIndex]; ?></h3><br>
            </div>
        </div>
    </div>

    <div class="container pt-3">
        <form action="phps/submitAdmin.php" method="POST">
            <div class="form-group">
            <center><label for="divisi" style="font-weight: bold;" class="mt-3">Nama Kelompok</label></center> 
                <select class="form-control" id="divisi" name="divisi" style="height:40px; font-size: 12pt;" value="<?php echo isset($_POST["divisi"]) ? $_POST["divisi"] : ''; ?>" required>
                    <option value="">Pilih nama kelompok...</option>
                    
                    <!-- INI NANTI DIISI DARI DATABASE -->

                </select>

                <!-- NAMA PENERIMA DIAMBIL DARI DATABASE -->
                <center><label for="nama" style="font-weight: bold;">Nama Penerima</label></center>
                <input type="text" style="text-align: center;" id="nama" name="nama" value="<?php echo isset($_POST["nama"]) ? $_POST["nama"] : ''; ?>" placeholder="Ex: Zefanya Sharon" class="form-control" required>
                
                <center><label for="nrp" style="font-weight: bold;" class="mt-3">Nomor HP</label></center>
                <input type="text" style="text-align: center;" id="nrp" name="nrp" value="<?php echo isset($_POST["nrp"]) ? $_POST["nrp"] : ''; ?>" placeholder="Ex: b11200001" class="form-control" required>
                
                
                
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
    </div>
</body>

</html>
<?php
require 'phps/connect.php';
$_SESSION['page'] = 'give_money';

include 'header.php';

$emojiTexts = ['༼ つ ◕_◕ ༽つ', 'ʕ•ᴥ•ʔ', '(ง ͠° ͟ل͜ ͡°)ง', '¯\_(ツ)_/¯', "(ง'̀-'́)ง", '(ᵔᴥᵔ)', '(¬‿¬)', '(~˘▾˘)~', '༼ʘ̚ل͜ʘ̚༽', 'ᕦ(ò_óˇ)ᕤ', '(｡◕‿‿◕｡)', '(>‿◠)✌'];
$randomIndex = array_rand($emojiTexts);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin BC 2021 - Trigger Info</title>
</head>

<?php
if (isset($_GET['stat'])) {
    if ($_GET['stat'] == 1) {
        echo '<script>',
        '	Swal.fire({
                position: "center",
                icon: "success",
                title: "Sukses Aktivasi!",
                showConfirmButton: false,
                timer: 2000
                })',
        '</script>';
    } else if ($_GET['stat'] == 2) {
        echo '<script>',
        '	Swal.fire({
                position: "center",
                icon: "error",
                title: "Gagal Aktivasi! <br>Silakan Coba Ulangi Kembali.",
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
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 mt-5">
            <div align="center">
                <h2>ACTIVATE INFO(S) AND SKILL(S) ON ACTIVE</h2>
                <h2><b>RALLY GAMES BRIDGE COMPETITION</b></h2>
                <h2><b>PETRA CIVIL EXPO 2021</b></h2>
                <h3><?php echo $emojiTexts[$randomIndex]; ?></h3><br>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <h3>INFO</h3>
    </div>
    <div class="row justify-content-center">
        <a href="phps/activate_info.php?id=1" class="btn btn-success container-fluid mt-3" style="width: 250px; font-weight: bold;">ACTIVATE SUB-SESI 02</a>
        <a href="phps/activate_info.php?id=2" class="btn btn-success container-fluid mt-3" style="width: 250px; font-weight: bold;">ACTIVATE SUB-SESI 03</a>
        <a href="phps/activate_info.php?id=3" class="btn btn-success container-fluid mt-3" style="width: 250px; font-weight: bold;">ACTIVATE SUB-SESI 04</a>
    </div>
    <div class="row justify-content-center mt-3">
        <a href="phps/activate_info.php?id=4" class="btn btn-success container-fluid mt-3" style="width: 250px; font-weight: bold;">ACTIVATE SUB-SESI 05</a>
        <a href="phps/activate_info.php?id=5" class="btn btn-success container-fluid mt-3" style="width: 250px; font-weight: bold;">ACTIVATE SUB-SESI 06</a>
        <a href="phps/activate_info.php?id=6" class="btn btn-success container-fluid mt-3" style="width: 250px; font-weight: bold;">ACTIVATE SUB-SESI 07</a>
    </div>
    <div class="row justify-content-center mt-3">
        <a href="phps/activate_info.php?id=7" class="btn btn-success container-fluid mt-3" style="width: 250px; font-weight: bold;">ACTIVATE SUB-SESI 08</a>
        <a href="phps/activate_info.php?id=12" class="btn btn-danger container-fluid mt-3" style="width: 250px; font-weight: bold;">NORMALISASI HARGA</a>
        <a href="phps/activate_info.php?id=8" class="btn btn-success container-fluid mt-3" style="width: 250px; font-weight: bold;">ACTIVATE SUB-SESI 09</a>
    </div>

    <div class="row justify-content-center mt-5">
        <h3>SKILL</h3>
    </div>
    <div class="row justify-content-center">
        <a href="phps/activate_info.php?id=10" class="btn btn-primary container-fluid mt-3" style="width: 250px; font-weight: bold;">ACTIVATE JAYAPURA<br>(END OF GAME)</a>
        <a href="phps/activate_info.php?id=9" class="btn btn-warning container-fluid mt-3" style="width: 250px; font-weight: bold;">ACTIVATE BANJARMASIN<br>(TIAP 20 MENIT)</a>
        <a href="phps/activate_info.php?id=11" class="btn btn-primary container-fluid mt-3" style="width: 250px; font-weight: bold;">ACTIVATE JAKARTA<br>(END OF GAME)</a>
    </div>
    <div class="footer my-5">
            &nbsp
    </div>
</body>

</html>
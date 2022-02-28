<?php
    require_once 'connect.php';

    // header("Content-Type: application/json");

    // INPUTAN USER
    $pulau_tujuan = 2;

    // AMBIL ID PULAU
    $sql_team = "SELECT * FROM team WHERE username = ?";
    $stmt_team = $pdo->prepare($sql_team);
    $stmt_team->execute([$_SESSION['username']]);
    $row_team = $stmt_team->fetch();
    $lokasi_skrg = $row_team['location_now_id_city'];

    // AMBIL NAMA PULAU
    $sql_pulau = "SELECT * FROM new_pulau WHERE id_pulau = ?";
    $stmt_pulau = $pdo->prepare($sql_pulau);
    $stmt_pulau->execute([$lokasi_skrg]);
    $row_pulau = $stmt_pulau->fetch();
    $nama_pulau = $row_pulau['nama_pulau'];

    // AMBIL LIST JEMBATAN YANG TERHUBUNG KE PULAU SKRG
    $sql_jembatan = "SELECT * 
    FROM new_jembatan j 
    JOIN team t ON j.id_team = t.id
    WHERE username = ? AND (id_pulau1 = ? OR id_pulau2 = ?)";
    $stmt_jembatan = $pdo->prepare($sql_jembatan);
    $stmt_jembatan->execute([$_SESSION['username'], $lokasi_skrg, $lokasi_skrg]);
    $row_jembatan = $stmt_jembatan->fetch();

    // JIKA BELUM PUNYA JEMBATAN
    if ($stmt_jembatan->rowCount() <= 0) {
        echo 'ANDA TIDAK PUNYA JEMBATAN HARUS PAKAI TIKET PESAWAT<br>';
    }

    // JEMBATAN TERHUBUNG KE PULAU TUJUAN ATAU TDK
    for ($i=0; $i < $stmt_jembatan->rowCount(); $i++) {
        if ($row_jembatan['id_pulau1'] == $pulau_tujuan || 
        $row_jembatan['id_pulau2'] == $pulau_tujuan) {
            echo 'DITEMUKAN JEMBATAN YG TERHUBUNG KE PULAU TUJUAN<br>';
            // nanti update lokasi yg baru 
            // $pulau_tujuan jadi location_now_id_city
        } else {
            echo 'ANDA TIDAK PUNYA JEMBATAN YG TERHUBUNG KE PULAU TUJUAN, HARUS PAKAI TIKET PESAWAT<br>';
            // cek inventori, jika punya tiket pesawat baru boleh pindah
        }
        echo $row_jembatan['nama_jembatan'];
    }

// misal kita di pulau 1
// jika di pulau1 - pulau2 punya jembatan
// maka bisa ganti lokasi
// jika tidak
// pakai tiket perjalanan

// SELECT * FROM team WHERE username = 'S001001';

// SELECT * FROM new_jembatan WHERE id_pulau1 = 1 OR id_pulau2 = 1;

    // AMBIL JEMBATAN YG TERHUBUNG KE PULAU SKRG
    // $sql_jembatan = "SELECT * FROM jembatan WHERE id_pulau1 = $curr_location OR id_pulau2 = $curr_location";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
    <?php 
        echo 'TEAM ' . $_SESSION['username'] . ' sekarang berada di ' . $nama_pulau;
        echo '<br>';
        echo $stmt_jembatan->rowCount();
    ?>
    <!-- $row_team['location_now_id_city'] -->
</h1>
</body>
</html>
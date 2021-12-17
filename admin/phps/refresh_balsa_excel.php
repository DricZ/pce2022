<?php
    include 'connect.php';

    header("Content-Type: application/json");

    $pendaftarsql = "SELECT a.status, a.nama_kelompok, a.nama_sekolah, a.jenjang_pendidikan, b.nama, b.no_hp, b.email, b.alamat FROM pendaftar a JOIN penerima_balsa b ON a.id = b.id_team WHERE (pilihan_lomba_1 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_2 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_3 IN ('bc-sma', 'bc-univ')) ORDER BY status DESC";
    $pendaftarstmt = $pdo->prepare($pendaftarsql);
    $pendaftarstmt->execute();

    $result = array();
    while($row = $pendaftarstmt->fetch()){
        array_push($result, $row);
    }
    echo json_encode($result);
?>
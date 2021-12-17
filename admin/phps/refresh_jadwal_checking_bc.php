<?php
    include 'connect.php';

    header("Content-Type: application/json");

    $pendaftarsql = "SELECT a.status, nama_kelompok, nama_sekolah, jenjang_pendidikan, tanggal, jam FROM pendaftar a JOIN hasil_pilih_jadwal_checking_bc b ON a.id = b.id_pendaftar JOIN jadwal_checking_bc c ON b.id_jadwal = c.id
UNION
    SELECT status, nama_kelompok, nama_sekolah, jenjang_pendidikan, 'NULL', 'NULL' FROM pendaftar WHERE status < 3 AND (pilihan_lomba_1 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_2 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_3 IN ('bc-sma', 'bc-univ'))";
    $pendaftarstmt = $pdo->prepare($pendaftarsql);
    $pendaftarstmt->execute();

    $result = array();
    while($row = $pendaftarstmt->fetch()){
        array_push($result, $row);
    }
    echo json_encode($result);
?>
<?php
    include 'connect.php';

    header("Content-Type: application/json");

    $pendaftarsql = "SELECT a.nama_kelompok, b.nama_sekolah, GROUP_CONCAT(d.tanggal SEPARATOR '<br>') as tanggal, GROUP_CONCAT(d.jam SEPARATOR ' WIB<br>') as jam, a.status FROM kelompok_erdc a JOIN pendaftar b ON a.id_pendaftar = b.id JOIN hasil_pilih_jadwal_checking_erdc c ON c.id_pendaftar = a.id_pendaftar JOIN jadwal_checking_erdc d ON d.id = c.id_jadwal GROUP BY a.nama_kelompok 
UNION
SELECT a.nama_kelompok, b.nama_sekolah, NULL, NULL, a.status FROM kelompok_erdc a JOIN pendaftar b ON a.id_pendaftar = b.id WHERE a.status = 0 ORDER BY status DESC";
    $pendaftarstmt = $pdo->prepare($pendaftarsql);
    $pendaftarstmt->execute();

    $result = array();
    while($row = $pendaftarstmt->fetch()){
        array_push($result, $row);
    }
    echo json_encode($result);
?>